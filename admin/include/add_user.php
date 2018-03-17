<?php 
	// Create user query
	if (isset($_POST['create_user'])) {
		# code...
		$user_fname = $_POST['first_name'];
		$user_lname = $_POST['last_name'];
		$user_role = $_POST['user_role'];
		$username = $_POST['username'];
		$email = $_POST['user_email'];
		$password = $_POST['user_password'];
		
		//Tables From Query
		$query = "INSERT INTO users(first_name, last_name, user_role, username, user_email, user_password) ";
		//Match Values from variables created 
		$query .= "VALUES('{$user_fname}','{$user_lname}','{$user_role}','{$username}','{$email}','{$password}') ";

		//Inject into DB
		$create_user_query = mysqli_query($connection, $query);

		confirm($create_user_query);
		//MESSAGE AFTER USER IS CREATED
		echo "USER CREATED!: " . " " . "<a href='users.php'>View Users</a>";

	}

?>

<!-- FORM FOR CREATING USER -->
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="first_name">First Name</label>
		<input class="form-control" type="text" name="first_name">
	</div>

	<div class="form-group">
		<label for="last_name">Last Name</label>
		<input class="form-control" type="text" name="last_name">
	</div>

	<select name="user_role" id="">
		<option value="subscriber">Select Options</option>
		<option value="admin">Admin</option>
		<option value="subscriber">Subscriber</option>
	</select>

	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input class="form-control" type="file" name="image">
	</div> -->

	<div class="form-group">
		<label for="username">Username</label>
		<input class="form-control" type="text" name="username">
	</div>

	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="text" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
	</div>

</form>