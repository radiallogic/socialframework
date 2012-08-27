<?php

class main extends genericController{
    
    public function __construct(){
        parent::__construct();
        $this->eventManager = new eventManager();
        
    }
    
    public function display(){
        //load calander
        $time = gettimeofday();
        $time = getdate($time['sec']); 
    
        $calender = new calender($time);
        $calender->build();
    
        $this->smarty->assign('calender', $calender->getArray() );
        //$this->smarty->display('calender.tpl');
    }
    
}