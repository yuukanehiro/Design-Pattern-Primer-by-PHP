<?php
require_once 'ReadItemDataStrategy.class.php';

class ReadFixedLengthDataStrategy extends ReadItemDataStrategy
{
  protected function readData($filename) {
    $fp = fopen($filename, 'r');

    // ヘッダを取り除く
    $dummy = fgets($fp, 4096);

    // データの読み込み
    $return_value = array();

    while ($buffer = fgets($fp, 4096)) {
        $item_name = trim(substr($buffer, 0, 20));
        $item_code = trim(substr($buffer, 20, 10));
        $price = (int) trim(substr($buffer, 30, 8));
        $release_date = trim(substr($buffer, 38));

        $obj = new stdClass();
        $obj->item_name = $item_name;
        $obj->item_code = $item_code;
        $obj->price = $price;

        //var_dump(substr($release_date, 6, 2));
        //exit();

        $release_date = mktime(0,0,0,
                                     substr($release_date, 4, 2),
                                     substr($release_date, 6, 2),
                                     substr($release_date, 0, 4)
                              );
        $obj->release_date = $release_date;

        $return_value[] = $obj;
    }
    fclose($fp);
    return $return_value;
}
}


