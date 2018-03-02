<!-- EDIT POSTS -->
<?php 
	if (isset($_GET['p_id'])) {
		# code...
		$the_post_id = $_GET['p_id'];
	}

	$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_posts_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
        # code...
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tag'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }

    if (isset($_POST['update_post'])) {
    	# code...
        $post_author = $_POST['post_author'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $FILES['image']['name'];
        $post_image_temp = $row['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tag'];
    	
    }
?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title; ?>" class="form-control" type="text" name="title">
	</div>

	<div class="form-group">
		<select name="" id="">
			<?php 
				$query = "SELECT * FROM categories";
		        $select_categories = mysqli_query($connection, $query);

		        confirm($select_categories);

		        while ($row = mysqli_fetch_assoc($select_categories)) {
		            # code...
		            $cat_id = $row['cat_id'];
		            $cat_title = $row['cat_title'];

		            echo "<option value=''>{$cat_title}</option>";
		        }

			?>
		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input value="<?php echo $post_author; ?>" class="form-control" type="text" name="author">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input value="<?php echo $post_status; ?>" class="form-control" type="text" name="post_status">
	</div>

	<div class="form-group">
		<img width="100" src="../images/<?php echo $post_image; ?>" alt="">
	</div>

	<div class="form-group">
		<label for="post_tag">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" class="form-control" type="text" name="post_tag">
	</div>

	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea class="form-contrl" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>"</textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
	</div>

</form>