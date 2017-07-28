<?php
class Validation_Numeric extends Validation {
	protected $message = "エラー: %element% には数字を指定してください";

	public function isValid($value) {
		if($this->isNotApplicable($value) || is_numeric($value))
			return true;
		return false;	
	}
}
