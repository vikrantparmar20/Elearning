<?php

include('./stripe-php-master/init.php');
include('./dbConnection.php');

$publishableKey="pk_test_51IhCCvSBYFt86V9jpDGQZyXt5JzC3lmrY0x8tbtsoIrPnwOiwYJ4yV4bId2j4HC8hBciDT5vOW9OoD8Bsdmi9FRx00RQ9D1Vcr";

$secretKey="secret_key";

\Stripe\Stripe::setApiKey($secretKey);


?>
