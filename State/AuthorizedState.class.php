<?php
require_once 'UserState.class.php';
require_once 'UnauthorizedState.class.php';


class AuthorizedState implements UserState
{
    private static $singleton = null;

    public function __construct() {
    }

    public static function getInstance() {
        if (is_null($singleton)) {
            self::$singleton = new AuthorizedState();
        }
        return self::$singleton;
    }

    public function isAuthenticated() {
        return true;
    }

    public function nextState() {
        return UnauthorizedState::getInstance();
    }

    public function getMenu() {
        $menu = '<a href="?mode=inc">カウントアップ</a> |'
              . '<a href="?mode=reset">リセット</a> |'
              . '<a href="?mode=state">ログアウト</a>';
        return $menu;
    }

    public final function __clone() {
        throw new RuntimeException ('Clone is not allowed against' . get_Class($this));
    }
}










