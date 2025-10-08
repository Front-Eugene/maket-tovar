

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



$name = $_POST['name']; 
$phone = $_POST['phone']; 

if (!preg_match("/^\+375\s?\(?\s?(29|25|33|44)\s?\)?[-\s]?\d{3}[-\s]?\d{2}[-\s]?\d{2}$/", $phone)) {
  echo "<h1> Ошибка! Неверный формат телефона. Вернитесь <a style='color: blue;' onclick='javascript:history.back();'>НАЗАД</a>, проверьте данные и попытайтесь снова.</h1>";
  exit();
}
// Проверка, была ли уже отправлена заявка
if (isset($_SESSION['form_submitted_katushki']) && $_SESSION['form_submitted_katushki'] === true) {
  die("Вы уже отправили заявку.");
} else {
  $_SESSION['form_submitted_katushki'] = true; // Помечаем, что заявка отправлена
}
$api_token = 'Z9JWE4FPAFfjs6rEFTB2tqyOTyxQ1TH9oo4zmOyh0BpcKuioyTfIuAojIEBL';
$source_id = 278;
$quantity = 1; 
$offer_id = 17548;
$price = 89.99;
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
    header('Location: thanks.php');
} else {
    echo "Ошибка.";
}
?>
