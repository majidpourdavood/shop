<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Discount;
use App\Model\Comment;
use App\Model\Product;
use App\Notifications\NotificationSendAll;
use App\SendSms\SendSmsAll;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Session;

class CartController extends Controller
{
    public function cart()
    {
//        Session::forget('cart');
        if (!Session::has('cart')) {
            return view('site.view.cart.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('site.view.cart.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function addCart(Request $request, $slug)
    {
        $parentTabe = Product::where('slug', '=', $slug)->first();

        if ($parentTabe) {
            if (is_null($parentTabe) || $parentTabe->price == 0)

//                return redirect()->route('cart');
                return back();

            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($parentTabe, $parentTabe->id);
            $request->session()->put('cart', $cart);
            foreach (Session::get('cart')->items as $item) {
                if ($item['item']->id == $parentTabe->id) {
//                    return redirect()->route('cart');
                    return back();
                }
            }

//            return redirect()->route('cart');
            return back();

        } else {
            return redirect('/');
        }

    }

    public function deleteCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('cart');
    }

    public function deleteItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('cart');
    }

    public function deleteItemCartPanel($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return back();
    }

    public function updateCart(Request $request, $slug_product)
    {
//        $this->validate($request, [
//            'itemdes' => 'required',
//        ]);
        $parentTabe = Product::where('slug_product', '=', $slug_product)->first();

        if (is_null($parentTabe) || $parentTabe->price == 0)
            return redirect()->route('cart');

//        if (request('itemdes') == null || request('itemdes') == '') {
//            alert()->info('فیلد توضیحات نمی تواند خالی باشد .', 'خطا')->confirmButton('بستن')->autoclose('6000');
//            return back();
//        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($parentTabe->id);
        $cart->updateCart($parentTabe, $parentTabe->id);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart');
    }

//    public function updateCartEkhtesasi(Request $request, $id)
//    {
//        $parentTabe = Product::find($id);
//
////        if (is_null($parentTabe) || $parentTabe->price == 0)
////            return redirect()->route('viewCart', [$id => $parentTabe->id]);
//updateDesignerToCart
//        $oldCart = Session::has('cart') ? Session::get('cart') : null;
//        $cart = new Cart($oldCart);
//        $cart->removeItem($id);
//        $cart->updateCart($parentTabe, $parentTabe->id);
//        $request->session()->put('cart', $cart);
//
//        return redirect()->route('viewOrderPanel');
//    }


    public function uploadFileCart(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,bmp,png,jpg,zip,rar,docx,doc,txt,pdf,psd|max:20480',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            if ($request->hasFile('file')) {
                $filename = $request->file('file');
                $name = sha1(time() . $filename->getClientOriginalName());
                $extension = $filename->getClientOriginalExtension();
                $filename = "{$name}.{$extension}";
                $request->file('file')->move(base_path('../public_html/file/'), $filename);
            }
            $response = [
                'msg' => 'فایل آپلود شد',
                'filename' => $filename,
                'status' => 900,
            ];
            return response()->json($response);
        }
    }

    public function discount(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $discount = Discount::where('code', '=', $request->code)->first();

        $cart = new Cart($oldCart);
        if ($request->code == null || $request->code == '') {
            $response = [
                'data' => 'کد تخفیف را وارد کنید !',
            ];
            return response()->json($response);
        }
        if (!$discount) {
            $response = [
                'data' => 'کد تخفیف اشتباه هست !',
            ];
            return response()->json($response);
        } else {

            if ($discount->rialsPercent <= 95) {

//                if ($discount->user_id == auth()->user()->id) {
                if ($discount->status == 0) {
                    $date = Carbon::now();
                    if ($discount->expirationDate >= $date || $discount->expirationDate == null) {
                        if ($discount->product_id == null && $discount->status == 0) {
                            $totalPrice = $cart->totalPrice;
                            $cart->totalPrice = round($totalPrice - ($totalPrice * $discount->rialsPercent / 100));
//                        $price = array();
                            foreach ($cart->items as $item) {
                                $priceItem = $item['price'];
                                $cart->items[$item['item']['id']]['price'] = round($priceItem - ($priceItem * $discount->rialsPercent / 100));
//                            $price[] = $cart->items[$item['item']['id']]['price'];
                            }
                            session()->put('cart', $cart);
                            $discount->status = 1;
                            $discount->update();
//                        return back();
                            $response = [
                                'data' => 'کد تخفیف با موفقیت اعمال شد.',
                                'totalPrice' => $cart->totalPrice,
//                            'priceItem' => $price,
                                'percent' => $discount->rialsPercent,
                                'status' => 'all',
                            ];
                            return response()->json($response);

                        }

                        if (isset($cart->items[$discount->product_id]) && $discount->status == 0) {
                            $price = $cart->items[$discount->product_id]['price'];
                            $cart->totalPrice = $cart->totalPrice - $price;
                            $cart->items[$discount->product_id]['price'] = round($price - ($price * $discount->rialsPercent / 100));
                            $cart->totalPrice += round($cart->items[$discount->product_id]['price']);
                            session()->put('cart', $cart);
                            $discount->status = 1;
                            $discount->update();
                            $response = [
                                'data' => 'کد تخفیف با موفقیت اعمال شد.',
                                'totalPrice' => $cart->totalPrice,
                                'code' => $discount->product_id,
                                'status' => 'item',
                                'priceItem' => $cart->items[$discount->product_id]['price']
                            ];
                            return response()->json($response);
                        } else {
                            $product = Product::findOrFail($discount->product_id)->first();
                            $response = [
                                'data' => 'محصول مورد نظر شامل اعمال تخفیف برای شما نمی باشد ' . 'این کد تخفیف برای محصول ' . $product->title . '  به شما تعلق گرفته' . '!',
                            ];
                            return response()->json($response);
                        }
                    } else {
//                            $discount->status = 1;
//                            $discount->update();
                        $response = [
                            'data' => 'زمان استفاده از این کد تخفیف به پایان رسیده است . !',
                        ];
                        return response()->json($response);
                    }


                } else {
                    $response = [
                        'data' => 'کد استفاده شده است !',
                    ];
                    return response()->json($response);
                }


            } else {
                $response = [
                    'data' => 'کد نامعتبر هست !',
                ];
                return response()->json($response);
            }
        }


    }

    public function viewCart($slug_product)
    {
        $product = Product::where('slug_product', '=', $slug_product)->first();
        if ($product) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;

            if ($oldCart != null) {
                $cart = new Cart($oldCart);
                foreach ($cart->items as $item) {
                    if ($item['item']['id'] == $product->id) {
                        $session = $cart->items[$product->id];
                    } else {
                        $session = null;
                    }
                }
            } else {
                $session = null;
            }
            $comments = $product->comments()->where('approved', 1)->where('parent_id', 0)->latest()->with(['comments' => function ($query) {
                $query->where('approved', 1)->latest();
            }])->get();
            return view('site.cart.addcart', compact(['product', 'comments', 'session']));
        } else {
            return redirect('/');
        }

    }

    public function comments(Request $request)
    {
        $this->validate($request, [
            'parent_id' => 'required',
            'comment' => 'required',
            'commentable_id' => 'required',
            'commentable_type' => 'required',
        ]);
        $codeNumber = randomNumber(9);
        if (in_array(trim($codeNumber), Comment::all()->pluck('codeNumber')->toArray())) {
            $codeNumber = randomNumber(9);
        }
        $comment = new Comment();
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->codeNumber = $codeNumber;
        $comment->user_id = auth()->user()->id;
        $comment->commentable_id = $request->commentable_id;
        $comment->commentable_type = $request->commentable_type;
        $comment->save();
        $message = ' کاربری به نام ' . $comment->user->name . ' ' . $comment->user->lastName . '   کامنت ارسال کرده است. ';
        $users = User::where('level', '=', 'admin')->orWhere('level', '=', 'adminChat')->get();
        $icon = 'confirmation';
        $link_text = 'نمایش کامنت';
        $link = '/admin/replyCommentAdmin/' . $comment->id;
        $classNameBtn = 'btn_notify_green';
//        SendSmsAll::sendSmsAll($message, '09368774987');
        \Notification::send($users, (new NotificationSendAll($message, $link, $link_text, $icon, $classNameBtn)));
        alert()->success('کامنت شما با موفقیت ثبت شد ', ' ارسال کامنت')
            ->confirmButton('بستن')->autoclose(3000);
        return back();
    }
}
