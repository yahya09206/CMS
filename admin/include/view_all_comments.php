<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email </th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <!--SELECT ALL POSTS QUERY -->
        <?php 
            $query = "SELECT * FROM comments ";
            $select_comments = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_posts)) {
                # code...
                $comment_id = $row['comment_id'];
                $comment_author = $row['comment_post_id'];
                $comment_title = $row['comment_author'];
                $comment_status = $row['comment_content'];
                $comment_category_id = $row['comment_email'];
                $comment_image = $row['comment_status'];
                $comment_tags = $row['comment_date'];

                //echo row with fields
                echo "<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_content</td>";

                //Show all categories query
                // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                // $select_categories_id = mysqli_query($connection, $query);

                // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                //     # code...
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                //     echo "<td>{$cat_title}</td>";
                // }

                echo "<td>$comment_email</td>";
                echo "<td>$comment_status</td>";
                echo "<td>$comment_date</td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Approve</a></td>";
                echo "<td><a href='posts.php?delete={$post_id}'>Unapprove</a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<!-- DELETE POST -->
<?php 
if (isset($_GET['delete'])) {
    # code...
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);

}

 ?>