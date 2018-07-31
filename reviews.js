var listReviews = document.querySelector('#reviewButton');
listReviews.addEventListener('click', toggleDisplay);


function toggleDisplay(){
  var details = document.querySelector('#reviewList');
  
  if (details.style.display == 'block'){
    details.style.display = 'none';
  }
  else {
    details.style.display = 'block';
  }
}