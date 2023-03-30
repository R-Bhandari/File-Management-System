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

const phone = document.querySelector('#pnumber');
function pnumberCheck() {
    const phone = document.getElementById('pnumber');
    const message = document.getElementById('pnumber-check-message');
    message.innerHTML = '';
    if (parseInt(phone.value) < 0) {
        message.style.color = 'red';
        message.innerHTML = 'Phone number cannot be negative.<br>';
    }else if (phone.value.length != 10) {
        const para = document.createElement('span');
        para.style.color = 'red';
        para.innerHTML = 'Phone number should be of length 10.<br>';
        message.append(para);
    } else {
        message.innerHTML = '';
    }
}