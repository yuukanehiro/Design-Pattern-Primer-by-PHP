<?php

/**
 * AbstractClassクラスに相当する
 */

abstract class AbstractDispaly
{

    /**
    * 表示するデータ
    */
    private $data;


    /**
    * コンストラクタ
    * @param mixed 表示するデータ
    */
    public function __construct($data)
    {
        if(!is_array($data))
        {
            $data = array($data);
        }
        $this->data = $data;
    }


    /**
    * template methodに相当する
    */
    public function display()
    {
        $this->displayHeader();
        $this->displayBody();
        $this->displayFotter();
    }


    /**
    * データを取得する
    */
    public function getData()
    {
        return $this->data;
    }













}
