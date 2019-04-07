<?php
require_once 'AbstractDisplay.class.php';

/**
* ConcreteClassクラスに相当する
*/
class ListDisplay extends AbstractDisplay
{

    /**
    * ヘッダを表示する
    */
    protected function displayHeader()
    {
        echo '<dl>';
    }


    /**
    * ボディを表示する
    */
    protected function displayBody()
    {
        foreach($this->getData() as $key => $value)
        {
            echo '<dt>Item ' . $key . '</dt>';
            echo '<dd>Item ' . $value . '</dd>';   
        }
    }


    /**
    * フッタを表示する
    */
    protected function displayFooter()
    {
        echo '</dl>';
    }

}





