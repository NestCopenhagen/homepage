<?php

$http_origin = $_SERVER['HTTP_ORIGIN'];
if (endsWith($http_origin, ".nestcopenhagen.dk")) {
    header("Access-Control-Allow-Origin: $http_origin");
}

require_once('vendor/autoload.php');

$stripeKey = file_get_contents('./STRIPE_KEY')

// This is currently the live key!
\Stripe\Stripe::setApiKey($stripeKey);

$token = $_POST['token'];
$email = $_POST['email'];
$quantity = floor(intval($_POST['amount']) / 10);
$type = $_POST['type'];

try {
  $customer = \Stripe\Customer::create(array(
    "source" => $token,
    "plan" => $type,
    "email" => $email,
    "quantity" => $quantity
  ));
  exit;
} catch(Exception $e) {
  print_r($e);
  print_r($e->getMessage());
  /*
  header('Location:oops.html');
  error_log("unable to sign up customer:" . $_POST['stripeEmail'].
    ", error:" . $e->getMessage());
    */
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
