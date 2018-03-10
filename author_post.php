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
                by <a href="index.php"><?php echo $post_author ?></a>
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
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <!-- Query to select everything from comments -->
                <?php 
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC ";
                    $select_comment_query = mysqli_query($connection, $query);
                    if(!$select_comment_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    while ($row = mysqli_fetch_array($select_comment_query)) {
                        # code...
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        $comment_author = $row['comment_author'];
                ?>
                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small><?php echo $comment_date; ?></small>
                                </h4>
                                <?php echo $comment_content; ?>
                            </div>
                        </div>
                <?php } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>

<?php include "include/footer.php" ?>