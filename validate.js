

let passwordReg = /(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/;
let idReg = /^[0-9]{8}$/;

//10 digits which can be delineated either by spaces or dashes
let phoneReg = /\d/ ;

// must contain an @ followed by a period and an email domain that consists of 2 to 5 characters.
let emailReg = /ab@./;

const form = document.querySelector("#seller-signup");

const userPassword = document.querySelector("#password");
const userID = document.querySelector("#id-num");
const phoneNumber = document.querySelector("#phone-number");
const email = document.querySelector("#email");

form.addEventListener("submit", function(e){
    e.preventDefault();
    validate();
});


function validate(){
    let passwordReg = /(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/;
    let idReg = /^[0-9]{8}$/;

    if(userPassword.value.length > 10){
        alert("Password cannot exceed 10 characters");
    }
    else if(!passwordReg.test(userPassword.value)){
        alert("Password must have at least 1 uppercase letter, 1 special character and 1 numeric character");
    }

    if(!idReg.test(userID.value)){
        alert("ID should only contain exactly an 8-digit number");
    }

}

function verify(){

}