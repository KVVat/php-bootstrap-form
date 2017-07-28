<?php
class Validation_Url extends Validation {
	protected $message = "エラー: %element% はURLである必要があります (例: http://www.google.com).";

	public function isValid($value) {
		if($this->isNotApplicable($value) || filter_var($value, FILTER_VALIDATE_URL))
			return true;
		return false;	
	}
}
