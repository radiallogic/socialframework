<?php

class eventManger extends genericModel{
    
    public $events;
    
    public function __construct(){

    }
    
    public function load($id = 0){
        $this->users = array();
        parent::__construct();
        
        $res = $this->_db->raw('SELECT * FROM events');
        $data = $this->_db->res2data($res);
        
        var_dump($data);
        
        $this->events = $data;
    }
    
    public function save(){
        print('Not implemented');
    }
}
?>