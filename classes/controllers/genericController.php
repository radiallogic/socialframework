<?php

abstract class genericController{
    protected $_db;
    public $_smarty;
    
    public function __construct(){
        $this->_db = new db();
        $this->_smarty = smartytube::getSmartyObj();
    }
    
    abstract public function display();
}