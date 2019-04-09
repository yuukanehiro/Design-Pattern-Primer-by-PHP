<?php
require_once 'ReaderFactory.class.php';
?>
<html lang='ja'>
<head>
<title>農家と作物</title>
</head>
<body>
<?php
    /**
    * 入力ファイル
    */
    //$filename = 'data.csv';
    $filename = './data.xml';

    $factory = new ReaderFactory();
    $data = $factory->create($filename);
    $data->read();
    $data->display();
?>
</body>
</html>
