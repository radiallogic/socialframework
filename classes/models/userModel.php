<?php

class userModel extends genericModel{
    
    public $fbid;
    public $id;
    public $atitude;
    public $into;
    public $ability;
    
    public function load($id){
        $res = $this->_db->query('SELECT * FROM users WHERE fbid = ' . $id . '');
        
        $data = $res;
        
        $this->id = $data['id'];
        $this->fbid = $data['fbid'];
        $this->attitude = $data['fbid'];
        
        $this->into = explode(',', $data['into']);
        $this->ability = explode(',', $data['ability']);
        
    }
    
    public function save(){
        $query = "INSERT INTO users (id, fbid, attitude, into, abilty)  " .
        "VALUES (" . $this->id . "," .
        $this->fbid . "," .
        $this->attitude . "," .
        implode(',', $this->into) . "," .
        implode(',', $this->ability) . ",) ON DUPLICATE KEY UPDATE ";
        
        $res = $this->_db->query($query);
    }
}

?>