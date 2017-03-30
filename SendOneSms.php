<?php

class SendOneSms{

	public static function send_sms($number,$sms,$sms_id){

		$mscl = new sms_api();
		$mscl->setUsername('username');
		$mscl->setPassword('password');

		// Send 1 SMS to 1 --------------------------------------------------------

		$mscl->setMethod(sms_api::OUTPUT_XML); // With xml method
		$mscl->setMethod(sms_api::OUTPUT_JSON); // OR With json method
		$mscl->setMethod(sms_api::OUTPUT_PLAIN); // OR With plain method

		$message = new sms_message();

		$message->setSender('sender'); // Sender name
		$message->setText($sms); // Message
		$message->setRecipients($number);
		//$message->setRecipients('phone1', 'messageID'); // With custom message id

		$mscl->addMessages(array(
				$message
		));
		$results = $mscl->sendSMS();
		if($results){
			//logics goes here for creating logs
			return true;
		}else{
			throw new Exception("Message sending failed");
		}
	}
}
