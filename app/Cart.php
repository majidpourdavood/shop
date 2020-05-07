<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 10/2/2018
 * Time: 6:42 PM
 */

namespace App;

use Session;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {


        $storedItem = [
            'qty' => 0,
            'price' => $item->price,
            'item' => $item,
//            'subjectDesign' => '',
//            'length' => '',
//            'width' => '',
//            'selectReceivedFile' => '',
//            'height' => '',
//            'designer' => '',
//            'itemdes' => '',
//            'level' => '',
//            'color' => 'قرمز و آبی',
//            'size' => 'سایز A4',
//            'type_design' => 'طراحی یک رو',
//            'file' => '',
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
    }

    public function updateCart($item, $id)
    {


        $storedItem = [
            'qty' => 0,
            'price' => $item->price,
            'item' => $item,
//            'subjectDesign' => '',
//            'length' => '',
//            'width' => '',
//            'selectReceivedFile' => '',
//            'height' => '',
//            'designer' => '',
//            'itemdes' => '',
//            'level' => '',
//            'color' => 'قرمز و آبی',
//            'size' => 'سایز A4',
//            'type_design' => 'طراحی یک رو',
//            'file' => '',

        ];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

//        $storedItem['itemdes'] = request('itemdes');
//        $storedItem['height'] = request('height');
//        $storedItem['selectReceivedFile'] = request('selectReceivedFile');
//        $storedItem['width'] = request('width');
//        $storedItem['length'] = request('length');
//        $storedItem['subjectDesign'] = request('subjectDesign');
//        $storedItem['color'] = request('color');
//        $storedItem['file'] = request('file');
//        $storedItem['designer'] = request('designer');
//        $storedItem['type_design'] = request('type_design');
//        $storedItem['size'] = request('size');
//        $storedItem['qty'] = request('qty');
//        if ($storedItem['type_design'] == 'طراحی دورو') {
//            $item->price = $item->price * 1.3;
//        }
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty += $storedItem['qty'];
        $this->totalPrice += $storedItem['price'];
    }

    public function updateDesignerToCart($id)
    {
        $userDesigner = User::where('codeNumber', '=',request('designer'))->first();
        $this->items[$id]['designer'] = $userDesigner->id;

    }

    public function increaseByOne($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
    }

    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}