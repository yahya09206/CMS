<?php 

//CHECK IF USER GOES TO EDIT USER
if (isset($_GET['edit_user'])) {
    # code...
    $the_user_id = $_GET['edit_user'];
    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users_query)) {
        # code...
        $user_id = $row['user_id'];
        $user_name = $row['username'];
        $user_password = $row['user_password'];
        $user_fname = $row['first_name'];
        $user_lname = $row['last_name'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
?>
<?php 

}
    // Create user query
    if (isset($_POST['edit_user'])) {
        # code...
        $user_fname = $_POST['first_name'];
        $user_lname = $_POST['last_name'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $post_date = date('d-m-y');

    if (!empty($password)) {
        # code...
        $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
        $get_user_query = mysqli_query($connection, $query);
        confirm($get_user_query);
        $row = mysqli_fetch_array($get_user_query);
        $db_password = $row['user_password'];

    if ($db_password != $password) {
        # code...
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    }
        // Encrypt pw
        //UPDATE USER
        $query = "UPDATE users SET ";
        $query .= "first_name   = '{$user_fname}', ";
        $query .= "last_name = '{$user_lname}', ";
        $query .= "user_role   = '$user_role', ";
        $query .= "username  = '{$username}', ";
        $query .= "user_email  = '{$user_email}', ";
        $query .= "user_password = '{$hashed_password}' ";
        $query .= "WHERE user_id = '{$the_user_id}' ";
        
        $edit_user_query = mysqli_query($connection, $query);
        confirm($edit_user_query);
        echo "User Updated" . "<a href='users.php'> View Users?</a>";
    }

}

?>

<!-- FORM FOR CREATING USER -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input class="form-control" value="<?php echo $user_fname; ?>" type="text" name="first_name">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input class="form-control" value="<?php echo $user_lname; ?>" type="text" name="last_name">
    </div>

    <select name="user_role" id="">
    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
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
        <input class="form-control" value="<?php echo $user_name; ?>" type="text" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" value="<?php echo $user_email; ?>"  name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" value="<?php echo $user_password; ?>"  name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>

</form>