<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


//    public function username()
//    {
//        if(is_numeric(\request()->input('mobile'))){
//            return $field = 'mobile';
//        }else{
//            return $field = 'email';
//        }
//
//    }

//    public function login(Request $request)
//    {
//        if(is_numeric($request->get('mobile'))){
//            return ['mobile'=>$request->get('mobile'),'password'=>$request->get('password')];
//        }
//        elseif (filter_var($request->get('mobile'), FILTER_VALIDATE_EMAIL)) {
//            return ['email' => $request->get('mobile'), 'password'=>$request->get('password')];
//        }
//        return ['username' => $request->get('mobile'), 'password'=>$request->get('password')];
//    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function username()
    {
        $identity = request()->input('identity');
        if (is_numeric($identity)) {
            $field = 'mobile';
            request()->merge([$field => $identity]);
            return $field;
        } elseif (filter_var($identity, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
            request()->merge([$field => $identity]);
            return $field;
        } else {
            $field = 'username';
            request()->merge([$field => $identity]);
            return $field;
        }

    }

    protected function authenticated($request, $user)
    {

//
        if (auth()->check()) {
            if (auth()->user()->active == 0) {
                auth()->logout();
                // show Message
                alert()->error('اکانت شما هنوز فعال نشده است . ', 'فعال شدن اکانت')
                    ->confirmButton('بستن')->autoclose(6000);
                return back();
            }
        }

        if ($user->hasRole('admin')) {
            return redirect()->intended('/admin/dashboard');
        }
        if ($user->hasRole('seller')) {
            return redirect()->intended('/panel/dashboard');
        }
        return redirect()->intended('/panel/panelUser');

    }
}
