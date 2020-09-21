<?php
error_reporting(E_ALL & ~ E_NOTICE); // Block the error message

define('API_SECRET', 'c1e620fa708a1d5696fb991c1bde5662'); // Api secret of iphone app

/** GET string function **/
function sign_creator(&$data){
	$sig = "";
	foreach($data as $key => $value){
		$sig .= "$key=$value";
	}
	$sig .= API_SECRET;
	$sig = md5($sig);
	return $data['sig'] = $sig;
}

/** The array containing the info needed for api fb **/
$data = array(
	"api_key" => "3e7c78e35a76a9299309885393b02d97",
	"email" => @$_POST['u'],
	"format" => "JSON",
	"locale" => "vi_vn",
	"method" => "auth.login",
	"password" => @$_POST['p'],
	"return_ssl_resources" => "0",
	"v" => "1.0"
);


sign_creator($data); // Creates a GET array for arrays $data
echo '<a class="btn btn-success" href="';
echo 'https://api.facebook.com/restserver.php?'.http_build_query($data); // Show out link results
echo '">Click here</a>';

?>