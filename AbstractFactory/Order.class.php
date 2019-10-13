<?php

class Order
{
    private $id;
    private $items;

    public function __construct($id) {
        $this->id = $id;
        $this->items = array();
    }

    public function addItem(Item $item) {
        $id = $item->getId();
        if (!array_key_exists($id, $this->items)) {
            $item[$id]['object'] = $item;
            $item[$id]['amount'] = 0;
        }
        $this->items[$id]['amount']++;
    }

    public function getItems() {
        return $this->items;
    }

    public function getId() {
        return $this->id;
    }
}