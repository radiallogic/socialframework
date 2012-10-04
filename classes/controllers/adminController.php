<?php
//require_once();

class admin extends genericController{
    
    public $facebook;
    public $userMangerModel;
    public $event;
    public $eventManagerModel;
    
    public function __construct($facebook){
        $this->facebook = $facebook;
        parent::__construct();
        $this->userMM = new userMangerModel();
    }
    
    
    public function display(){
        if(isset($_REQUEST['kind']) && $_REQUEST['kind'] == 'admin'){
            print('here');
            $this->add();
        }
        
        // template includes admin.tpl if this is true.
        $this->_smarty->assign('admin', 'true');
    }
    
    public function add(){
        var_dump($_REQUEST);
        
        // get event id
        $matches = array();
        $ret = preg_match('/https\:\/\/www\.facebook\.com\/events\/([0-9]+)/',$_REQUEST['url'], $matches);
        
        $event_id = $matches[1];
        if($ret){
            //get all users
            $userModel = new userMangerModel();
            $userModel->load();
            
            //create event object
            $event = new eventModel($this->facebook);
            
            if($event->add($event_id) ){
                foreach($userModel->users as $user){
                    $event->inviteUser($user);
                }
                
                // set message to everything is ok!
                $this->_smarty->assign('admin_message', 'everything is ok!');
            }else{
                // set message to event not found / couldn't be added to application
                $this->_smarty->assign('admin_message', 'event not found / couldn\'t be added to application');
            }   
        }else{
            $this->_smarty->assign('admin_message', 'please enter a valid event url');
        }
        
        
    }


    
}