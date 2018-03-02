<?php if (condition): ?>
	
<?php endif ?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input class="form-control" type="text" name="title">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category ID</label>
		<input class="form-control" type="text" name="post_category_id">
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input class="form-control" type="text" name="author">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input class="form-control" type="text" name="post_status">
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input class="form-control" type="text" name="image">
	</div>

	<div class="form-group">
		<label for="post_tag">Post Tags</label>
		<input class="form-control" type="text" name="post_tag">
	</div>

	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea class="form-contrl" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>

</form>