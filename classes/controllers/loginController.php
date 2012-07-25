<?php


//uses the PHP SDK.  Download from https://github.com/facebook/php-sdk
require_once( 'facebook-php-sdk/src/facebook.php');

class login extends genericController{
    
    public function display(){
        $facebook = new Facebook(array(
  'appId'  => $config->fbAppId,
  'secret' => $config->fbAppSecret,
));

$userId = $facebook->getUser();

?>

<html>
  <body>
    <div id="fb-root"></div>
    <?php if ($userId) { 
      $userInfo = $facebook->api('/' + $userId); ?>
      Welcome <?= $userInfo['name'] ?>
    <?php } else { ?>
    <fb:login-button></fb:login-button>
    <?php } ?>


        <div id="fb-root"></div>
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : 'YOUR_APP_ID', // App ID
              channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
              status     : true, // check login status
              cookie     : true, // enable cookies to allow the server to access the session
              xfbml      : true  // parse XFBML
            });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
          };
          // Load the SDK Asynchronously
          (function(d){
             var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement('script'); js.id = id; js.async = true;
             js.src = "//connect.facebook.net/en_US/all.js";
             ref.parentNode.insertBefore(js, ref);
           }(document));
        </script>

  </body>
</html>
    }
}


