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

                                        while ($row = mysqli_fetch_assoc($select_categories)) {
                                            # code...
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
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
