<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

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

        return view('site.user.address');
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
