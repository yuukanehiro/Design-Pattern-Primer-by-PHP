<?php
require_once 'SingletonSample.class.php';
ini_set( 'display_errors', 1 );

    /**
    * インスタンスを2つ取得する
    */
    $instance1 = SingletonSample::getInstance();
    sleep(1);
    $instance2 = SingletonSample::getInstance();

    echo '<hr/>';


    /**
    * 2つのインスタンスが同一IDかどうかを確認する
    */
    echo 'instance ID : ' . $instance1->getId() . '<br/>';
    echo '$instance1->getId() === $instance2->getId() : ' . ($instance1->getId() === $instance2->getId()? 'ture' : 'false');

    echo '<hr/>';


    /**
    * 複製できないことを確認
    */
    $instance1_clone = clone $instance1;
