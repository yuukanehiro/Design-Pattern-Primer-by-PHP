<?php
require_once 'UserState.class.php';
require_once 'AuthorizedState.class.php';


class UnauthorizedState implements UserState
{
    private static $singleton = null;

    public function __construct() {
    }

    public static function getInstance() {
        if (is_null($singleton)) {
            self::$singleton = new UnauthorizedState();
        }
        return self::$singleton;
    }

    public function isAuthenticated() {
        return false;
    }

    public function nextState() {
        return AuthorizedState::getInstance();
    }

    public function getMenu() {
        $menu = '<a href="?mode=state">ログイン</a>';
        return $menu;
    }

    public final function __clone() {
        throw new RuntimeException ('Clone is not allowed against' . get_Class($this));
    }
}