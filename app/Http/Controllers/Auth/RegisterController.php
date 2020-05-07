<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ActivationUserAccount;
use App\Notifications\NotificationSendAll;
use App\Providers\RouteServiceProvider;
use App\SendSms\SendSmsAlogo;
use App\User;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    protected $redirectTo = '/panel/dashboard';


    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
//    public function register(Request $request)
//    {
//        $this->validator($request->all())->validate();
//
//        event(new Registered($user = $this->create($request->all())));
//
//        $response = [
//            'msg' => 'User created',
//            'mobile' => $request->mobile,
//        ];
//        return response()->json($response);
//
////        return $this->registered($request, $user)
////            ?: redirect('/register?mobile='.$request->mobile);
//    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//            'password_confirmation' => 'required|min:6',
//            'mobile' => 'required|numeric|unique:users|digits:11|regex:/(09)[0-9]{9}/',
//        ]);
//    }


    public function getMobile(Request $request)
    {

        $this->validate($request, [
            'mobile' => 'required|numeric|digits:11|regex:/(09)[0-9]{9}/',
            'email' => 'required|string|email|max:255',
//            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $code = rand(1111, 9999);
        $userExist = User::where('mobile', $request->mobile)->first();
        if ($userExist) {
            if ($userExist->active == 1) {
                $response = [
                    'message' => 'شما قبلا ثبت نام کرده اید .',
                    'status' => 'exist',
                ];
                return response()->json($response);
            } else {
                if ($userExist->code == null) {

                    $userExist->code = $code;
                    $mobile = $userExist->mobile;
//                    SendSmsAlogo::sendSmsAlogo($code, $mobile, 'verifyCode');

                    $userExist->expireCode = Carbon::now()->addMinutes(3);
                    $userExist->update();

                    \Mail::to($userExist)->send(new ActivationUserAccount($userExist));

                    $response = [
                        'mobile' => $userExist->mobile,
                        'code' => $code,
                        'status' => 'success',
                        'message' => 'کد تایید به شماره موبایل و ایمیل شما ارسال شد',
                    ];
                    return response()->json($response);
                } else {
                    $time = now()->diffInSeconds(Carbon::parse($userExist->expireCode), false);
                    if (intval($time) > 0) {
                        $response = [
                            'mobile' => $userExist->mobile,
                            'time' => $time,
                            'status' => 'sendCode',
                            'message' => 'کد تایید به شماره موبایل و ایمیل شما ارسال شد',
                        ];
                        return response()->json($response);
                    } else {

                        $userExist->code = $code;
                        $mobile = $userExist->mobile;
//                        SendSmsAlogo::sendSmsAlogo($code, $mobile, 'verifyCode');

                        \Mail::to($userExist)->send(new ActivationUserAccount($userExist));

                        $userExist->expireCode = Carbon::now()->addMinutes(3);
                        $userExist->update();
                        $response = [
                            'mobile' => $userExist->mobile,
                            'code' => $code,
                            'status' => 'success',
                            'message' => 'کد تایید به شماره موبایل و ایمیل شما ارسال شد',
                        ];
                        return response()->json($response);
                    }
                }


            }

        } else {
            $user = new User();
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->code = $code;
            $user->active = 0;
            $user->password = Hash::make($request->password);
            $user->expireCode = Carbon::now()->addMinutes(3);
            $user->save();

//            $role = Role::where('slug', '=', 'new')->first();
//            $user->roles()->sync($role->id);
//            $profile = new Profile();
//            $profile->user_id = $user->id;
//            $profile->save();

            $walletCode = randomNumber(9);
            if (in_array(trim($walletCode), Wallet::all()->pluck('code')->toArray())) {
                $walletCode = randomNumber(9);
            }

            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->code = $walletCode;
            $wallet->save();

            $user->code = $code;
            $mobile = $user->mobile;
//            SendSmsAlogo::sendSmsAlogo($code, $mobile, 'verifyCode');

            \Mail::to($user)->send(new ActivationUserAccount($user));

            $usersAdmin = User::whereHas(
                'roles', function ($q) {
                $q->where('slug', 'admin');
            })->get();
            $message = ' کاربری با موبایل ' . $user->mobile . 'در سایت ثبت نام کرده اند. ';
            $link = route('users.index');
            $linkText = 'رفتن به صفحه';
            $class = 'btn_green';
            $userSender = auth()->user();
            \Notification::send($usersAdmin, (new NotificationSendAll($message, $link, $linkText, $class, $userSender)));


            $response = [
                'mobile' => $request->mobile,
                'code' => $code,
                'status' => 'success',
                'message' => 'کد تایید به شماره موبایل و ایمیل شما ارسال شد',

            ];
            return response()->json($response);
        }


    }


    public function postVerify(Request $request)
    {
        $user = User::where('mobile', $request->mobile)->first();

        $this->validate($request, [
            'code' => 'required|numeric|digits:4'
        ]);

        if (!$user) {

            $response = [
                'status' => 'notUser',
                'message' => 'چنین کاربری وجود ندارد',
            ];
            return response()->json($response);

        } else {
            if (User::where('mobile', $request->mobile)->where('expireCode', '<', Carbon::now())->first()) {
                $user->code = null;
                $user->update();

                $response = [
                    'status' => 'expireCode',
                    'message' => ' زمان تایید کد به پایان رسیده بر روی درخواست کد کلیک کنید تا کد به موبایل شما ارسال شود',
                ];
                return response()->json($response);

            } else {
                if ($user = User::where('mobile', $request->mobile)->where('code', $request->code)->first()) {

                    $user->active = 1;
//                    $user->step = 1;
                    $user->code = null;
                    $user->update();


                    Auth::loginUsingId($user->id);

                    $response = [
                        'mobile' => $user->mobile,
                        'status' => 'activeAccount',
                        'redirect' => $this->redirectTo,
                        'message' => 'اکانت شما فعال شد ',
                    ];
                    return response()->json($response);
                } else {

                    $response = [
                        'status' => 'errorCode',
                        'message' => 'کد تایید شما صحیح نیست ',
                    ];
                    return response()->json($response);
                }
            }

        }


    }

    public function repeatVerify(Request $request)
    {

        $user = User::where('mobile', $request->mobile)->first();
        if (!$user) {

            $response = [
                'status' => 'notUser',
                'message' => 'چنین کاربری وجود ندارد',
            ];
            return response()->json($response);

        }
        $expireCode = User::where('mobile', $request->mobile)->where('expireCode', '>=', Carbon::now())->first();
        if ($expireCode) {

            $response = [
                'status' => 'sendCode',
                'message' => 'کد تایید به شماره موبایل شما ارسال شده است لطفا بعد از چند دقیقه دیگر تلاش کنید',
            ];
            return response()->json($response);

        } else if (User::where('mobile', $request->mobile)->where('expireCode', '<', Carbon::now())->first()) {

            $code = rand(1111, 9999);
            $user->code = $code;
            $mobile = $user->mobile;
//            SendSmsAlogo::sendSmsAlogo($code, $mobile, 'verifyCode');


            \Mail::to($user)->send(new ActivationUserAccount($user));

            $user->expireCode = Carbon::now()->addMinutes(3);
            $user->update();

            $response = [
                'status' => 'expireCode',
                'message' => 'کد تایید به شماره موبایل و ایمیل شما ارسال شد',
            ];
            return response()->json($response);

        }
    }


}
