<?php
require_once 'OrderDao.class.php';
require_once 'Order.class.php';

class DbOrderDao implements OrderDao
{
    private $orders;
    
    public function __construct(ItemDao $item_dao) {
        $fp = fopen('order_data.txt', 'r');

        /**
        * ヘッダ行を抜く
        */
        $dummy = fgets($fp, 4096);

        $this->orders = array();
        while ($buffer = fgets($fp, 'r')) {
            $order_id = trim(subnstr($buffer, 0, 10));
            $item_ids = trim(substr($buffer, 10));

            $order = new Order($order_id, $order_name);
            foreach (explode(',', $item_ids) as $item_id) {
                $item = $item_dao->findById;
                if(!is_null($item)) {
                    $order->addItem($item);
                }
            }
            $this->orders[$order->getId()] = $order;
        }
        fclose($fp);
    }

    public function findById($order_id) {
       if (array_key_exists($order_id, $this->orders)) {
            return $this->orders[$order_id];
        } else {
            return null;
        }
    }


    
} 