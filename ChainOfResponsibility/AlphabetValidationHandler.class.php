<?php
require_once 'ValidationHandler.class.php';

class AlphabetValidationHandler extends ValidationHandler
{
    /**
     * 自クラスが担当する処理を実行
     */
    protected function execValidation($input) {
        return preg_match('/^[a-z]*$/i', $input);
    }

    /**
     * 処理失敗時のメッセージを取得する
     */
    protected function getErrorMessage() {
        return '半角英字で入力してください。';
    }
}