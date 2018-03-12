<?php include "include/db.php" ?>
<?php include "include/header.php" ?>

<!-- Navigation -->
<?php include "include/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- QUERY TO DISPLAY ALL POSTS -->
            <?php 
                //query to find out how many posts we have
                $post_query_count = "SELECT * FROM posts";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                $select_all_posts_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        # code...
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_img = $row['post_image'];
                        $post_content = $row['post_title'];
                        //excerpt
                        $post_content = substr($row['post_content'], 0,100);
                        $post_status = $row['post_status'];
                        
                        //Check for post status DONE WITH COMMENTS
                        if($post_status == 'published'){
                            
            ?>
            <h1 class="page-header">
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
            <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_img; ?>" alt=""></a>
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <?php }  }?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>
<!-- DONE WITH BASIC FEATURES!!! 3-5-2018 -->
<?php include "include/footer.php" ?>