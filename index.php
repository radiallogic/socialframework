<?php
//
//define('__ROOT__', dirname(dirname(__FILE__))); 
//require_once(__ROOT__.'/config.php'); 

require_once('classes/base/config.php');
require_once('classes/base/db.php');
require_once('/libs/Smarty-3.1.11/libs/Smarty.class.php');

$config = new config();
$config = new db();

    $auth_url = "https://www.facebook.com/dialog/oauth?client_id=" 
           . $config->fbAppId . "&redirect_uri=" . urlencode($config->canvas_page);

    $signed_request = $_REQUEST["signed_request"];

    list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

    $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

    if (empty($data["user_id"])) {
           echo("<script> top.location.href='" . $auth_url . "'</script>");
    } else {
           echo ("Welcome User: " . $data["user_id"]);
    }
    
    // Initialize a Facebook instance from the PHP SDK
    $facebook = new Facebook($config->fbconfig);
    $user_id = $facebook->getUser();
    
    //check new user
    $res = $db->raw('SELECT * FROM users WHERE fbid = "' . $user_id . '" limit 1');
    $data = $db->res2data($res);
    
    if(empty($data) ){
        // add to db
        $db->insert('users', array('fbid' => $user_id) );
    }
    
    require_once ('controllers/mainController.php');
    $main = new main();
    $main->display();
    
    if(!empty($data) && $data[0]['promoter'] == 'True'){
        //show admin panel
        require_once ('controllers/adminController.php');
        $main = new admin();
        $main->display();
    }
