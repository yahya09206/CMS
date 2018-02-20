<?php 
//proper way to connect to db
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pw'] = 'root';
$db['db_name'] = 'cms';

foreach($db as $key => $value) {
	# code...
	define(strtoupper($key), $value);
}


//connect to db
$connection = mysqli_connect(
	DB_HOST, 
	DB_USER, 
	DB_PW, 
	DB_NAME);

if($connection){
	echo "We are connected";
}

?>