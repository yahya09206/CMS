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
                        <!-- VIEW ALL POSTS QUERY -->
                        <?php 
                            if (isset($_GET['source'])) {
                                # code...
                                $source = $_GET['source'];
                            }else{
                                $source = '';
                            }

                            switch ($source) {
                                case 'add_user':
                                    # code...
                                include "include/add_user.php";
                                    break;
                                case 'edit_user':
                                    # code...
                                include "include/edit_user.php";
                                    break;
                                case '200':
                                    # code...
                                echo "NICE 200";
                                    break;

                                default:
                                    # code...
                                include "include/view_all_users.php";
                                    break;
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    <!-- /#page-wrapper -->
<?php include "include/admin_footer.php" ?>
