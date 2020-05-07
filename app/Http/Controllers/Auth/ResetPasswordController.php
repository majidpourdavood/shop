<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MailSendUser;
use App\Notifications\NotificationSendUser;
use App\SendSms\SendSmsAlogo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{


    public function showResetForm()
    {
        return view('auth.reset');
    }

    public function resetPasswordUser(Request $request)
    {
        if (empty($request->get('email_mobile'))) {
            return response([
                'data' => 'شماره موبایل یا ایمیل خود را وارد کنید .',
            ]);
        }
        if (is_numeric($request->get('email_mobile'))) {

            $user = User::where('mobile', '=', $request->email_mobile)->first();
            $preg = preg_match("/(09)[0-9]{9}/", $request->email_mobile);

            if (isset($user) && $user != null) {

                $passwordUser = generateRandomString(8);
                $user->password = Hash::make($passwordUser);
                $messageUser = ' کاربری گرامی ' . $user->name . ' ' . $user->lastName . ' رمز عبور شما با موفقیت ویرایش شد رمز عبور برابر است با : ' . $passwordUser;
                $messageUsermobile = 'فروشگاه اینترنتی کرکره مارکت - کاربری گرامی ' . $user->name . ' ' . $user->lastName . ' رمز عبور شما با موفقیت ویرایش شد رمز عبور برابر است با : ' . $passwordUser;
                $iconUser = 'confirmation';
                $link_textUser = '';
                $linkUser = '';
                $classNameBtnUser = '';
                \Mail::to($user)->send(new MailSendUser($messageUsermobile, $linkUser));

                $code = rand(1111, 9999);
                $user->code = $code;
                $user->update();

                $mobile = $user->mobile;

//                SendSmsAlogo::sendSmsAlogo($code, $mobile, 'verifyCode');

                \Notification::send($user, (new NotificationSendUser($messageUser, $linkUser, $link_textUser, $iconUser, $classNameBtnUser)));

                return response([
                    'data' => 'رمز عبور به شماره موبایل و ایمیل شما ارسال شد .',
                    'user' => $user,
                    'status' => 'success',
                ]);
            } else if (strlen($request->email_mobile) != 11) {
                return response([
                    'data' => 'شماره موبایل باید 11 رقم باشد .',
                ]);
            } else if ($preg == false) {
                return response([
                    'data' => 'فرمت شماره موبایل درست نیست .',
                ]);
            } else {
                return response([
                    'data' => 'چنین کاربری وجود ندارد !',
                ]);
            }

        } elseif (filter_var($request->get('email_mobile'), FILTER_VALIDATE_EMAIL)) {

            $user = User::where('email', '=', $request->email_mobile)->first();
            if (isset($user) && $user != null) {

                $passwordUser = generateRandomString(8);
                $user->password = Hash::make($passwordUser);
                $user->update();
                $messageUser = ' کاربری گرامی  رمز عبور شما با موفقیت ویرایش شد رمز عبور برابر است با : ' . $passwordUser;
                $messageUsermobile = 'فروشگاه اینترنتی کرکره مارکت - کاربری گرامی  رمز عبور شما با موفقیت ویرایش شد رمز عبور برابر است با : ' . $passwordUser;
                $iconUser = 'confirmation';
                $link_textUser = '';
                $linkUser = '';
                $classNameBtnUser = '';
                \Mail::to($user)->send(new MailSendUser($messageUsermobile, $linkUser));


                $code = rand(1111, 9999);
                $user->code = $code;
                $user->update();

                $mobile = $user->mobile;

//                SendSmsAlogo::sendSmsAlogo($code, $mobile, 'verifyCode');
                \Notification::send($user, (new NotificationSendUser($messageUser, $linkUser, $link_textUser, $iconUser, $classNameBtnUser)));


                return response([
                    'data' => 'رمز عبور به شماره موبایل و ایمیل شما ارسال شد .',
                    'user' => $user,
                    'status' => 'success',
                ]);
            } else {
                return response([
                    'data' => 'چنین کاربری وجود ندارد !',
                ]);
            }
        } else {
            return response([
                'data' => 'چنین کاربری وجود ندارد !',
            ]);
        }
    }

}
