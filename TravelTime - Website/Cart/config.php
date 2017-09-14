<?php
//$fileLocation = dirname(dirname(__DIR__));
require_once( '../vendor/autoload.php');
$stripe = array(
    'secret_key'      => 'sk_test_zYDGI34Psr5furKp9agiL8zl',
    'publishable_key' => 'pk_test_ewWZIOqbNVEzCpvTUY9tC5ww'
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);





/*
 *
 *
 'secret_key'      => 'sk_test_zp7BgjSf8ixmOCwbZZf85gNt',
 'publishable_key' => 'pk_test_MsgX6o5CMsICHHaOEFH0g0f6'
 *
 * */

?>