<?php

abstract class ReadItemDataStrategy
{
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function getData() {
        if (!is_readable($this->getFileName())) {
            throw new Exception('file ' . $this->getFileName() . "is not Readable");
        }
        return $this->readData($this->filename);
    }

    public function getFilename() {
        return $this->filename;
    }

    protected abstract function readData($filename);
}
