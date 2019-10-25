<?php
require_once 'DataCaretaker.class.php';
require_once 'Data.class.php';
session_start();


$caretaker = new DataCaretaker();

$data = (isset($_SESSION['data']))? $_SESSION['data'] : new Data();
$mode = (isset($_POST['mode']))? $_POST['mode'] : '';

switch ($mode) {
case 'add':
    $data->addComment(isset($_POST['comment'])? $_POST['comment'] : '');
    break;

case 'save':
    $caretaker->setSnapshot($data->takeSnapshot());
    echo "データを保存しました。";
    break;

case 'restore':
    $data->restoreSnapshot($caretaker->getSnapshot());
    echo "データを復元しました。";
    break;

case 'clear':
    $data = new Data();
    break;
}

echo "<ol>";
foreach($data->getComment() as $comment) {
    echo "<li>"
    . htmlspecialchars($comment, ENT_QUOTES, 'euc-jp')
    . "</li>";
}
echo "</ol>";

$_SESSION['data'] = $data;

var_dump($_SESSION);
var_dump($_POST);


?>
<form action="" method="POST">
    <input type="text" name="comment">
    <input type="submit" name="mode" value="add">
    <input type="submit" name="mode" value="save">
    <input type="submit" name="mode" value="restore">
    <input type="submit" name="mode" value="clear">
</form>