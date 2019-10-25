<?php
require_once 'User.class.php';

session_start();

$context = (isset($_SESSION['context']))? $_SESSION['context'] : null;
if (is_null($context)) {
    $context = new User('yuu');
}

$mode = (isset($_GET['mode']))? $_GET['mode'] : '';
switch($mode) {
case 'state':
    echo "状態を遷移します。";
    $context->switchState();
    break;
case 'inc':
    echo "カウントアップします。";
    $context->incrementCount();
    break;
case 'reset':
    echo "カウントをリセットします。";
    $context->resetCount();
    break;
}

$_SESSION['context'] = $context;

echo 'ようこそ' . $context->getUserName() . 'さん<br/>';
echo '現在、ログインして' . ($context->isAuthenticated()? 'います。' : 'いません。') . '<br/>';
echo '現在のカウント：' . $context->getCount() . '<br>';
echo $context->getMenu() . '<br>';

