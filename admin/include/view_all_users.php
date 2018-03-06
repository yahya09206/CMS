<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <!--SELECT ALL POSTS QUERY -->
        <?php 
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                # code...
                $user_id = $row['user_id'];
                $user_name = $row['username'];
                $user_password = $row['user_password'];
                $user_fname = $row['first_name'];
                $user_lname = $row['last_name'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];

                //echo row with fields
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$user_name</td>";
                echo "<td>$user_fname</td>";
                echo "<td>$user_lname</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_role</td>";

                // Select everything from post
                // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                // $select_post_id_query = mysqli_query($connection, $query);
                // while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                //     # code...
                //     $post_id = $row['post_id'];
                //     $post_title = $row['post_title'];
                //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                // }
                echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
                echo "<td><a href='users.php?change_to_subscriber=$user_id'>Subscriber</a></td>";
                echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<!-- Change to admin -->
<?php
if (isset($_GET['change_to_admin'])) {
    # code...
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
    $change_admin_query = mysqli_query($connection, $query);
    //Reload page after approving
    header("Location: users.php");

}

 // Change to subscriber
if (isset($_GET['change_to_subscriber'])) {
    # code...
    $the_user_id = $_GET['change_to_subscriber'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
    $change_subscriber_query = mysqli_query($connection, $query);
    //Reload page after unapproving
    header("Location: users.php");

}

// DELETE USER
if (isset($_GET['delete'])) {
    # code...
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_query = mysqli_query($connection, $query);
    //Reload page after deleting
    header("Location: users.php");

}

 ?>