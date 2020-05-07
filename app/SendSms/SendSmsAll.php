<?php

namespace App\SendSms;


use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class SendSmsAll
{
    public static function sendSmsAll($text, $phone)
    {

        try{
            $api = new KavenegarApi("6D332F66476D2F462B6450423367676C463957556163355A63515755492B6B465152564255642F727341633D");
            $sender = "1000596446";
            $message = $text;
            $receptor = $phone;
            $result = $api->Send($sender,$receptor,$message);
            if($result){
//                var_dump($result);
                return $text;
            }
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }
    }
}
