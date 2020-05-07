<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use App\Location;
use App\Mail\ActivationUserAccount;
use App\Model\Banner;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Product;
use App\Notifications\NotificationSendAll;
use App\User;
use Illuminate\Http\Request;
use Mail;

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
        return view('site.view.index', compact(['productNews', 'sliders', 'productViewCounts', 'productDiscounts' ,'brands']));
    }


    public function product($slug)
    {
        $product = Product::where('slug', $slug)->where('active', 1)->first();
        $product->increment('viewCount');

        return view('site.view.product.single', compact(['product']));
    }

    public function myformAjax($id)
    {
        $cities = Location::where('parent_id', '=', $id)
            ->where('parent_id', '!=', 0)
            ->pluck("name", "id")->all();
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
        return view('site.view.search');

    }

    public function category($title)
    {
        $category = Category::where('title', $title)->where('active', 1)->first();
        return view('site.view.category', compact(['category']));

    }

    public function pagenotfound()
    {
        return view('site.pagenotfound');
    }


}
