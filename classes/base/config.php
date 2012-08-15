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
        $this->dbName = 'elementsOfRisk';
        
        $this->fbConfig();
        
        $this->url = 'http://www.radiallogic.co.uk/bristolhouse/';
        $this->canvaspage = '';
    }
    
    public function fbConfig(){
        $this->fbName = 'ElementsOfRisk';
        $this->fbAppId = '433813109972120';
        $this->fbAppSecret = '701a60181133b16402d0af23bb6bb139';
        
        $this->fbconfig = array($this->fbAppId, $this->fbAppSecret); // in the format needed for the fb sdk
    }
    
}