<?php
require_once 'UnauthorizedState.class.php';


class User
{
    private $name;
    private $state;
    private $count = 0;

    public function __construct($name) {
        $this->name = $name;

        $this->state = UnauthorizedState::getInstance();
        $this->resetCount();
    }

    public function switchState() {
        echo "状態繊維" . get_class($this->state) . "→" . '<br>';
        $this->state = $this->state->nextState();
        echo get_class($this->state) . '<br>';
        $this->resetCount();
    }

    public function getMenu() {
         return $this->state->getMenu();
    }

    public function isAuthenticated() {
      return $this->state->isAuthenticated();
    }

    public function getUserName() {
        return $this->name;
    }

    public function getCount() {
        return $this->count;
    }

    public function incrementCount() {
        $this->count++;
    }

    public function resetCount() {
        $this->count = 0;
    }
}