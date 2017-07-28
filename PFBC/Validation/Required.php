<?php
class Validation_Required extends Validation {
	protected $message = "エラー: %element% は必須です";

	public function isValid($value) {
		$valid = false;
		if(!is_null($value) && ((!is_array($value) && $value !== "") || (is_array($value) && !empty($value))))
			$valid = true;
		return $valid;	
	}
}
