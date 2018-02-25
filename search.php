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

                    if (isset($_POST['submit'])) {
                        # code...
                        $search = $_POST['search'];
                        //query to match search terms with tags
                        $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%' ";
                        $search_query = mysqli_query($connection, $query);

                        if(!$search_query){
                            die("QUERY FAIL" . mysqli_error($connection));
                        }

                        $count = mysqli_num_rows($search_query);

                        if($count == 0){
                            echo "<h1>No Results</h1>";
                        }else{
                             $query = "SELECT * FROM posts";
                                $select_all_posts_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                                # code...
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_img = $row['post_image'];
                                $post_content = $row['post_title'];

                                ?>
                                <h1 class="page-header">
                                    <small>Secondary Text</small>
                                </h1>

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
                                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                                <hr>
                <?php }
                             }

                        }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "include/footer.php" ?>