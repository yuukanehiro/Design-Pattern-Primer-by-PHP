<?php
require_once 'CSVFileReader.class.php';
require_once 'XMLFileReader.class.php';

/**
* Readerクラスのインスタンス生成を行うクラス
*/
class ReaderFactory
{
    /**
    * Readerクラスのインスタンスを生成する
    */
    public function create($filename)
    {
        $reader = $this->createReader($filename);
        return $reader;
    }


    /**
    * Readerクラスのサブクラスを条件判定し、生成する
    */
    private function createReader($filename)
    {
        $poscsv = stripos($filename, '.csv'); //指定文字列が見つからなかったらfalseと返る
        $posxml = stripos($filename, '.xml');

        if($poscsv !== false)
        {
            $r = new CSVFileReader($filename);
            return $r;
        }elseif($posxml !== false){
            return new XMLFileReader($filename);
        }else{
            die('This filename is not supported : ' . $filename);
        }
    }
}
