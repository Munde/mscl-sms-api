<?php
// Begin script

require_once 'sms_api.php';

$mscl = new sms_api();
$mscl->setUsername('username');
$mscl->setPassword('password');

// Send flash SMS --------------------------------------------------------

$mscl->setMethod(sms_api::OUTPUT_XML); // With xml method
$mscl->setMethod(sms_api::OUTPUT_JSON); // OR With json method
$mscl->setMethod(sms_api::OUTPUT_PLAIN); // OR With plain method

$message = new sms_message();

$message->setSender('sender id'); // Sender name
$message->setText('message'); // Message
$message->setFlash(sms_message::FLASH);
$message->setRecipients('+255712023083');

$mscl->addMessages(array(
    $message
));

$results = $mscl->sendSMS();

echo '<pre>';
print_r($results);
echo '</pre>';

// Return

/*
Array
(
    [0] => stdClass Object
        (
            [status] => 0
            [messageid] => mscl_message_id
            [destination] => phone1
        )

)
 */
