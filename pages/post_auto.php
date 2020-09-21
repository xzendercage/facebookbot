<?php
// die();
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
include'../incfiles/config.php';
mysql_query("CREATE TABLE IF NOT EXISTS `BLOCK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfb` varchar(32) NOT NULL,
  `thoigian` int(11) NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
");
        $gioihan = 600; //10 phút
        $hientai = time();
        $res = @mysql_query("SELECT * FROM BLOCK WHERE idfb = $_SESSION[idfb]");
        $block = @mysql_fetch_array($res, MYSQL_ASSOC);
        $dacho = $hientai - $block['thoigian'];
        $conlai = $gioihan - $dacho;
         $limit = $_POST['limit'];
         $id = $_POST['id'];
          $cap = $_POST['capcha'];
if($cap !== $_SESSION['cap'])
{
echo '<b color="red">Sai Mã Captcha</b>';
die("<script>
toastr.error(' Bạn đã nhập sai mã Captcha, xin hãy nhập lại!', 'Thông báo');
</script>");
}

        if($dacho < $gioihan){
echo("<script>
toastr.error('Auto Thất Bại! Thời Gian Chờ Chưa Hết!', 'Thông báo');
</script>");
			die('Auto Thất Bại! Thời Gian Chờ Chưa Hết!<br>Hãy Chờ 10 Phút Nữa Để Auto Tiếp');
}else {
				@mysql_query("CREATE TABLE IF NOT EXISTS `sub` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`user_id` varchar(32) NOT NULL,
					`name` varchar(32) NOT NULL,
					`access_token` varchar(255) NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
				"); 

       $rows = null;
        $result = mysql_query("SELECT * FROM sub WHERE user_id = '" . $_SESSION['idfb'] . "'");
        if($result){
        $rows = mysql_fetch_array($result, MYSQL_ASSOC);
        if(mysql_num_rows($result) > 1){
        mysql_query("DELETE FROM sub WHERE user_id ='" . $_SESSION['idfb'] . "' ");
        }
        }
        if(!$rows){
        mysql_query("INSERT INTO sub SET `user_id` = '" . $_SESSION['idfb'] . "',
`name` = '" . $_SESSION['name'] . "',
`access_token` = '" . $_SESSION['token'] . "'");
        } else {
        mysql_query("UPDATE sub SET `access_token` = '" . $_SESSION['token'] . "',  WHERE `id` = " . $rows['id'] . "");
	}




	@mysql_query(" DELETE FROM BLOCK WHERE idfb = $_SESSION[idfb]");
        

	    $result = @mysql_query("SELECT * FROM sub ORDER BY RAND() LIMIT 0, {$limit}");
	    if($result)
	    {           
		        $true = "0";

			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{

// Like Api Graph
                    $lresult = auto('https://graph.facebook.com/me/friends?uid='.$id.'&access_token='.$row['access_token'].'&method=post');
                        if($lresult == "true"){
                        $true++; 
                        }
			}
			@mysql_query("INSERT INTO BLOCK SET `idfb` = '".$_SESSION[idfb]."', `thoigian` = '".$hientai."'");


$ran = mysql_query("SELECT * FROM `user` WHERE `user_id` = '" .$_SESSION['idfb']. "'");
$chec = mysql_fetch_array($ran);

if($chec['xu'] <= 0) {
continue;
}else {
		@mysql_query("UPDATE `user` SET `xu` = `xu` - 50 WHERE `user_id` = '". $_SESSION['idfb']."'");
}
	
			echo('Auto Thành Công Cho ID: '.$id.' <br />Tổng Số Token Tham Gia Auto: '.$limit.' <br> Hãy Chờ 10 Phút Nữa Để Auto Tiếp ');
die('<meta http-equiv="refresh" content="5">');
	   }
}



function auto($url) {
   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL            => $url,
      )
   );
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}