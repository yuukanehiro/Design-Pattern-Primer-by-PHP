<?php
/**
 * Handlerクラスに相当する
 */
abstract class ValidationHandler
{
    private $next_handler;

    public function __construct() {
        $this->next_handler = null;
    }

    public function setHandler(ValidationHandler $handler) {
        $this->next_handler = $handler;
        return $this;
    }

    public function getNextHandler() {
        return $this->next_handler;
    }

    /**
     * チェーンの実行
     */
    public function validate($input) {
        $result = $this->execValidation($input);
        if (!$result) {
            return $this->getErrorMessage();
        } else if (!is_null($this->getNextHandler())) {
            return $this->getNextHandler()->validate($input);
        } else {
            return true;
        }
    }

    /**
     * 自クラスが担当する処理を記述
     */
    protected abstract function execValidation($input);

    /**
     * 処理失敗時のメッセージを取得する
     */
    protected abstract function getErrorMessage();

}