<?php
//require_once();

class admin extends genericController{
    
    public $facebook;
    public $userMangerModel;
    public $event;
    public $eventManagerModel;
    
    public function __construct(){
        parent::__construct();
        $this->userMM = new userMangerModel();
    }
    
    
    public function display(){
        if(isset($_REQUEST['kind']) && $_REQUEST['kind'] == 'admin'){
            print('here');
            $this->add();
        }
        
        var_dump($_REQUEST);
        
        // template includes admin.tpl if this is true.
        $this->_smarty->assign('admin', 'true');
    }
    
    public function add(){
        // get event id
        $event_id = preg_match('/[0-9]+$/',$_REQUEST['text'] );
        
        //get all users
        $userModel = new userMangerModel();
        $userModel->load();
        
        //create event object
        $event = new eventModel();
        
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
    }


    
}