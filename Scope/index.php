<?php

$val = (int) 1;


function localScopeTest()
{
    $val = (int) -1;
}

function globalScopeTest()
{
    global $val;
    $val = (int) 2;
}

echo "そのまま<br/>";
echo $val;
echo "<hr/>";

echo "ローカルスコープテスト 変わらず1のままのはず<br/>";
localScopeTest();
echo $val;
echo "<hr/>";

echo "グローバルスコープテスト 2に変わるはず<br/>";
globalScopeTest();
echo $val;





