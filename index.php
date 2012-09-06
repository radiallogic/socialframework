<?php
require_once('classes/base/requires.php');

$config = new config();
$db = new db();

    $auth_url = "https://www.facebook.com/dialog/oauth?client_id=" 
           . $config->fbAppId . "&redirect_uri=" . urlencode($config->canvaspage);

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
    $res = $db->raw('SELECT * FROM users WHERE fbid = "' . $data['user_id'] . '" limit 1');
    $dbdata = $db->res2data($res);
    
    //var_dump($dbdata);
    
    if(empty($dbdata) ){
        print('insert');
        // add to db
        $db->insert('users', array('fbid' => $data['user_id']) );
    }
    
    $main = new main();
    $main->display();
    
    if(!empty($dbdata) && $dbdata[0]['promoter'] == 'yes'){
        //show admin panel
        print('admin');
        $main = new admin();
        $main->display();
    }

    $smarty = smartytube::getSmartyObj();
    $smarty->display('index.tpl');