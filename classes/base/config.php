<?php

class config {
    
    public $dbUser;
    public $dbPass;
    public $dbHost;
    public $dbName;
    
    public $fbName;
    public $fbAppId;
    public $fbAppSecret;
    
    public function __construct(){
        $this->dbUser = 'root';
        $this->dbPass = 'toortoor';
        $this->dbHost = '127.0.0.1';
        $this->dbName = 'elementsOfRisk';
        
        $this->fbConfig();
    }
    
    public function fbConfig(){
        $this->fbName = 'ElementsOfRisk';
        $this->fbAppId = '433813109972120';
        $this->fbAppSecret = '701a60181133b16402d0af23bb6bb139';
    }
    
}