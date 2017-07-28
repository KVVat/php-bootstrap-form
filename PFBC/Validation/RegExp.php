<?php
class Validation_RegExp extends Validation {
	protected $message = "エラー: %element% に許可されていない文字が含まれています";
	protected $pattern;

	public function __construct($pattern, $message = "") {
		$this->pattern = $pattern;
		parent::__construct($message);
	}

	public function isValid($value) {
		if($this->isNotApplicable($value) || preg_match($this->pattern, $value))
			return true;
		return false;	
	}
}
