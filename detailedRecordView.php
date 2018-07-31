<?php
include('header.php');
?>

<form action="index.php" method="post">
   <section id="controls">
      <input class="button" type="submit" name="browse_restaurants" value="Browse" />
      <input class="button" type="submit" name="update_restaurants" value="Update" />
      <input class="button" type="submit" name="delete_restaurants" value="Delete" />
   </section>
   <section>
   	  <?php echo '<input type="hidden" name="id" value="'. $res['ID'] . '"/>'?>
   	  <?php echo '<input type="hidden" name="name" value="'. $res['Name'] . '"/>'?>
   	  <?php echo '<input type="hidden" name="city" value="'. $res['City'] . '"/>'?>
   	  <?php echo '<input type="hidden" name="state" value="'. $res['State'] . '"/>'?>
   	  <?php echo '<input type="hidden" name="cuisine" value="'. $res['Cuisine'] . '"/>'?>
   	  <?php echo '<input type="hidden" name="description" value="'. $res['Description'] . '"/>'?> 
   	  <?php echo '<input type="hidden" name="price" value="'. $res['Price'] . '"/>'?>
   	  <?php echo '<input type="hidden" name="rating" value="'. $res['Rating'] . '"/>'?>
   	  <?php echo '<input type="hidden" name="image" value="'. $res['Image'] . '"/>'?>
   	  <?php
   	  	$filename = 'images/' . $res['Image']; 
   	  	if (!empty($res['Image']) && file_exists($filename)) {
	   	  	echo "<img src='images/" . $res['Image'] . "' alt='". $res['Name'] . "'>";
	   	  }
   	  ?>
      <span class="flex-input"><label>ID</label><?php echo $res['ID'] ?></span>
      <span class="flex-input"><label>Name</label><?php echo $res['Name'] ?></span>
      <span class="flex-input"><label>City</label><?php echo $res['City'] ?></span>
      <span class="flex-input"><label>State</label><?php echo $res['State'] ?></span>
      <span class="flex-input"><label>Cuisine</label><?php echo $res['Cuisine'] ?></span>
      
      <span class="flex-input"><label>Description</label>
      <div id="desc">
      <p><?php echo $res['Description'] ?></p>
      </div>
      </span>
      <script src="readmore.js"></script>
      
      <span class="flex-input"><label>Price</label>
      <?php
      for($x = 0; $x < $res['Price']; $x++) {
      	echo "<i class='fa fa-usd' aria-hidden='true' title='Price is ".$res['Price']."'></i>&nbsp;";
      }
      ?>
      </span>
      <span class="flex-input"><label>Rating</label>
      <?php
      for($x = 0; $x < $res['Rating']; $x++) {
      	echo "<i class='fa fa-cutlery' aria-hidden='true' title='Rating is ".$res['Rating']."'></i>&nbsp;";
      }
      ?>
      </span>
      <span class="flex-input"><label>Image</label><?php echo $res['Image'] ?></span>
    </section>
	<input class="button" type="button" name="reviews" id="reviewButton" value="<?php echo count($output1) ?> Reviews" />
    <section id="reviewList">
      <span class="flex-input">
      	<textarea class="inputtext" rows="1" cols="100" name="reviewComment" ></textarea>
		<input class="smallbutton" type="submit" name="add_review" value="Add Review" />
	  </span>
      <?php
      	$x = 0;
      	while ($x < count($output1)) {
	      	echo '<span class="flex-input"><font color="cornflowerblue"><i>' . substr($output1[$x], 0, 10) . '</i></font>&nbsp;' . $output2[$x] . '</span>';
	    	$x++;
	    }
      ?>
    </section>
</form>
<script src="reviews.js"></script>
<?php
include('footer.php');
?>