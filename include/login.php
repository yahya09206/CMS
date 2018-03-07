<?php include "db.php"; ?>

<?php 
	// LOG USER INTO DB
	if (isset($_POST['login'])) {
		# code...
		$username = $_POST['username'];
		$password =  $_POST['password'];

		//escape string prevent sql injection
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $username);

		// QUICK CHECK
		$query = "SELECT * FROM users WHERE username = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);

		if(!$select_user_query){
			die("QUERY FAILED" . mysqli_error($connection));
		}

		//WHILE LOOP TO GET VALUES FROM DATABASE
		while ($row = mysqli_fetch_array($select_user_query)) {
			# code...
			echo $db_id = $row['user_id'];
		}
	}


?>