<?
$host = "localhost";  // MySQL DB Host
$username = "b8c35f9ee7d78d";  // Enter MySQL DB User
$password = "29d365c12a10bb1";	 // Enter MySQL DB Pass
$dbname = "heroku_dd9dce559f8f7b7"; // Enter MySQL DB Name
$connection = mysql_connect($host,$username,$password);
if (!$connection)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
?>
