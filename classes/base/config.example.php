<?php

class config {
        
    public $url;
    
    public $dbUser;
    public $dbPass;
    public $dbHost;
    public $dbName;
    
    public $fbName;
    public $fbAppId;
    public $fbAppSecret;
    public $fbconfig;
    
    public function __construct(){
        $this->dbUser = 'root';
        $this->dbPass = 'toortoor';
        $this->dbHost = '127.0.0.1';
        $this->dbName = 'bristolHouse';
        
        $this->fbConfig();
        
        $this->url = 'http://127.0.0.1:8080/bristolHouse/';
        $this->canvaspage = $this->url;
    }
    
    public function fbConfig(){
        $this->fbName = 'bristolHouse';
        $this->fbAppId = '282683241837527';
        $this->fbAppSecret = 'a978c55a8539fc3c20bd01beee8cd247';
        
        $this->fbconfig = array($this->fbAppId, $this->fbAppSecret); // in the format needed for the fb sdk
    }
    
}