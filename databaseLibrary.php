<?php

function connectToDatabase() {
   global $db;
// connect to the database
   try {
      $db = new PDO('sqlite:restaurants.db');
// set the error mode
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
// if an exception occurs, display an error message 
   catch (PDOException $e) {
      $errorMessage = $e->getMessage();
      echo "<p>SQL error: " . $errorMessage . "</p>";
      $db = null;
      exit();
   }
}


function getListOfAllRestaurants() {
	global $db, $restaurantCount;
// execute a SELECT query to get a list of all restaurants
	try {
		$query = "SELECT * FROM RESTAURANT";
		$statement = $db->prepare($query);
		$statement->execute();
// set $restaurantCount to the count of restaurants returned by the query			
		foreach ($db->query($query) as $row) {
			$restaurantCount++;
		}
	}
// if an exception occurs, display an error message 
	catch (Exception $e) {
		echo "<p>Error Message: " . $e->getMessage() . "</p>";
		exit();
	}
// return $statement
	return $statement;
}

function searchRestaurants($attr, $term) {
	global $db, $restaurantCount;
// execute a SELECT query to get a list of all restaurants where the value of $attr is 'like' $term
    try {
    	if ($attr == 'All') {
    		$query = "SELECT * FROM RESTAURANT WHERE Name LIKE '%" . $term . "%' OR City LIKE '%" . $term . "%' OR State LIKE '%" . $term . "%' OR Cuisine LIKE '%" . $term . "%'";
    		}
    	else {
			$query = "SELECT * FROM RESTAURANT WHERE " . $attr . " LIKE '%" . $term . "%'";
			}
		$statement = $db->prepare($query);
		$statement->execute();
// set $restaurantCount to the count of restaurants returned by the query		
		foreach ($db->query($query) as $row) {
			$restaurantCount++;
		}
	}
// if an exception occurs, display an error message 
	catch (Exception $e) {
		echo "<p>Error Message: " . $e->getMessage() . "</p>";
		exit();
	}
// return $statement
	return $statement;
}

function getRestaurant($id) {
	global $db;
// execute a SELECT query to get restaurant info with specific ID
	try {
		$query = "SELECT * FROM RESTAURANT WHERE ID = '" . $id . "'";
		$statement = $db->prepare($query);
		$statement->execute();
	}
// if an exception occurs, display an error message 
	catch (Exception $e) {
		echo "<p>Error Message: " . $e->getMessage() . "</p>";
		exit();
	}
// return $statement
	return $statement;
}


function getReviews($id) {
	global $db;
// execute a SELECT query to get restaurant info with specific ID
	try {
		$query = "SELECT * FROM REVIEWS WHERE ID = '" . $id . "'";
		$statement = $db->prepare($query);
		$statement->execute();
	}
// if an exception occurs, display an error message 
	catch (Exception $e) {
		echo "<p>Error Message: " . $e->getMessage() . "</p>";
		exit();
	}
// return $statement
	return $statement;
}

function addRestaurant() {
	global $db, $id, $error, $name, $city, $state, $cuisine, $description, $price, $rating, $image;
// execute an INSERT statement
	try {
		$query = "INSERT INTO RESTAURANT VALUES ('" . $_POST['id'] . "',' " . $_POST['name']. "','" . $_POST['city']. "','" . $_POST['state'] . "','" . $_POST['cuisine'] . "','" . $_POST['description'] . "','" . $_POST['price'] . "','" . $_POST['rating'] . "','" . $_POST['image'] . "')";
		$statement = $db->prepare($query);
		$statement->execute();
	}
// if an exception occurs, display an error message 
	catch (Exception $e) {
		// if ID is not unique, display certain error message
		if ($e->getCode() == "23000") {
			$error = "<font color='red'>Restaurant ". $_POST['id'] . " already exist in the database</font>";
			$id = $_POST['id'];
			$name = $_POST['name'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$cuisine = $_POST['cuisine'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$rating = $_POST['rating'];
			$image = $_POST['image'];
		  }
		// display general error message for other errors
		else {
			echo "<p>Error Message: " . $e->getMessage() . "</p>";
			exit();
		  }
	}
}

function updateRestaurant() {
	global $db;
// execute an UPDATE statement
	try {
		$query = "UPDATE RESTAURANT SET Name='" . $_POST['name']. "', City='" . $_POST['city']. "', State='" . $_POST['state'] . "', Cuisine='" . $_POST['cuisine'] . "', Description='" . $_POST['description'] . "', Price='" . $_POST['price'] . "', Rating='" . $_POST['rating'] . "', Image='" . $_POST['image'] . "' WHERE ID='". $_POST['id'] . "'";
		$statement = $db->prepare($query);
		$statement->execute();
	}
// if an exception occurs, display an error message 
	catch (Exception $e) {
		echo "<p>Error Message: " . $e->getMessage() . "</p>";
		exit();
	}
}

function deleteRestaurant() {
	global $db, $current_id;
// execute a DELETE statement
	try {
		$query = "DELETE FROM RESTAURANT WHERE ID='". $current_id . "'";
		$statement = $db->prepare($query);
		$statement->execute();
	}
// if an exception occurs, display an error message 
	catch (Exception $e) {
		echo "<p>Error Message: " . $e->getMessage() . "</p>";
		exit();
	}
}

function addReview() {
	global $db;
	try {
		$query = "INSERT INTO REVIEWS VALUES ('" . $_POST['id'] . "', '" . date("Y-m-d H:i:s") . "', '" . $_POST['reviewComment'] . "')";
		$statement = $db->prepare($query);
		$statement->execute();
	}
	catch (Exception $e) {
		echo "<p>Error Message: " . $e->getMessage() . "</p>";
		exit();
	}

}

?>