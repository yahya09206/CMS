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
                            <?php insert_categories(); ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category </label>
                                    <input type="text" class="form-control" name="cat_title">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form> 

                            <?php //UPDATE AND INCLUDE QUERY
                                if (isset($_GET['edit'])) {
                                    # code...
                                    $cat_id = $_GET['edit'];
                                    include "include/update_cat.php";
                                }
                            ?>   
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

                                        findAllCategories();
                                    ?>

                                    <?php 
                                       deleteCategories();

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
