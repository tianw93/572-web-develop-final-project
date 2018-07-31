<?php
include('header.php');
?>
<script src="validation.js"></script>
<form name="updateForm" onmouseleave="return validateAddForm()" method="post">
  <section id="controls">
    <input class="button" type="submit"
        name="browse_restaurants" value="Browse"/>
    <input class="button" type="submit"
        name="save_new_restaurant" onclick="return validateAddForm()" value="Save"/>
  </section>
  <section id="input">
    <span class="flex-input"><label>ID</label><input type="text" name="id" value="<?php echo $id ?>"/><div id="id_div"></div><?php echo $error ?></span>
    <span class="flex-input"><label>Name</label><input type="text" name="name" value="<?php echo $name ?>"/><div id="n_div"></div></span>
    <span class="flex-input"><label>City</label><input type="text" name="city" value="<?php echo $city ?>"/><div id="c_div"></div></span>
    <span class="flex-input"><label>State</label>
	<select name="state" value="<?php echo $state ?>" required>
	  <option value="AL">AL</option>
	  <option value="AK">AK</option> 
	  <option value="AZ">AZ</option>
	  <option value="AR">AR</option>
	  <option value="CA">CA</option>
	  <option value="CO">CO</option>
	  <option value="CT">CT</option>
	  <option value="DE">DE</option>
	  <option value="DC">DC</option>
	  <option value="FL">FL</option>
	  <option value="GA">GA</option>
	  <option value="HI">HI</option>
	  <option value="ID">ID</option>
	  <option value="IL">IL</option>
	  <option value="IN">IN</option>
	  <option value="IA">IA</option>
	  <option value="KS">KS</option>
	  <option value="KY">KY</option>
	  <option value="LA">LA</option>
	  <option value="ME">ME</option>
	  <option value="MD">MD</option>
	  <option value="MA">MA</option>
	  <option value="MI">MI</option>
	  <option value="MN">MN</option>
	  <option value="MS">MS</option>
	  <option value="MO">MO</option>
	  <option value="MT">MT</option>
	  <option value="NE">NE</option>
	  <option value="NV">NV</option>
	  <option value="NH">NH</option>
	  <option value="NJ">NJ</option>
	  <option value="NM">NM</option>
	  <option value="NY">NY</option>
	  <option value="NC">NC</option>
	  <option value="ND">ND</option>  
	  <option value="OH">OH</option>
	  <option value="OK">OK</option>
	  <option value="OR">OR</option>
	  <option value="PA">PA</option>
	  <option value="RI">RI</option>
	  <option value="SC">SC</option>
	  <option value="SD">SD</option>
	  <option value="TN">TN</option>
	  <option value="TX">TX</option>
	  <option value="UT">UT</option>
	  <option value="VT">VT</option>
	  <option value="VA">VA</option>
	  <option value="WA">WA</option>
	  <option value="WV">WV</option>
	  <option value="WI">WI</option>
	  <option value="WY">WY</option>
	</select>
	</span>
    <span class="flex-input"><label>Cuisine</label>
    <select name="cuisine" value="<?php echo $cuisine ?>" required>
  		<option value="American">American</option>
  		<option value="French">French</option>
  		<option value="Greek">Greek</option>
  		<option value="Indian">Indian</option>
  		<option value="Italian">Italian</option>
  		<option value="Japanese">Japanese</option>
  		<option value="Mediterranean">Mediterranean</option>
  		<option value="Pizza">Pizza</option>
  		<option value="Southwestern">Southwestern</option>
	</select>
    </span>
    <span class="flex-input"><label>Description</label><input type="text" name="description" value="<?php echo $description ?>"/><div id="d_div"></div></span>
    <span class="flex-input"><label>Price</label><input type="text" name="price" value="<?php echo $price ?>"/><div id="p_div"></div></span>
    <span class="flex-input"><label>Rating</label><input type="text" name="rating" value="<?php echo $rating ?>"/><div id="r_div"></div></span>
    <span class="flex-input"><label>Image</label><input type="text" name="image" value="<?php echo $image ?>"/><div id="i_div"></div></span>
  </section>
</form>

<?php
include('footer.php');
?>