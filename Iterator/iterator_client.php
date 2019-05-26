<?php
require_once 'Employee.class.php';
require_once 'Employees.class.php';
require_once 'SalesmanIterator.class.php';
?>

<?php
function dumpWithForeach($iterator) {
    echo '<ul>';
    foreach ($iterator as $employee) {
        printf('<li>%s (%d, %s)</li>',
        $employee->getName(),
        $employee->getAge(),
        $employee->getJob());
    }
    echo '</ul>';
    echo '<hr>';
}
?>

<?php

    $employees = new Employees();
    $employees->add( new Employee('SMITH', 32, 'CLERK') );
    $employees->add( new Employee('ALLEN', 26, 'SALESMAN') );
    $employees->add( new Employee('MARTIN', 50, 'SALESMAN') );
    $employees->add( new Employee('KATO', 44, 'MANAGER') );

    $iterator = $employees->getIterator();


    /**
    * iteratorメソッドを利用する
    **/

    echo '<ul>';
    while ($iterator->valid()) {
        $empoyee = $iterator->current();
        printf('<li>%s (%d, %s)</li>',
            $empoyee->getName(),
            $empoyee->getAge(),
            $empoyee->getJob());

        $iterator->next();
    }
    echo '</ul>';
    echo '<hr>';


    /**
    * foreachを利用する
    **/
    dumpWithForeach($iterator);


    /**
    * 異なるiteratorで要素を取得する
    **/
    dumpWithForeach(new SalesmanIterator($iterator));




