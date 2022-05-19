var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
const username_user= document.getElementById("Username");
const password_user= document.getElementById("Password");
const password_verify_user= document.getElementById("Password_verify");
/*--Function validation signup page---*/
function validation(){
    if (username_user.value == "" || username_user.value == null) {
        
        alert("Please fill in Username");
        return false;
    }else if (password_user.value == "" || password_user.value == null) {
        alert("Please fill in Password");
        return false;
    }else if (password_verify_user.value == "" || password_verify_user.value == null) {
        alert("Please fill in Password verify");
        return false;
    }else if (password_user.value == password_verify_user) {
        alert("Password or Password verify incorrect");
        return false;
    }else{return true;}
}

const username_login = document.getElementById("username_login");
const password_login = document.getElementById("password_login");
/*--Function validation login page---*/
function validation_login() {
    if (username_login.value == "" || username_login.value == null) {
        
        alert("Please fill in Username");
        return false;
    }else if (password_login.value == "" || email_contact.value == null) {
        alert("Please fill in Password");
        return false;
    }else{return true;}
}
// function for validation
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()