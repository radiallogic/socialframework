<?php

class userModel extends genericModel{
    
    public $fbid;
    public $id;
    
    public function load($id){
        $res = $this->_db->query('SELECT * FROM users WHERE fbid = ' . $id . '');
        
        $data = $res;
        
        $this->id = $data['id'];
        $this->fbid = $data['fbid'];
        
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