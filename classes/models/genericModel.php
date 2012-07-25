<?php

abstract class genericModel{
    
    public $_db;
    
    public function __construct(){
        $this->_db = new db();
    }
    
    abstract public function load();
    abstract public function save();
    
}

?>