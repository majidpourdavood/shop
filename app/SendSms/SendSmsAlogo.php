<?php

namespace App\SendSms;


use SoapClient;
use SoapFault;
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class SendSmsAlogo
{
    public static function sendSmsAlogo($code, $phone, $template)
    {


        $api_key = '345A6B672F4F2F4D66396477586259314D387268425A6535522B422F796259414D4662683277325656696F3D';
        $token = convert($code);
        $receptor = $phone;
        $dataQuery = 'receptor=' . $receptor . '&token=' . $token . '&template=' . $template;
        $AddressServiceToken = "https://api.kavenegar.com/v1/$api_key/verify/lookup.json";

        $TokenArray = makeHttpChargeRequest('POST', $dataQuery, $AddressServiceToken);
        $decode_TokenArray = json_decode($TokenArray);
//dd($decode_TokenArray);

    }
}
