<?php

class smartytube{
    public $smarty;
    
    public function __construct(){
        // This has been moved to the requires.php class 
        //require_once(SMARTY_DIR . 'Smarty.class.php');
        
        $this->smarty = new Smarty();
        
        $smarty->template_dir = 'templates/';
        $smarty->compile_dir  = 'templates_c/';
        $smarty->config_dir   = 'configs/';
        $smarty->cache_dir    = 'cache/';
    }
    
    public function getSmartyObj(){
        return $this->smarty;
    }
}

?>