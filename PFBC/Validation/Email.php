<?php
class Validation_Email extends Validation {
	protected $message = "エラー: %element% はメールアドレスである必要があります。";

	public function isValid($value) {
		if($this->isNotApplicable($value) || filter_var($value, FILTER_VALIDATE_EMAIL))
			return true;
		return false;	
	}
}
