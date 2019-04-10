<?php
require_once 'Product.class.php';


$data = "おこめ";

$obj = new Product($data);
echo $obj->getName();
