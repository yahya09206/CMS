<?php 
function insert_categories(){
	//global connection
	global $connection;
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
}

function findAllCategories(){
	global $connection;
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
}

function deleteCategories(){
	global $connection;
	 //QUERY TO DELETE SELECTED CATEGORY
    if (isset($_GET['delete'])) {
        # code...
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        //refresh page after clicking delete
        header("Location: categories.php");

    }
}
?>