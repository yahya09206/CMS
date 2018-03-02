<?php include "include/admin_header.php" ?>
    <div id="wrapper">
        <?php include "include/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Author Name</small>
                        </h1>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Images</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <!--SELECT ALL POSTS QUERY -->
                                    <?php 
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
                                            $post_tags = $row['post_tag'];
                                            $post_comment_count = $row['post_comment_count'];
                                            echo $post_date = $row['post_date'];

                                            //echo row with fields
                                            echo "<tr>";
                                            echo "<td>$post_id</td>";
                                            echo "<td>$post_author</td>";
                                            echo "<td>$post_title</td>";
                                            echo "<td>$post_category_id</td>";
                                            echo "<td>$post_status</td>";
                                            echo "<td>$post_image</td>";
                                            echo "<td>$post_tags</td>";
                                            echo "<td>$post_comment_count</td>";
                                            echo "<td>$post_date</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    <td>10</td>
                                    <td>Ferragamo</td>
                                    <td>Luxury</td>
                                    <td>Fancy</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>Tags</td>
                                    <td>Comments</td>
                                    <td>Date</td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    <!-- /#page-wrapper -->
<?php include "include/admin_footer.php" ?>
