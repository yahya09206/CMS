<?php include "include/admin_header.php" ?>
    <div id="wrapper">
        <!-- USERS ONLINE FUNCTION -->
        <?php 
            //catch id of session
            $session = session_id();
            $time = time();
            $time_out_secs = 60;
            $time_out = $time - $time_out_secs;
            //Query to count users
            $query = "SELECT * FROM users_online WHERE session = '$session' ";
            $send_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($send_query);
            //check for count
            if ($count == NULL) {
                # code...
                //insert into users_online table
                mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session, $time')";
            }else {
                
            }
        ?>
        <!-- Navigation -->
        <?php include "include/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            $query = "SELECT * FROM posts";
                                            $select_all_post = mysqli_query($connection, $query);
                                            //count all rows inside of posts table
                                            $post_counts = mysqli_num_rows($select_all_post);
                                            echo "<div class='huge'>{$post_counts}</div>";    
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <?php 
                                            $query = "SELECT * FROM comments";
                                            $select_all_comments = mysqli_query($connection, $query);
                                            //count all rows inside of posts table
                                            $comment_counts = mysqli_num_rows($select_all_comments);
                                            echo "<div class='huge'>{$comment_counts}</div>";    
                                        ?>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php 
                                            $query = "SELECT * FROM users";
                                            $select_all_users = mysqli_query($connection, $query);
                                            //count all rows inside of posts table
                                            $user_counts = mysqli_num_rows($select_all_users);
                                            echo "<div class='huge'>{$user_counts}</div>";    
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 
                                            $query = "SELECT * FROM categories";
                                            $select_all_cats = mysqli_query($connection, $query);
                                            //count all rows inside of posts table
                                            $cat_counts = mysqli_num_rows($select_all_cats);
                                            echo "<div class='huge'>{$cat_counts}</div>";    
                                        ?>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php 
                    //QUERY FOR PUBLISHED POSTS
                    $query = "SELECT * FROM posts WHERE post_status = 'published'";
                    $select_all_published_post = mysqli_query($connection, $query);
                    $post_published_count = mysqli_num_rows($select_all_published_post);

                    //query to display drafts
                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $select_all_draft_post = mysqli_query($connection, $query);
                    $post_draft_count = mysqli_num_rows($select_all_draft_post);

                    //query to display unapproved comments
                    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                    $unapproved_comments = mysqli_query($connection, $query);
                    $unapproved_comm_count = mysqli_num_rows($unapproved_comments);

                    //query to display subscribers
                    $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                    $select_all_subs = mysqli_query($connection, $query);
                    $sub_count = mysqli_num_rows($select_all_subs);
                ?>

                <div class="row">
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],
                          // ARRAY TO HOLD DATA
                          <?php 
                            $element_text = ['All Posts', 'Active Posts', '$Drafts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
                            $element_count = [$post_counts, $post_published_count, $post_draft_count, $comment_counts, $unapproved_comm_count, $user_counts, $sub_count, $cat_counts];

                            //LOOP THROUGH ARRAY OF DIFFERENT DATA
                            for($i = 0; $i < 8; $i++){
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            }
                          ?>
                          // ['Posts', 1000],
                        ]);

                        var options = {
                          chart: {
                            title: '',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    <!-- /#page-wrapper -->
 <?php include "include/admin_footer.php" ?>
