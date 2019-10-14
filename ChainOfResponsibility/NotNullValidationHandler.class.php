<?php
require_once 'ValidationHandler.class.php';

class NotNullValidationHandler extends ValidationHandler
{
    /**
     * 自クラスが担当する処理を記述
     */
    public function execValidation($input) {
        return (is_string($input) && $input !== '');
    }

    /**
     * 処理失敗時のメッセージを取得する
     */
    protected function getErrorMessage() {
        return '入力されていません。';
    }
}