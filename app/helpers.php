<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 01/05/2017
 * Time: 21:08
 */
function convert($string)
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $string = str_replace($english, $persian, $string);

    return $string;
}


function CheckArray($array_1, $array_2){
    return ($array_1 === $array_2)? true : false;
}

function url_current_dir(){

    $directory_array=explode("/",$_SERVER['REQUEST_URI']);
    $directory=$directory_array[1];

    return sprintf(
        "%s://%s/%s/",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        // 'ipg_tester'
        // $_SERVER['REQUEST_URI']
        $directory
    );
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function makeHttpChargeRequest($_Method,$_Data,$_Address){
    $curl= curl_init();
    curl_setopt($curl, CURLOPT_URL, $_Address);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $_Method);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $_Data);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;

}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function round_up($value, $precision)
{
    $pow = pow(10, $precision);
    return (ceil($pow * $value) + ceil($pow * $value - ceil($pow * $value))) / $pow;
}

function randomNumber($length)
{
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(1, 9);
    }
    return $result;
}

if (!function_exists('words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string $value
     * @param  int $words
     * @param  string $end
     * @return string
     */
    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}

function compress($source, $destination, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

function list_categories(Array $categories)
{
    $data = [];

    foreach ($categories as $category) {
        $data[] = [
            'children' => list_categories($category->childs),
        ];
    }

    return $data;
}


function compress_image($source_file, $target_file, $nwidth, $nheight, $quality)
{
    //Return an array consisting of image type, height, widh and mime type.
    $image_info = getimagesize($source_file);
    if (!($nwidth > 0)) $nwidth = $image_info[0];
    if (!($nheight > 0)) $nheight = $image_info[1];

    if (!empty($image_info)) {
        switch ($image_info['mime']) {
            case 'image/jpeg' :
                if ($quality == '' || $quality < 0 || $quality > 100) $quality = 75; //Default quality
                // Create a new image from the file or the url.
                $image = imagecreatefromjpeg($source_file);
                $thumb = imagecreatetruecolor($nwidth, $nheight);
                //Resize the $thumb image
                imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
                // Output image to the browser or file.
                return imagejpeg($thumb, $target_file, $quality);

                break;

            case 'image/png' :
                if ($quality == '' || $quality < 0 || $quality > 9) $quality = 6; //Default quality
                // Create a new image from the file or the url.
                $image = imagecreatefrompng($source_file);
                $thumb = imagecreatetruecolor($nwidth, $nheight);
                //Resize the $thumb image
                imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
                // Output image to the browser or file.
                return imagepng($thumb, $target_file, $quality);
                break;

            case 'image/gif' :
                if ($quality == '' || $quality < 0 || $quality > 100) $quality = 75; //Default quality
                // Create a new image from the file or the url.
                $image = imagecreatefromgif($source_file);
                $thumb = imagecreatetruecolor($nwidth, $nheight);
                //Resize the $thumb image
                imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
                // Output image to the browser or file.
                return imagegif($thumb, $target_file, $quality); //$success = true;
                break;

            default:
                echo "<h4>Not supported file type!</h4>";
                break;
        }
    }
}

function kamaNumber($num)
{
    $persian_num_array = [
        '0' => '۰',
        '1' => '۱',
        '2' => '۲',
        '3' => '۳',
        '4' => '۴',
        '5' => '۵',
        '6' => '۶',
        '7' => '۷',
        '8' => '۸',
        '9' => '۹',
    ];

    $num = (float)$num;
    return strtr(number_format($num), $persian_num_array);
}