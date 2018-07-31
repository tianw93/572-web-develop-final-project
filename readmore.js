function readMore(){ 
 var description = document.getElementById("desc"); 
 var text = description.innerHTML; 
 var moreDesc = document.createElement("div"); 
 var btn = document.createElement("a"); 
 moreDesc.innerHTML = text.substring(0, 50); 
 btn.innerHTML = text.length > 50 ? "<i>Read More &gt;&gt;</i>" : ""; 
 btn.href = "###"; 
 btn.onclick = function(){ 
	if (btn.innerHTML == "<i>Read More &gt;&gt;</i>"){ 
		btn.innerHTML = "<i>Read Less &lt;&lt;</i>"; 
		moreDesc.innerHTML = text; 
	}
	else{ 
		btn.innerHTML = "<i>Read More &gt;&gt;</i>"; 
		moreDesc.innerHTML = text.substring(0, 50); 
	} 
 } 
 description.innerHTML = ""; 
 description.appendChild(moreDesc); 
 description.appendChild(btn); 
} 
readMore(); 