<?php
require_once 'ItemDataContext.class.php';
require_once 'ReadFixedLengthDataStrategy.class.php';
require_once 'ReadTabSeparatedDataStrategy.class.php';
require_once 'ReadItemDataStrategy.class.php';

function dumpData($data) {
    echo "<dl>";
    foreach ($data as $obj) {
        echo '<dt>' . $obj->item_name . '</dt>';
        echo '<dd>' . $obj->item_code . '</dd>';
        echo '<dd>' . $obj->price . '</dd>';
        echo '<dd>' . $obj->release_date . '</dd>';
    }
    echo "</dl>";
}

$strategy1 = new ReadFixedLengthDataStrategy('fixed_length_data.txt');
$context1 = new ItemDataContext($strategy1);
//var_dump($context1->getItemData());
dumpData($context1->getItemData());

echo "<hr/>";

$strategy2 = new ReadTabSeparatedDataStrategy('fixed_length_data.txt');
$context2 = new ItemDataContext($strategy2);
dumpData($context2->getItemData());

