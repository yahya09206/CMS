<!-- EDIT POSTS -->
<?php 
	if (isset($_GET['p_id'])) {
		# code...
		$the_post_id = $_GET['p_id'];
	}

	$query = "SELECT * FROM posts ";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
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
?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title; ?>" class="form-control" type="text" name="title">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category ID</label>
		<input value="<?php echo $post_category_id; ?>" class="form-control" type="text" name="post_category_id">
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
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>

</form>