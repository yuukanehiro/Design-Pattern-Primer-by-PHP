<?php
require_once 'ReadItemDataStrategy.class.php';

class ReadTabSeparatedDataStrategy extends ReadItemDataStrategy
{
    protected function readData($filename) {
        $fp = fopen($filename, 'r');

        // ヘッダを取り除く
        $dummy = fgets($fp, 4096);

        // データの読み込み
        $return_value = array();

        while ($buffer = fgets($fp, 4096)) {
            list($item_code, $item_name, $price, $release_date) = explode("\t", $buffer);

            $obj = new stdClass();
            $obj->item_code = $item_code;
            $obj->name = $item_name;
            $obj->price = $item_price;

            list($year, $mon, $day) = explode('/', $release_date);
            //  mktime (時, 分, 秒, 月, 日, 年, サマータイム);
            $obj->release_date = mktime(0,0,0,
                                      $mon,
                                      $day,
                                      $year
                               );

            $return_value[] = $obj;
        }
        fclose($fp);
        return $return_value;
    }
}