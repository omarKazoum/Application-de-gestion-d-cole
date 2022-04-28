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

const username_contact = document.getElementById("name");
const email_contact = document.getElementById("email");
const address_contact = document.getElementById("Address");
/*--Function validation AddContact page---*/
function ValidationContact(){
    if (username_contact.value == "" || username_contact.value == null) {
        
        alert("Please fill in Username");
        return false;
    }else if (email_contact.value == "" || email_contact.value == null) {
        alert("Please fill in Email");
        return false;
    }else if (address_contact.value == "" || address_contact.value == null) {
        alert("Please fill in Address");
        return false;
    }else{return true;}
}
