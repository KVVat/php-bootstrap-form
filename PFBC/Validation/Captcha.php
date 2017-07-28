<?php
class Validation_Captcha extends Validation {
	protected $message = "エラー: reCATPCHA の応答が正しくありません。再度試してください.";
	protected $privateKey;

	public function __construct($privateKey, $message = "") {
		$this->privateKey = $privateKey;
		if(!empty($message))
			$this->message = $message;
	}

	public function isValid($value) {
		require_once(dirname(__FILE__) . "/../Resources/recaptchalib.php");
		$resp = recaptcha_check_answer ($this->privateKey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
		if($resp->is_valid)
			return true;
		else	
			return false;
	}
}
