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
            $query = "SELECT * FROM comments";
            $select_comments = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_comments)) {
                # code...
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];

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

                // Select everything from post
                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                $select_post_id_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                }
                echo "<td>$comment_date</td>";
                echo "<td><a href='posts.php?source=edit_post&p_id='>Approve</a></td>";
                echo "<td><a href='posts.php?delete='>Unapprove</a></td>";
                echo "<td><a href='posts.php?delete='>Delete</a></td>";
                echo "</tr>";
                // Most update not working!!!!!!!
            }
        ?>
    </tbody>
</table>
<!-- DELETE COMMENT -->
<?php 
if (isset($_GET['delete'])) {
    # code...
    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);

}

 ?>