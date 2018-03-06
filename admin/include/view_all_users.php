<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
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
                echo "<td><a href='comments.php?change_to_admin='>Approve</a></td>";
                echo "<td><a href='comments.php?change_to_subscriber='>Unapprove</a></td>";
                echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<!-- APPROVE COMMENT -->
<?php
if (isset($_GET['approve'])) {
    # code...
    $the_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
    $approve_comment_query = mysqli_query($connection, $query);
    //Reload page after approving
    header("Location: comments.php");

}

 // UNAPPROVE
if (isset($_GET['unapprove'])) {
    # code...
    $the_comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    //Reload page after unapproving
    header("Location: comments.php");

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