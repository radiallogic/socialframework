<?php

class userMangerModel extends genericModel{
    
    public $users;
    
    public function load($i = 0 ){
        $this->users = array();
        
        $res = $this->_db->raw('SELECT * FROM users');
        $data = $this->_db->res2data($res);
        
        //var_dump($data);
        
        $this->users = $data;
    }
    
    public function save(){
        print('Not implemented');
    }
    
}
?>