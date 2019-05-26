<?php
require_once 'Employee.class.php';

// FilterIterator
// オブジェクトを包み込むクラス

class SalesmanIterator extends FilterIterator {

    public function __construct($iterator) {
        parent::__construct($iterator);
    }

    // ArrayIteratorオブジェクトに「動作を変更する」という機能を提供する為に、
    // accetpt()メソッドに取得する条件を実装する
    public function accept() {
        $employee = $this->current();
        return ( $employee->getJob() === 'SALESMAN' );
    }


}
