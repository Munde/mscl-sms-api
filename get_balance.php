<?php


// Begin script

require_once 'sms_api.php';

$mscl = new sms_api();
$mscl->setUsername('username');
$mscl->setPassword('password');

// OR
$mscl = new sms_api(array(
    sms_api::USERNAME => 'username',
    sms_api::PASSWORD => 'password'
));

// Get balance -------------------------------------------------
$balance = $mscl->getBalance();

echo '<pre>';
print_r($balance);
echo '</pre>';

// Return
/*
  stdClass Object
  (
        [value] => 0.7900
        [currency] => �
  )
 */

echo $balance->value;
echo $balance->currency;
