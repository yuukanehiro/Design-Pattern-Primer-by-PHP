<?php
require_once 'Employee.class.php';

// SPL(Standard PHP Library)

// ArrayObjectクラス
// 配列をオブジェクトとして扱うためのラッパークラス

// ArrayIteratorクラス
// 配列用のiteratorクラス。ConcreteIteeratorクラスに相当する

// FilterIteratorクラス
// iterator用のフィルタクラス。また中小クラスとして定義されているため、
// 利用するにはクラスの継承を行い、acceptメソッドを実装する必要がある

// IteratorAggregateクラス
// Aggregateクラスに相当する。
// Iteratorを生成する為のメソッドgetIteratorが宣言されている

class Employees implements IteratorAggregate {

    private $employees;

    public function __construct() 
    {
        $this->employees = new ArrayObject();
    }
 

    public function add(Employee $employee) 
    {
        $this->employees[] = $employee;   
    }

    public function getIterator()
    {
        return $this->employees->getIterator();
    }

}
