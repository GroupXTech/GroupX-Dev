  <?php
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");



$hostname = 'localhost';
$username = 'admin';
$password = 'austin67'; 
$database = 'ppymca';
$eventtable ='trilakes_groupxroom_events';


$db_connection = mysql_connect($hostname,$username,$password) or die (mysql_error());
$db_select = mysql_select_db($database) or die (mysql_error());  

// Query the database.
$str_query = 'SELECT * FROM trilakes_groupxroom_events LIMIT 1';  
if (!$str_query) {
    die('Invalid query:Database Error ' . mysql_error());
}

$query_result = mysql_query($str_query) or die (mysql_error());

$num_results = (mysql_num_rows($query_result));
if ($num_results > 0) {
	$row = mysql_fetch_assoc($query_result);
	$video_result = preg_replace('/\s\s+/', ' ', $row['video_url']);
        
	$video = new StdClass;
	$video->message = ($video_result);
        echo $_GET['callback2']. '('. json_encode ($video) . ')';

	}
else {	

	
//echo $video_result;
}
?>