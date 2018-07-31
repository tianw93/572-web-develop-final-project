<?php
require('databaseLibrary.php');

$db = null;
$restaurantCount = 0;

connectToDatabase();

// initial display
if (empty($_POST) && empty($_GET) ) {
	$statement = getListOfAllRestaurants();
	include('listView.php');
}

// search for certain restaurants with keywords
elseif (isset($_POST['search_restaurants'])) {
	$searchAttribute = $_POST['attribute'];
	$searchTerm = $_POST['searchTerm'];
	$searchTerm = preg_replace('/\s+/', '', $searchTerm);
	$statement = searchRestaurants($searchAttribute, $searchTerm);
	include('listView.php');
} 

// back to index.php when clicking "Browse"
elseif (isset($_POST['browse_restaurants'])) {
    header('Location:.');  
}

// add a new restaurant
elseif (isset($_POST['add_restaurants'])) {
	$error = "";
	$id = "";
	$name = "";
	$city = "";
	$state = "";
	$cuisine = "";
	$description = "";
	$price = "";
	$rating = "";
	$image = "";
	include('addRecordView.php');
}

// save information for the new restaurant
if (isset($_POST['save_new_restaurant'])) {
	$error = "";
	addRestaurant();
	if ($error == "") {
		$current_id = $_POST['id'];
		$statement = getRestaurant($current_id);
		$res = $statement->fetch(PDO::FETCH_ASSOC);
		$statement2 = getReviews($current_id);
		$res2 = $statement2->fetchall(PDO::FETCH_ASSOC);
		$key1 = 'TimeStamp';
		$key2 = 'Comment';
		$output1 = array_column($res2, $key1);
		$output2 = array_column($res2, $key2);
		include('detailedRecordView.php');
	}
	else {
		include('addRecordView.php');
	}
}

// show the detail information for selected restaurant
if (isset($_GET['ID'])){
   	$current_id = $_GET['ID'];
	$statement = getRestaurant($current_id);
	$res = $statement->fetch(PDO::FETCH_ASSOC);
	$statement2 = getReviews($current_id);
	$res2 = $statement2->fetchall(PDO::FETCH_ASSOC);
	$key1 = 'TimeStamp';
	$key2 = 'Comment';
	$output1 = array_column($res2, $key1);
	$output2 = array_column($res2, $key2);
	include('detailedRecordView.php');
}

// delete a restaurant from the database
if (isset($_POST['delete_restaurants'])) {
	$current_id = $_POST['id'];
	deleteRestaurant();
	header('Location:.');
}

// update selected restaurant information  	
elseif (isset($_POST['update_restaurants'])) {
	include('updateRecordView.php');
}

// save updated information for the restaurant
elseif (isset($_POST['save_updated_restaurant'])) {
	$current_id = $_POST['id'];
	updateRestaurant();
	$statement = getRestaurant($current_id);
	$res = $statement->fetch(PDO::FETCH_ASSOC);
	$statement2 = getReviews($current_id);
	$res2 = $statement2->fetchall(PDO::FETCH_ASSOC);
	$key1 = 'TimeStamp';
	$key2 = 'Comment';
	$output1 = array_column($res2, $key1);
	$output2 = array_column($res2, $key2);
	include('detailedRecordView.php');
}

if (isset($_POST['add_review'])) {
	$current_id = $_POST['id'];
	addReview();
	$statement = getRestaurant($current_id);
	$res = $statement->fetch(PDO::FETCH_ASSOC);
	$statement2 = getReviews($current_id);
	$res2 = $statement2->fetchall(PDO::FETCH_ASSOC);
	$key1 = 'TimeStamp';
	$key2 = 'Comment';
	$output1 = array_column($res2, $key1);
	$output2 = array_column($res2, $key2);
	include('detailedRecordView.php');
}
?>