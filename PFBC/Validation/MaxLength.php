<?php
namespace PFBC\Validation;

class MaxLength extends \PFBC\Validation {
	protected $message;
	protected $limit;

	public function __construct($limit, $message = "") {
		$this->limit = $limit;
		if(empty($message))
			$message = "%element% は " . $limit . " 文字以内で記入してください。";
		parent::__construct($message);
	}

	public function isValid($value) {
		if($this->isNotApplicable($value) || strlen($value) <= $this->limit)
			return true;
		return false;	
	}
}
