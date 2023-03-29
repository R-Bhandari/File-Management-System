var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('r-password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Password Matching';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Password Not Matching';
    }
}

var lengthCheck = function() {
  const passLength = document.getElementById("password").value
  if ((passLength.length<8) || (passLength.length>16)) {
      document.getElementById("length-check-message").style.color = 'red'
      document.getElementById("length-check-message").innerHTML = 'Please Enter the Password Greater than 8 Character'
  }
  else {
    document.getElementById("length-check-message").style.display = 'none'
  }
}