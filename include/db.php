<?php 

//connect to db
$connection = mysqli_connect('localhost', 'root', 'root', 'cms');

if($connection){
	echo "We are connected";
}

?>