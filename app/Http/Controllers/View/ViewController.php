<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use App\Location;
use App\Mail\ActivationUserAccount;
use App\Model\Banner;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Contact;
use App\Model\ItemProduct;
use App\Model\OptionProperty;
use App\Model\Product;
use App\Model\Property;
use App\Notifications\NotificationSendAll;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Symfony\Component\Console\Input\Input;

class ViewController extends Controller
{
    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'email' => 'required',
            'subject' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->body = $request->body;
        $contact->save();

        $message = ' کاربری به نام ' . $contact->name . '   در فرم تماس با ما درخواستی ارسال کرده است. ';
        $users = User::where('level', '=', 'admin')->orWhere('level', '=', 'adminChat')->get();
        $icon = 'confirmation';
        $link_text = '';
        $link = '';
        $classNameBtn = '';
//        SendSmsAll::sendSmsAll($message, '09368774987');
        \Notification::send($users, (new NotificationSendAll($message, $link, $link_text, $icon, $classNameBtn)));
        alert()->success('پیام شما با موفقیت ثبت شد ', ' ارسال پیام')
            ->confirmButton('بستن')->autoclose(3000);
        return back();
    }

    public function index()
    {
//        return \request()->session()->all();
//        Mail::raw('Sending emails with Mailgun and Laravel ', function($message)
//        {
//            $message->subject('Mailgun and Laravel ');
//            $message->from('no-reply@website_name.com', 'Website Name');
//            $message->to('parsclick1@gmail.com');
//        });

//        $user = User::where('mobile', '=', '09360405004')->first();
//        \Mail::to($user)->send(new ActivationUserAccount($user));

        $productNews = Product::where('active', 1)->orderBy('created_at', 'desc')->limit(9)->get();
        $productViewCounts = Product::where('active', 1)->orderBy('viewCount', 'desc')->limit(9)->get();
        $sliders = Banner::where('active', 1)->where('position', 0)->orderBy('created_at', 'desc')->limit(9)->get();
        $productDiscounts = Banner::where('active', 1)->where('position', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $brands = Brand::where('status', 1)->orderBy('created_at', 'desc')->limit(9)->get();
        return view('site.view.index', compact(['productNews', 'sliders', 'productViewCounts', 'productDiscounts', 'brands']));
    }


    public function product($slug)
    {
        $product = Product::where('slug', $slug)->where('active', 1)->first();

        if ($product) {
            $productNews = Product::where('active', 1)->orderBy('created_at', 'desc')->limit(9)->get();
            $productViewCounts = Product::where('active', 1)->orderBy('viewCount', 'desc')->limit(9)->get();

            $propertyTop = $product->propertyProducts()->whereHas('property', function ($query) {
                $query->where('show_place', 1);
            })->get();

            $product->increment('viewCount');

            $itemProduct = $product->itemProducts()->where('code', request('item_code'))->first();

            $itemProducts = $product->itemProducts()->where('user_id', $itemProduct->user_id)->get();

            $collection1 = new Collection();
            foreach ($itemProducts as $value) {
                if (isset($value->property) || $value->property != null) {
                    foreach ($value->property as $value2) {
                        $collection1->push($value2);
                    }
                }

            }
//return $collection1;
            $unique = $collection1->unique('property_id');
            $items = $unique->values()->all();
            $tttt = [];
            foreach ($items as $key => $item) {
                $rrr = $collection1->where('property_id', $item['property_id'])->unique('option_property_id');
                $rrr = $rrr->values()->all();
                $uuu = [];
                foreach ($rrr as $k => $r) {
                    $uuu[$k]['option_property_id'] = $r['option_property_id'];
                    $uuu[$k]['value'] = OptionProperty::find($r['option_property_id'])->value;
                }
                $tttt[$key]['property_id'] = $item['property_id'];
                $tttt[$key]['key'] = Property::find($item['property_id'])->key;
                $tttt[$key]['name'] = Property::find($item['property_id'])->name;
                $tttt[$key]['optionProperty'] = $uuu;

            }

//return $tttt;
//            $items = [];
//            foreach ($collection11 as $keyCollec => $valueCollec) {
//
//                $items[$keyCollec]['name'] = $valueCollec->name;
//                $items[$keyCollec]['key'] = $valueCollec->key;
//                $items[$keyCollec]['items'] =
//                    $product->itemProducts()->where('user_id', $itemProduct->user_id)
//                   ->whereHas('optionProperty', function($q) use ($valueCollec) {
//                       $q->where('property_id', '=', $valueCollec->id);
//                   })->with('optionProperty')->get();
//
//            }

            $items = $tttt;
            return view('site.view.product.single', compact([
                'product',
                'propertyTop',
                'productNews',
                'productViewCounts',
                'items',
                'itemProduct',
                'itemProducts',

            ]));
        } else {
            return redirect('/');
        }

    }

    public function setPriceItemProduct(Request $request)
    {


        $allRequest = request()->except(['_method',
            'itemProduct',

        ]);
        $hhhhhh = array();
        foreach ($allRequest as $key => $item) {
            array_push($hhhhhh, $item);
        }
//return $hhhhhh;
        $itemProduct = ItemProduct::findOrFail($request->itemProduct);
        $product = $itemProduct->product;

        $itemProducts = $product->itemProducts()->where('user_id', $itemProduct->user_id)->get();

        $collection1 = new Collection();
        foreach ($itemProducts as $value) {
            if (isset($value->property) || $value->property != null) {
                foreach ($value->property as $value2) {
                    $collection1->push($value2);
                }
            }

        }

        $unique = $collection1->unique('property_id');
        $items = $unique->values()->all();
        $tttt = [];
        $propertyCollection = new Collection();
        foreach ($items as $key => $item) {
            $rrr = $collection1->where('property_id', $item['property_id'])->unique('option_property_id');
            $rrr = $rrr->values()->all();
            $uuu = [];
            foreach ($rrr as $k => $r) {
                $uuu[$k]['option_property_id'] = $r['option_property_id'];
                $uuu[$k]['value'] = OptionProperty::find($r['option_property_id'])->value;
                $uuu[$k]['active'] = in_array(intval($r['option_property_id']), $hhhhhh) ? 1 : 0;

            }
            $tttt[$key]['property_id'] = $item['property_id'];
            $tttt[$key]['key'] = Property::find($item['property_id'])->key;
            $tttt[$key]['name'] = Property::find($item['property_id'])->name;
            $tttt[$key]['optionProperty'] = $uuu;
            $stdClass = new \stdClass();
            $stdClass->property_id = $item['property_id'];

            $item = null;
            foreach ($uuu as $struct) {
                if ($struct['active'] == 1) {
                    $item = $struct;
                    break;
                }
            }
            $stdClass->option_property_id = $item['option_property_id'];
            $propertyCollection->push($stdClass);

        }
//return $propertyCollection;
        $data = array();
        foreach ($propertyCollection as $key => $item) {
            $data[$key]['property_id'] = $item->property_id;
            $data[$key]['option_property_id'] = $item->option_property_id;
        }
        $iiii = null;

          for ($i = 0; $i <= count($itemProducts); $i++){
              foreach ($itemProducts as $value) {
                  foreach ($data as $datum) {
}
              }
        }

        //            $fffff = ItemProduct::where('property',$propertyCollection)->first();

        return response()->json([
            'uuu' => $tttt,
            'fffff' => $iiii
        ]);
    }

    public function locationAjax($id)
    {
        $cities = Location::where('parent_id', '=', $id)
            ->where('parent_id', '!=', 0)
            ->pluck("name", "id")->all();
        return json_encode($cities);
    }

    public function getProperty($id)
    {
        $cities = Property::where('id', '=', $id)
            ->first()->optionProperty()
            ->pluck("value", "id")->all();
        return json_encode($cities);
    }


    public function aboutUs()
    {
        return view('site.view.aboutUs');
    }

    public function contactUs()
    {
        return view('site.view.contactUs');

    }

    public function search()
    {

        $products = Product::where('active', '=', 1)->filter()->paginate(9);
        return view('site.view.search', compact(['products']));

    }

    public function category($title)
    {
        $category = Category::where('title', $title)->where('active', 1)->first();
        $products = $category->products()->orderBy('created_at', 'desc')->paginate(9);
        return view('site.view.category', compact(['category', 'products']));

    }

    public function pagenotfound()
    {
        return view('site.pagenotfound');
    }


}
