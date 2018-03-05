<?php 
	// Create user query
	if (isset($_POST['create_user'])) {
		# code...
		$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_role = $_POST['user_role'];

		// $post_image = $_FILES['image']['name'];
		// $post_image_temp = $_FILES['image']['tmp_name'];

		$username = $_POST['username'];
		$email = $_POST['user_email'];
		$password = $_POST['user_password'];
		// $post_date = date('d-m-y');
		// $post_comment_count = 4;

		// FUNCTION FOR IMAGES
		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status) ";

		$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";

		//Inject into DB
		$create_post_query = mysqli_query($connection, $query);

		confirm($create_post_query);

	}

?>

<!-- FORM FOR CREATING USER -->
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="post_author">First Name</label>
		<input class="form-control" type="text" name="first_name">
	</div>

	<div class="form-group">
		<label for="post_status">Last Name</label>
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
		<label for="post_tag">Username</label>
		<input class="form-control" type="text" name="username">
	</div>

	<div class="form-group">
		<label for="post_content">Email</label>
		<input type="text" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="post_content">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
	</div>

</form>