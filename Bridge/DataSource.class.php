<?php

interface DataSource
{
    public function open();
    public function read();
    public function close();
}