<?php

abstract class genericController{
    protected $_db;
    
    
    public function __controller(){
        $this->_db = new db();
    }
    
    abstract public function display();
}