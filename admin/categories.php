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
                        <div class="col-xs-6">
                            <?php 
                                 if (isset($_POST['submit'])) {
                                     # code...
                                    echo "<h1>Hello</h1>";
                                 }

                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category </label>
                                    <input type="text" class="form-control" name="cat_title">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>    
                        </div>
                        <!-- Category Form -->

                        <div class="col-xs-6">

                            <?php 
                                $query = "SELECT * FROM categories"; 
                                $select_categories = mysqli_query($connection, $query);

                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        while ($row = mysqli_fetch_assoc($select_categories)) {
                                            # code...
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];

                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table div -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    <!-- /#page-wrapper -->
<?php include "include/admin_footer.php" ?>
