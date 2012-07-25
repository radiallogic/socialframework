<?php
class db{
    protected $_config;
    
    protected $_mysqli;
    
    public function __construct(){
        $this->_config = new config();
        
        $this->_mysqli = new mysqli($this->_config->dbHost,
                                    $this->_config->dbUser,
                                    $this->_config->dbPass,
                                    $this->_config->dbName);
        
        /* check connection */
        if ($this->_mysqli->connect_errno) {
            error_log("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
    }
    
    public function query($query){
        
        //TODO: escape $query
        
        if ($this->_mysqli->query("INSERT INTO coupons SET code = '" . $code. "' ") === TRUE) {
            return true;
        }else{
            return false;
        }

    }
    
    public function __destruct(){
        $this->_mysqli->close();
    }
}
?>