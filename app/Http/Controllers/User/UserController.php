<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Location;
use App\Model\Contact;
use App\Model\Product;
use App\Notifications\NotificationSendAll;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function increaseCredit()
    {

        return view('site.user.increaseCredit');
    }

    public function favoriteProduct()
    {
        return view('site.user.favoriteProduct');

    }
    public function address()
    {

        return view('site.view.cart.address');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function panelUser()
    {
        return view('site.user.profile');
    }
    public function profile()
    {
        return view('site.user.profile');

    }

    public function discountCode()
    {
        return view('site.user.discountCode');

    }

    public function financialReport()
    {
        return view('site.user.financialReport');

    }

    public function orderList()
    {
        return view('site.user.orderList');

    }


}
