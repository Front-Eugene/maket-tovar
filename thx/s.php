<?php
session_start();
ini_set("display_errors", "On");
date_default_timezone_set("Europe/Moscow");
header("Content-Type: text/html; charset=utf-8");
$ip_client = $_SERVER['REMOTE_ADDR'];  
$url = $_SERVER['HTTP_REFERER']; 
if(strpos($url, "?") === false)
{
  $urlRex = $url; 
}else{
  $urlRex = strstr($url, '?', true); 
}


/*
Автомобильный коврик 1 19.99 
Антимоскитка 2 19.99
Наушники беспроводные н6 19.99
Верша 3 26.99
Антибликовые очки 4 29.99
Триммер для волос н4 29.99
Тушь н8 29.99
Ложки 5 39.99
Овощерезка универсальная 6 39.99
Закаточная машинка н2 49.99
Регистратор н3 59.99
Автомойка 7 69.99
Набор посуды н1 79.99
Краскопульт 8 99.99
Пила Makita 9 89.99
Триммер Makita 10 89.99
Колонка н5 99.99
Дрель шуруповерт н7 99.99
*/



$name = $_POST['name']; 
$phone = $_POST['phone']; 
$product = $_POST['product'];
if($product == 0){$offer_id = 16897; $price = 0;}

if($product == 1){$offer_id = 16215; $price = 19.99;}
if($product == 2){$offer_id = 15899; $price = 19.99;}
if($product == 3){$offer_id = 15813; $price = 19.99;}
if($product == 4){$offer_id = 17057; $price = 26.99;}
if($product == 5){$offer_id = 15876; $price = 29.99;}
if($product == 6){$offer_id = 17127; $price = 29.99;}
if($product == 7){$offer_id = 16344; $price = 29.99;}
if($product == 8){$offer_id = 16673; $price = 39.99;}
if($product == 9){$offer_id = 16138; $price = 39.99;}
if($product == 10){$offer_id = 16203; $price = 49.99;}
if($product == 11){$offer_id = 17231; $price = 59.99;}
if($product == 12){$offer_id = 16278; $price = 69.99;}
if($product == 13){$offer_id = 16663; $price = 79.99;}
if($product == 14){$offer_id = 16939; $price = 99.99;}
if($product == 15){$offer_id = 17088; $price = 89.99;}
if($product == 16){$offer_id = 16873; $price = 89.99;}
if($product == 17){$offer_id = 16625; $price = 99.99;}
if($product == 18){$offer_id = 16855; $price = 99.99;}

$api_token = 'Z9JWE4FPAFfjs6rEFTB2tqyOTyxQ1TH9oo4zmOyh0BpcKuioyTfIuAojIEBL';
$source_id = 282;
$quantity = 1; 

$message = [
    'api_token' => $api_token,
    'order' => [
        'phone' => $phone, 
        'name' => $name, 
        'source_id' => $source_id,
        'comment' => $urlRex,
        'products' => [
          [
              'offer_id' => $offer_id, 
              'price' => $price, 
              'quantity' => $quantity, 
          ]
            
        ]
    ],
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://saleup.spstudio.by/api/orders');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($message));
$result = json_decode(curl_exec($curl), true);

    
$email = "seilup@mail.ru";

$title = "noreply@" . $urlRex;

$text = "
Новый заказ с сайта " . $urlRex . "
Информация о покупателе:

Имя: " . $_POST['name'] . "
Телефон: " . $_POST['phone'] . "
Время заказа: " . date("Y-m-d H:i:s"). "
IP: " . $ip_client;

if (mail($email, $title, $text)) {
    header('Location: form-ok.php');
} else {
    echo "Ошибка.";
}
?>
