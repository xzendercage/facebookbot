<?
$host = "localhost";  // MySQL DB Host
$username = "b5fbdfdb966f68";  // Enter MySQL DB User
$password = "31261a8602c5575";	 // Enter MySQL DB Pass
$dbname = "heroku_51cd5c35187305a"; // Enter MySQL DB Name
$connection = mysql_connect($host,$username,$password);
if (!$connection)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
?>
