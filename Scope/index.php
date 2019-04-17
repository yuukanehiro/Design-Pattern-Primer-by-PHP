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

function globalScopeTest2()
{
    global $val;
    return $val;
}

echo "そのまま<br/>";
echo $val; //1
echo "<hr/>";


echo "ローカルスコープテスト 変わらず1のままのはず<br/>";
localScopeTest();
echo $val; //1
echo "<hr/>";

echo "グローバルスコープテスト 2に変わるはず<br/>";
globalScopeTest();
echo $val; //2
echo "<hr/>";


echo "グローバル変数の危険性<br/>";
echo globalScopeTest2(); // 2
echo "<hr/>";

$val = 9;
echo globalScopeTest2(); //9
echo "<hr/>";











