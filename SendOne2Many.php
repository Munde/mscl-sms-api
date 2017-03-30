<?php

class SendOne2Many{

	public static function send_sms($recepients,$sms,$sms_id){

		$mscl = new sms_api();
		$mscl->setUsername('username');
		$mscl->setPassword('password');

		$mscl->setMethod(sms_api::OUTPUT_XML); // With xml method
		$mscl->setMethod(sms_api::OUTPUT_JSON); // OR With json method
		$mscl->setMethod(sms_api::OUTPUT_PLAIN); // OR With plain method

		$message = new sms_message();

		$message->setSender('sender'); // Sender name
		$message->setText(escape($sms)); // Message

		//loop through givent recipients
		foreach($recepients as $res){
		  $message->setRecipients($res,time());
		}
		$mscl->addMessages(array(
				$message
		));
		$results = $mscl->sendSMS();

		if($results){
        //create sms log here using results array
			return true;
		}else{
			throw new Exception("Sending sms to users failed");
		}

	}
}
