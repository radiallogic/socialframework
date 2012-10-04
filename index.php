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
        print_r('sdf');
        //exit;
        echo("<script> top.location.href='" . $auth_url . "'</script>");
    } else {
        //echo ("Welcome User: " . $data["user_id"]);
    }
    
    // Initialize a Facebook instance from the PHP SDK
    $facebook = new Facebook($config->fbconfig);
    error_log($facebook->getAccessToken() );
    $user_id = $facebook->getUser();
    
    //check new user
    $res = $db->raw('SELECT * FROM users WHERE fbid = "' . $data['user_id'] . '" limit 1');
    $dbdata = $db->res2data($res);
    
    if(empty($dbdata) ){
        //print('insert');
        // add to db
        $db->insert('users', array('fbid' => $data['user_id']) );
    }
    
    $main = new main();
    $main->display();
    
    if(!empty($dbdata) && $dbdata[0]['promoter'] == 'yes'){
        //show admin panel
        //print('admin');
        $main = new admin($facebook);
        $main->display();
    }

    $smarty = smartytube::getSmartyObj();
    $smarty->assign('request',$_REQUEST['signed_request']);
    $smarty->display('index.tpl');
    
    print_r($_REQUEST);