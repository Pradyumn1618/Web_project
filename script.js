
var currentPage = window.location.href;

// Check each navigation link and add the "current-page" class to the appropriate link
var navigationLinks = document.querySelectorAll('.navigation a');

navigationLinks.forEach(function(link) {
  if (link.href === currentPage) {
    link.classList.add('init');
  }
});
function increaseRoomCount(roomNumber) {
  var roomCountElement = document.getElementById("roomCount"+roomNumber);
  var roomCount = parseInt(roomCountElement.value);
  roomCount++;
  roomCountElement.value = roomCount;
}

function decreaseRoomCount(roomNumber) {
  var roomCountElement = document.getElementById("roomCount"+roomNumber);
  var roomCount = parseInt(roomCountElement.value);
  if (roomCount > 1) {
    roomCount--;
    roomCountElement.value = roomCount;
  }
}

// Submit the form with updated room count

function submitForm() {
  var roomId=[];
  for(let i=1;i<5;i++){
  // var roomId = i; // Replace 1 with the actual roomId value
  var roomCountElement = document.getElementById("roomCount"+i);
  var roomCount = parseInt(roomCountElement.value);
  roomId.push(roomCount);
  }

  // Perform any additional validation if needed

  // Create a new form to submit the data
  var form = document.createElement("form");
  form.method = "post";
  form.action = "booking2.php"; // Replace with the appropriate PHP file
for(let i=1;i<5;i++){

  var roomCountInput = document.createElement("input");
  roomCountInput.type = "hidden";
  roomCountInput.name = "count"+i;
  roomCountInput.value = roomId[i-1];
  form.appendChild(roomCountInput);
}

  // Append the form to the body and submit it
  document.body.appendChild(form);
  form.submit();
}
function cancel(){
  document.getElementById('cancelAlert').style.display = 'block';
    
    // Example: Redirect to another page after a delay
    setTimeout(function() {
        window.location.href = "index.php";
    }, 2000); // Redirect after 2 seconds (2000 milliseconds)
}
function changebg(){
  var navbar=document.getElementById('navigation');
  var scroll=window.scrollY;
  if(scroll<150){
    navbar.classList.remove('bg');
  }
  else{
    navbar.classList.add('bg');
  }
}
window.addEventListener('scroll',changebg);

const element=document.querySelector('.alert');
function removeElement(){
  element.remove();
}
setTimeout(removeElement,2000);

function togglePasswordVisibility() {
  var passwordInput = document.getElementById('password');
  var togglePassword = document.getElementById('togglePassword');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    document.getElementById('togglePassword').innerHTML="HIDE";
  } else {
    passwordInput.type = 'password';
    document.getElementById('togglePassword').innerHTML="SHOW";

  }
}

