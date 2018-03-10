<?php include "include/db.php" ?>
<?php include "include/header.php" ?>

<!-- Navigation -->
<?php include "include/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php 

            if (isset($_GET['p_id'])) {
                # code...
                $the_post_id = $_GET['p_id'];
                $the_post_author = $_GET['author'];
            }
            //Display all posts
                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
                $select_all_posts_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        # code...
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_img = $row['post_image'];
                        $post_content = $row['post_title'];

            ?>

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                All Posts By: <?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_img; ?>" alt="">
            <hr>
            <p><?php echo $post_content ?></p>
            <hr>
            <?php } ?>

            <!-- Blog Comments -->
                <!-- Catch comment date -->
                <?php 
                    if (isset($_POST['create_comment'])) {
                        # code...
                            //CHECK IF FIELDS ARE EMPTY BEFORE SUBMITTING
                            $the_post_id = $_GET['p_id'];
                            $comment_author = $_POST['comment_author'];
                            $comment_email = $_POST['comment_email'];
                            $comment_content = $_POST['comment_content'];
                        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                            # code...
                            //Query to create comment and post
                            $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                            $query .= "VALUES($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";

                            //Query To send to datebase(COMPLETE MOST UPDATE VERSION)
                            $create_comment_query = mysqli_query($connection, $query);
                            if (!$create_comment_query) {
                                # code...
                                die('QUERY FAILED' . mysqli_error($connection));
                            }

                            //QUERY FOR COMMENT COUNT
                            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                            $query .= "WHERE post_id = $the_post_id ";
                            $update_comment_count = mysqli_query($connection, $query);
                        }else{
                            echo "<script>alert('PLEASE FILL OUT FORM COMPLETELY');</script>";
                        }
                        //end of check

                    }

                ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>

<?php include "include/footer.php" ?>