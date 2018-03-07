<?php include "db.php"; ?>

<?php 
	
	if (isset($_POST['login'])) {
		# code...
		echo $_POST['username'];
		echo $_POST['password'];
	}


?>