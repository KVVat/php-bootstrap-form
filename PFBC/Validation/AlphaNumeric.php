<?php
class Validation_AlphaNumeric extends Validation_RegExp {
	protected $message = "�G���[: %element% �͔��p�̉p���L���ł���K�v������܂� (�����A�p���A�A���_�[�X�R�A����уn�C�t����������܂�)"

	public function __construct($message = "") {
		parent::__construct('/^[a-zA-Z0-9_\-\s\:\,\&]+$/', $message);
	}
}
