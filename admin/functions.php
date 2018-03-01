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
?>