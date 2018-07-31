// suppose each field is required except image
// in other words, none of these fields except image should be empty
// I choose to use JS validation instead of dropdown lists for price and rating

function validateID() {
	var w = document.forms["updateForm"]["id"].value;
	var id_e = document.createElement("div");
    var id_d = document.getElementById("id_div"); 
    if (w.length < 2 || w.length > 6 || w.charAt(0) != "R" || Number.isInteger(Number(w.substr(1))) == false) {
    	id_e.innerHTML = "&nbsp;<font color='red'><i>ID should start with R, followed by 1-5 integers</i></font>"; 
        id_d.innerHTML = ""; 
 		id_d.appendChild(id_e);
 		return false; 
    }
    else {
    	id_e.innerHTML = ""; 
        id_d.innerHTML = ""; 
    	id_d.appendChild(id_e);
    	return true;
    }
    
}

function validateName() {
    var n = document.forms["updateForm"]["name"].value;
    var name_e = document.createElement("div");
    var name_d = document.getElementById("n_div"); 
    // check if name has at least 1 alphanumeric character
    if (!n.match(/(.*[0-9a-zA-Z]){1}/) || n.length < 1) {
    	name_e.innerHTML = "&nbsp;<font color='red'><i>Name must have at least 1 alphanumeric character</i></font>"; 
        name_d.innerHTML = ""; 
 		name_d.appendChild(name_e); 
 		return false;
    }
    else {
    	name_e.innerHTML = ""; 
        name_d.innerHTML = ""; 
    	name_d.appendChild(name_e);
    	return true;
    }
}


function validateCity() {
    var c = document.forms["updateForm"]["city"].value;
    var city_e = document.createElement("div");
    var city_d = document.getElementById("c_div"); 
    // check if city starts with a capital letter and has at least three alphanumeric characters
    if (!c.charAt(0).match(/[A-Z]/) || c.length < 3 || !c.match(/(.*[0-9a-zA-Z]){3}/)) {
    	city_e.innerHTML = "&nbsp;<font color='red'><i>City must have at least 3 alphanumeric characters, starting with a capital letter</i></font>"; 
        city_d.innerHTML = ""; 
 		city_d.appendChild(city_e);
 		return false;
    }
    else {
    	city_e.innerHTML = ""; 
        city_d.innerHTML = ""; 
    	city_d.appendChild(city_e);
    	return true;
    }
}

function validateDesc() {
    var d = document.forms["updateForm"]["description"].value;
    var desc_e = document.createElement("div");
    var desc_d = document.getElementById("d_div"); 
    // check if description includes at least 5 words
    if (!d.match(/[^\s]+\s[^\s]+\s[^\s]+\s[^\s]+\s[^\s]+/)) {
    	desc_e.innerHTML = "&nbsp;<font color='red'><i>Description must have at least 5 words</i></font>"; 
        desc_d.innerHTML = ""; 
 		desc_d.appendChild(desc_e); 
 		return false;
    }
    else {
    	desc_e.innerHTML = ""; 
        desc_d.innerHTML = ""; 
    	desc_d.appendChild(desc_e);
    	return true;
    }
}


function validatePrice() {
    var x = document.forms["updateForm"]["price"].value;
	var price_e = document.createElement("div");
    var price_d = document.getElementById("p_div"); 
    // if the user enters something other than an integer between 1 and 5, show the error message
    if (x > 5 || x < 1 || (Number.isInteger(Number(x)) == false)) {
    	price_e.innerHTML = "&nbsp;<font color='red'><i>Price must be an integer between 1 and 5 inclusive</i></font>"; 
       	price_d.innerHTML = ""; 
 		price_d.appendChild(price_e);
 		return false;
 	}
 	// if the user enters valid price, no message will be shown
 	else {
    	price_e.innerHTML = ""; 
        price_d.innerHTML = ""; 
 		price_d.appendChild(price_e);
 		return true;
 	}
}	
   
function validateRating() { 	
    var y = document.forms["updateForm"]["rating"].value;
    var rating_e = document.createElement("div");
    var rating_d = document.getElementById("r_div"); 
    // if the user enters something other than an integer between 1 and 5, show the error message
    if (y > 5 || y < 1 || (Number.isInteger(Number(y)) == false)) {
    	rating_e.innerHTML = "&nbsp;<font color='red'><i>Rating must be an integer between 1 and 5 inclusive</i></font>"; 
       	rating_d.innerHTML = ""; 
 		rating_d.appendChild(rating_e);
 		return false;
 	}
 	// if the user enters valid rating, no message will be shown
 	else {
    	rating_e.innerHTML = ""; 
        rating_d.innerHTML = ""; 
 		rating_d.appendChild(rating_e);
 		return true;
 	}
}

function validateImage() {
    var z = document.forms["updateForm"]["image"].value;
    var image_e = document.createElement("div");
    var image_d = document.getElementById("i_div"); 
    // check if the image value ends with .jpg, .gif, or .png
    if (((z.endsWith(".jpg") == false) && (z.endsWith(".png") == false) && (z.endsWith(".gif") == false)) && z != "") {
    	image_e.innerHTML = "&nbsp;<font color='red'><i>Image must have a file type of jpg, png, or gif</i></font>"; 
       	image_d.innerHTML = ""; 
 		image_d.appendChild(image_e);
 		return false;
 	}
 	else {
    	image_e.innerHTML = ""; 
        image_d.innerHTML = ""; 
 		image_d.appendChild(image_e);
 		return true;
 	}	
}


function validateAddForm() {
	validateID();
	validateName();
	validateCity();
	validateDesc();
	validatePrice();
	validateRating();
	validateImage();
	if (!validateID() || !validateName() || !validateCity() || !validateDesc() || !validatePrice() || !validateRating() ||!validateImage()) {
		return false;
	}
	else {
		return true;
	}
}

function validateUpdateForm() {
	validateName();
	validateCity();
	validateDesc();
	validatePrice();
	validateRating();
	validateImage();
	if (!validateName() || !validateCity() || !validateDesc() || !validatePrice() || !validateRating() ||!validateImage()) {
		return false;
	}
	else {
		return true;
	}
}
