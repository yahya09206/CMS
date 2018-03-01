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
                                    $cat_title = $_POST['cat_title'];

                                    if($cat_title == "" || empty($cat_title)) {
                                        # code...
                                        echo "This field should not be empty";

                                    }else{
                                        $query = "INSERT INTO categories(cat_title) ";
                                        $query .= "VALUE('{$cat_title}') ";

                                        $create_category_query = mysqli_query($connection, $query);

                                        if(!$create_category_query) {
                                            # code...
                                            die('Query Failed' . mysqli_error($connection));
                                        }
                                    }
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        //FIND ALL CATEGORIES QUERY
                                        $query = "SELECT * FROM categories ";
                                        $select_categories = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($select_categories)) {
                                            # code...
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];

                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                            echo "</tr>";
                                        }
                                    ?>

                                    <?php 
                                        //QUERY TO DELETE SELECTED CATEGORY
                                    if (isset($_GET['delete'])) {
                                        # code...
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                        $delete_query = mysqli_query($connection, $query);
                                        //refresh page after clicking delete
                                        header("Location: categories.php");

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
