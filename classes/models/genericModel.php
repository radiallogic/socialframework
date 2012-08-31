<?php

abstract class genericModel{
    
    public $_db;
    
    public function __construct(){
        $this->_db = new db();
    }
    
    // These force code out of constructors and insure code granularity 
    abstract public function load($id);
    abstract public function save();
    
}

?>