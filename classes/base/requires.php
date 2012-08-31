<?php

define('BASE', dirname(__file__) . '/../');

class requires{
    public function __construct(){
        /* Seperated to allow auto loading functionality per folder in the future*/
        $this->base();
        $this->controllers();
        $this->models();
        $this->libs();
    }
    
    public function base(){
        require_once(BASE . 'base/config.php');
        require_once(BASE . 'base/db.php');
        //require_once(BASE . 'base/rest.php');
        require_once(BASE . 'base/smartytube.php');
    }
    
    public function controllers(){
        require_once(BASE . 'controllers/genericController.php');
        require_once(BASE . 'controllers/adminController.php');
        require_once(BASE . 'controllers/mainController.php');
        
    }
    
    public function models(){
        require_once(BASE . 'models/genericModel.php');
        require_once(BASE . 'models/calenderModel.php');
        require_once(BASE . 'models/eventManagerModel.php');
        require_once(BASE . 'models/eventModel.php');
        //require_once(BASE . 'models/tweaterModel.php');
        require_once(BASE . 'models/userManagerModel.php');
        require_once(BASE . 'models/userModel.php');
        
        
    }
    
    public function libs(){
        require_once(BASE . '../libs/Smarty-3.1.11/libs/Smarty.class.php');
        require_once(BASE . '../libs/facebook-php-sdk-6c82b3f/src/facebook.php');
    }
}

$requires = new requires();
