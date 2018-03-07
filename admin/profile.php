<!-- MOST UPDATED -->
<?php include "include/admin_header.php" ?>
<?php
    if (isset($_SESSION['username'])) {
        # code...
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}'";

        $select_user_profile_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_user_profile_query)) {
            # code...
            $user_id = $row['user_id'];
            $user_name = $row['username'];
            $user_password = $row['user_password'];
            $user_fname = $row['first_name'];
            $user_lname = $row['last_name'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        }
    }
?>

<?php 

     if (isset($_POST['edit_user'])) {
        # code...
        $user_fname = $_POST['first_name'];
        $user_lname = $_POST['last_name'];
        $user_role = $_POST['user_role'];

        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $username = $_POST['username'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        // $post_date = date('d-m-y');
        // $post_comment_count = 4;

        // FUNCTION FOR IMAGES
        // move_uploaded_file($post_image_temp, "../images/$post_image");
        //Tables From Query
        $query = "UPDATE users SET ";
        $query .= "first_name   = '{$user_fname}', ";
        $query .= "last_name = '{$user_lname}', ";
        $query .= "user_role   = '$user_role', ";
        $query .= "username  = '{$username}', ";
        $query .= "user_email  = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}' ";
        

        $edit_user_query = mysqli_query($connection, $query);
        confirm($edit_user_query);

    }

?>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" value="<?php echo $user_fname ?>" type="text" name="first_name">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" value="<?php echo $user_lname ?>" type="text" name="last_name">
                        </div>

                        <select name="user_role" id="">
                        <option value="subscriber"><?php echo $user_role ?></option>
                            <?php  
                            //WHICH ROLE TO DISPLAY BASED ON CURRENT ROLE
                                if ($user_role == 'admin') {
                                    # code...
                                     echo "<option value='subscriber'>subscriber</option>";

                                }else{

                                }
                                    echo "<option value='admin'>admin</option>";

                            ?>
                        </select>

                        <!-- <div class="form-group">
                            <label for="post_image">Post Image</label>
                            <input class="form-control" type="file" name="image">
                        </div> -->

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" value="<?php echo $user_name ?>" type="text" name="username">
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="text" class="form-control" value="<?php echo $user_email ?>"  name="user_email">
                        </div>

                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" class="form-control" value="<?php echo $user_password ?>"  name="user_password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>

                    </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    <!-- /#page-wrapper -->
<?php include "include/admin_footer.php" ?>
