<?php
class Validation_AlphaNumeric extends Validation_RegExp {
	protected $message = "エラー: %element% は半角の英数記号である必要があります (数字、英字、アンダースコアおよびハイフンが許されます)"

	public function __construct($message = "") {
		parent::__construct('/^[a-zA-Z0-9_\-\s\:\,\&]+$/', $message);
	}
}
