<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 10/2/2018
 * Time: 6:42 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Session;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $address_id = null;
    public $shipping_cast_normal = 100;
    public $shipping_cast_heavy = 250;
    public $shipping_cast_super_heavy = 600;
    public $price_normal = 0;
    public $price_heavy = 0;
    public $price_super_heavy = 0;
    public $date_time_normal = null;
    public $date_time_heavy = null;
    public $date_time_super_heavy = null;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->address_id = $oldCart->address_id;
            $this->shipping_cast_heavy = $oldCart->shipping_cast_heavy;
            $this->shipping_cast_super_heavy = $oldCart->shipping_cast_super_heavy;
            $this->shipping_cast_normal = $oldCart->shipping_cast_normal;
            $this->price_heavy = $oldCart->price_heavy;
            $this->price_super_heavy = $oldCart->price_super_heavy;
            $this->price_normal = $oldCart->price_normal;

            $this->date_time_heavy = $oldCart->date_time_heavy;
            $this->date_time_super_heavy = $oldCart->date_time_super_heavy;
            $this->date_time_normal = $oldCart->date_time_normal;
        }
    }

    public function add($item, $id)
    {


        $storedItem = [
            'qty' => 0,
            'price' => $item->price,
            'item' => $item,
        ];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

//        if ($this->items > 0) {
//            if (array_key_exists($id, $this->items)) {
//               return redirect('/product/cart');
//            }
//        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;

        $this->shippingCost();

    }

    public function updateItem($item, $id, $quantity, $price)
    {
        $this->items[$id]['item'] = $item;
        $this->items[$id]['qty'] = $quantity;
        $this->items[$id]['price'] = $quantity * $price;

        $this->totalQty = 0;
        $this->totalPrice = 0;
        foreach ($this->items as $element) {
            $this->totalQty += $element['qty'];
            $this->totalPrice += $element['price'];
        }
        $this->shippingCost();
    }

    public function shippingCost()
    {
        $collectionNormal = 0;
        $collectionHeavy = 0;
        $collectionSuperHeavy = 0;
        foreach ($this->items as $element) {
            $typeNormal = $element['item']->category->type_weight;
            if ($typeNormal == 0) {
                $collectionNormal += $element['price'];
            } else if ($typeNormal == 1) {
                $collectionHeavy += $element['price'];
            } else if ($typeNormal == 2) {
                $collectionSuperHeavy += $element['price'];
            }
        }
//        if normal product >= 150000 shipping equal zero
        if ($collectionNormal >= 150000) {
            $this->shipping_cast_normal = 0;
        } else {
            $this->shipping_cast_normal = 100;

        }

        //        if heavy product >= 1000000 shipping equal zero
        if ($collectionHeavy >= 1000000) {
            $this->shipping_cast_heavy = 0;
        } else {
            $this->shipping_cast_heavy = 250;

        }

// set price group normal and heavy and super heavy
        $this->price_heavy = $collectionHeavy;
        $this->price_super_heavy = $collectionSuperHeavy;
        $this->price_normal = $collectionNormal;

//        add price shipping to total price
        if ($collectionNormal > 0) {
            $this->totalPrice += $this->shipping_cast_normal;
        }
        if ($collectionHeavy > 0) {
            $this->totalPrice += $this->shipping_cast_heavy;
        }
        if ($collectionSuperHeavy > 0) {
            $this->totalPrice += $this->shipping_cast_super_heavy;
        }

//        return $this->totalPrice;
    }

    public function updateAddress($address_id)
    {
        $this->address_id = $address_id;

    }

    public function updateTimeShipping($date_time_normal, $date_time_heavy, $date_time_super_heavy)
    {
        $this->date_time_normal = $date_time_normal;
        $this->date_time_heavy = $date_time_heavy;
        $this->date_time_super_heavy = $date_time_super_heavy;

    }

//    public function increaseByOne($id)
//    {
//        $this->items[$id]['qty']++;
//        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
//        $this->totalQty++;
//        $this->totalPrice += $this->items[$id]['item']['price'];
//    }

//    public function reduceByOne($id)
//    {
//        $this->items[$id]['qty']--;
//        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
//        $this->totalQty--;
//        $this->totalPrice -= $this->items[$id]['item']['price'];
//        if ($this->items[$id]['qty'] <= 0) {
//            unset($this->items[$id]);
//        }
//    }

    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);

        $this->shippingCost();

    }

}