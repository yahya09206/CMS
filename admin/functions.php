<?php 
//FUNCTION FOR DISPLAYING ONLINE USERS
function users_online(){
	if (isset($_GET['onlineusers'])) {
		# code...
	global $connection;
	if (!$connection) {
		# code...
		session_start();
		include("../include/db.php");
		//catch id of session
	    $session = session_id();
	    $time = time();
	    $time_out_secs = 60;
	    $time_out = $time - $time_out_secs;
	    //Query to count users
	    $query = "SELECT * FROM users_online WHERE session = '$session'";
	    $send_query = mysqli_query($connection, $query);
	    $count = mysqli_num_rows($send_query);
	    //check for user if null then create new session
	    if ($count == NULL) {
	        # code...
	        //insert into users_online table
	        mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
	    }else {
	        //if user already exists just update with new time
	        mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");

	    }
	        $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
	        echo $count_user = mysqli_num_rows($users_online_query);
	    }
	}//get request is set end
}
users_online();

function confirm($result){
	global $connection;
	if (!$result) {
		# code...
		die("QUERY FAILED" . mysqli_error($connection));
	}
}

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

//function to prevent sql injection
function escape($string){
	mysqli_real_escape_string($connection, trim($string));
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