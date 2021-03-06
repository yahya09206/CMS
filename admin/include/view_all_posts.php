<!-- ADDING BULK OPTIONS -->
<?php 
    //ARRAY FOR DIFFERENT VALUES SELECTED
    if (isset($_POST['checkBoxArray'])) {
        # code...
        foreach ($_POST['checkBoxArray'] as $postValueID) {
            # code...
            $bulk_options = $_POST['bulk_options'];

            //Switch statement for different options
            switch ($bulk_options) {
                case 'published':
                case 'draft':
                    # code...
                    //UPDATE POST TO PUBLISHED
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$postValueID}' ";
                    $update_to_status = mysqli_query($connection, $query);
                    confirm($update_to_status);
                    break;
                case 'delete':
                    # code...
                    $query = "DELETE FROM posts WHERE post_id = {$postValueID}";
                    $delete = mysqli_query($connection, $query);
                    confirm($delete);
                    break;
                case 'clone':
                    # code...
                    $query = "SELECT * FROM posts WHERE post_id = '{$postValueID}' ";
                    $select_post_query = mysqli_query($connection, $query);
                    //LOOP THROUGH RESULTS
                    while ($row = mysqli_fetch_array($select_post_query)) {
                        # code...
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_date = $row['post_date'];
                        $post_author = $row['post_author'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tag'];
                        $post_comment_count = $row['post_comment_count'];
                    }
                    //INSERT INTO POSTS TABLE
                    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_tag, post_status) ";
                    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_tags}','{$post_status}' ) ";
                    $copy_query = mysqli_query($connection, $query);
                    if (!$copy_query) {
                        # code...
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

?>
<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionsContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes" name=""></th>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Images</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!--SELECT ALL POSTS QUERY -->
            <?php 
                $query = "SELECT * FROM posts ORDER by post_id DESC ";
                $select_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_posts)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tag'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    $post_views_count = $row['post_views'];

                    //echo row with fields
                    echo "<tr>";
                    ?>
                    <!-- ADD CHECK BOX TO FIELDS -->
                    <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id ?>'></td>

                    <?php
                    echo "<td>$post_id</td>";
                    echo "<td>$post_author</td>";
                    echo "<td>$post_title</td>";

                    //Show all categories query
                    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                    $select_categories_id = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_categories_id)) {
                        # code...
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<td>{$cat_title}</td>";
                    }

                    echo "<td>$post_status</td>";
                    echo "<td><img width='100' src='../images/$post_image'></td>";
                    echo "<td>$post_tags</td>";
                    echo "<td>$post_comment_count</td>";
                    echo "<td>$post_date</td>";
                    echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete? Cannot be undone'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</form>
<!-- DELETE POST -->
<?php 
if (isset($_GET['delete'])) {
    # code...
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: posts.php");

}
//RESET
if (isset($_GET['reset'])) {
    # code...
    $the_post_id = $_GET['reset'];

    $query = "UPDATE posts SET post_views = 0 WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
    header("Location: posts.php");

}

 ?>