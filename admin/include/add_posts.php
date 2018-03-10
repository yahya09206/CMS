<?php 

	if (isset($_POST['create_post'])) {
		# code...
		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tag'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		// $post_comment_count = 4;

		// FUNCTION FOR IMAGES
		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status) ";

		$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";

		//Inject into DB
		$create_post_query = mysqli_query($connection, $query);

		confirm($create_post_query);
		//ALERT MESSAGE FOR CREATING POST
		$the_post_id = mysqli_insert_id($connection);
		echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit Other Posts</a></p>";

	}

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input class="form-control" type="text" name="title">
	</div>

	<div class="form-group">
		<select name="post_category" id="">
			<?php 
				$query = "SELECT * FROM categories";
		        $select_categories = mysqli_query($connection, $query);

		        confirm($select_categories);

		        while ($row = mysqli_fetch_assoc($select_categories)) {
		            # code...
		            $cat_id = $row['cat_id'];
		            $cat_title = $row['cat_title'];

		            echo "<option value='$cat_id'>{$cat_title}</option>";
		        }

			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input class="form-control" type="text" name="author">
	</div>

	<div class="form-group">
		<select name="post_status" id="">
			<option value="draft">Post Status</option>
			<option value="published">Published</option>
			<option value="draft">Draft</option>
		</select>
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input class="form-control" type="file" name="image">
	</div>

	<div class="form-group">
		<label for="post_tag">Post Tags</label>
		<input class="form-control" type="text" name="post_tag">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-contrl" name="post_content" id="body" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>

</form>