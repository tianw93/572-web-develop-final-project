<?php
	include('header.php');
?>

    <section id="controls">
        <form  method="post">
            <input class="button" type="submit" name="browse_restaurants" value="Browse" />
            <input class="button" type="submit" name="add_restaurants" value="Add" />
            <input class="button" type="submit" name="search_restaurants" value="Search" />
            <input class="search" type="text"   name="searchTerm" size=10 />
	        <select name = 'attribute'>
	        	<option value = 'All'>All</option>
	            <option value = 'Name'>Name</option>
	            <option value = 'City'>City</option>
	            <option value = 'State'>State</option>
	            <option value = 'Cuisine'>Cuisine</option>
            </select> 
        </form>
    </section>
    
<?php

// If $restaurantCount is greater than 0, then display the restaurant info (Name, City, State, Cuisine) in a table.
if ($restaurantCount > 0) {
	echo "<table><thead><tr><th>Name</th><th>City</th><th>State</th><th>Cuisine</th></tr></thead>";
	echo "<tbody>";
	while($res = $statement->fetch(PDO::FETCH_ASSOC)){
		$id = $res['ID'];
		$name = $res['Name'];
		$city = $res['City'];
		$state = $res['State'];
		$cuisine = $res['Cuisine'];
		echo "<tr><td><a href=index.php?ID=" . $id . ">" . $name . "</a></td><td>" . $city . "</td><td>" . $state . "</td><td>" . $cuisine . "</td></tr>";	    
	    }
	$statement->closeCursor();
	echo "</tbody></table>";
    }
// Otherwise, display a message indicating that no results were found.
else {
	echo "No results found.";
	}
?>

<?php
	include('footer.php');
?>