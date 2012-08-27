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
    
    public function query($query, array $arguments, $data = True){
        if(substr_count($query, '?') != count($arguments) ){
            //throw exception
        }
        
        list($query, $arguments) = $this->parseArgs($query, $arguments);
        
        if($data){
            return $this->res2data($this->_mysqli->query($query) );
        }else{
            return $this->_mysqli->query($query);
        }
    }
    
    protected function parseArgs($query, $arguments){
        foreach($arguments as $arg){
            $arg = $this->_mysqli->escape_string($arg);
            $i = strpos($query,'?');
            $query = substr_replace($query,$arg,$i);
        }
        return array($query, $arguments);
    }
    
    public function raw($query){
        return $this->_mysqli->query($query);
    }
    
    public function res2data($res){
        //$res = $mysqli->use_result();
        $data = array();
        while ($row = $res->fetch_assoc() ) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function __destruct(){
        $this->_mysqli->close();
    }
    
    public function insert($table, $args){
        $query = 'INSERT INTO ' .
            $this->_mysqli->escape_string($table) .
            ' SET ';
        foreach($args as $key => $var){
            $var = $this->_mysqli->escape_string($var);
            $query = $key . " = '" . $var . "',";
        }
        $query = substr($query,0,strlen($query) -1 );
        
        return $this->_mysqli->query($query);
    }
    
    public function exists($value, $column, $table){
        $query = 'SELECT * FROM ' . $this->_mysqli->escape_string($table) .
            'WHERE ' . $this->_mysqli->escape_string($column) .
            ' = \'' . $this->_mysqli->escape_string($value) . '\'';
        
        $this->_mysqli->query($query);
        if($this->_mysqli->affected_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>