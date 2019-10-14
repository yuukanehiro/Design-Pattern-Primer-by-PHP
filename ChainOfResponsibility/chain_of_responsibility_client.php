<?php
require_once 'MaxLengthValidationHandler.class.php';                                   
require_once 'NotNullValidationHandler.class.php';

    if (isset($_POST['validate_type']) && isset($_POST['input'])) {
        $validate_type = $_POST['validate_type'];
        $input = $_POST['input'];

        /**
         * チェーンの作成
         * validate_typeの値によってチェーンを動的に変更
         */
        $handler = new NotNullValidationHandler();
        $handler->setHandler(new MaxLengthValidationHandler(8));

        switch ($validate_type) {
        case 1:
            include_once 'AlphabetValidationHandler.class.php';
            $handler->setHandler(new AlphabetValidationHandler());
            break;
        case 2:
            include_once 'NumberValidationHandler.class.php';
            $handler->setHandler(new NumberValidationHandler());
            break;
        }

        /**
         * 処理実行と結果メッセージの表示
         */
        $result = $handler->validate($_POST['input']);
        if ($result === false) {
            echo '検証できませんでした。';
        } else if (is_string($result) && $result !== '') {
            echo '<p style="color: #dd0000;">' . $result . '</p>';
        } else {
            echo '<p style="color: #008800;">OK</p>';
        }
    }
?>

<form action="" method="post">
  <div>
    値：<input type="text" name="input">
  </div>
  <div>
    検証内容：<select name="validate_type">
        <option value="0">任意</option>
        <option value="1">半角英字で入力されているか</option>
        <option value="2">半角数字で入力されているか</option>
    </select>
  </div>
  <div>
    <input type="submit">
  </div>
</form>