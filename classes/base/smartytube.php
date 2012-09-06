<?php

class smartytube{
    public static $smarty;
    
    public static function getSmartyObj(){
        
        if (!self::$smarty){
            $smarty = new Smarty();
        
            $smarty->template_dir = 'templates/';
            $smarty->compile_dir  = 'templates_c/';
            $smarty->config_dir   = 'configs/';
            $smarty->cache_dir    = 'cache/';
            
            self::$smarty = $smarty; 
        } 

        return self::$smarty;
    }
}

?>