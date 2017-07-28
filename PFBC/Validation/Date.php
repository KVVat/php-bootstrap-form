<?php
class Validation_Date extends Validation {
    protected $message = "エラー: %element% は正常な日付である必要があります。";

    public function isValid($value) {
        try {
            $date = new DateTime($value);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}
