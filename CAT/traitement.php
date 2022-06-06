<?php
include_once('stripe/init.php');
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
Stripe\Stripe::setApiKey("#sk_test_51L7HRGDH5EHXWRr8Wh4wMeZvyOj9vRUHxT7ZUWerRO3gioWKDUqYDnCzJh1Z55g8rDVAERIA2KCo8rVbXE224Kcu00uQy1ueSI");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

$charge = \Stripe\Charge::create([
    'amount' => 100, //1EURO
    'currency' => 'eur',
    'description' => 'Test paiempent',
    'source' => $token,
]);
var_dump($charge);
?>
