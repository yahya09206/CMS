<?php include "db.php"; ?>
<!-- TURN ON SESSION -->
<?php session_start(); ?>

<?php 
	// LOG USER INTO DB
	if (isset($_POST['login'])) {
		# code...
		$username = $_POST['username'];
		$password =  $_POST['password'];

		//escape string prevent sql injection
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		// QUICK CHECK
		$query = "SELECT * FROM users WHERE username = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);

		if(!$select_user_query){
			die("QUERY FAILED" . mysqli_error($connection));
		}

		//WHILE LOOP TO GET VALUES FROM DATABASE
		while ($row = mysqli_fetch_array($select_user_query)) {
			# code...
			$db_user_id = $row['user_id'];
			$db_username = $row['username'];
			$db_password = $row['user_password'];
			$db_fname = $row['first_name'];
			$db_lname = $row['last_name'];
			$db_role = $row['user_role'];

		}
		//ROUTE TO HOME PAGE IF INVALID LOGIN
		if($username !== $db_username && $password !== $db_password ){
			header("Location: ../index.php");
			//REDIRECT TO ADMIN IF LOGIN INFO MATCH
		}else if($username === $db_username && $password === $db_password) {
			# code...
			// SET NEW SESSION | ASSIGN FROM RIGHT TO LEFT
			$_SESSION['username'] = $db_username;
			$_SESSION['first_name'] = $db_fname;
			$_SESSION['last_name'] = $db_lname;
			$_SESSION['user_role'] = $db_role;
			header("Location: ../admin");
		}else{
			header("Location: ../index.php");
		}
	}
?>