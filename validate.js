const form = document.querySelector("#seller-signup");

const userPassword = document.querySelector("#password");
const userID = document.querySelector("#id-num");
const phoneNumber = document.querySelector("#phone-number");
const email = document.querySelector("#email");

function validate(){

    let hasEmptyField = false;
    let passwordReg = /(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])/;
    let idReg = /^[0-9]{8}$/;
    let phoneReg = /^[0-9]{3}\s?-?[0-9]{3}\s?-?[0-9]{4}$/;
    let emailReg = /\S+@[a-zA-Z]{2,5}[.][a-zA-Z]+/;

    for(let i = 0; i < 5; i++){
        if(form[i].value === ''){
            hasEmptyField = true;
        }
    }

    if(hasEmptyField){
        alert("Please fill in all the required fields.");
        return false;
    }
    else if(userPassword.value.length > 10){
        alert("Password cannot exceed 10 characters");
        form[2].focus();
        return false;
    }
    else if(!passwordReg.test(userPassword.value)){
        alert("Password must have at least 1 uppercase letter, 1 special character and 1 numeric character");
        form[2].focus();
        return false;

    }
    else if(!idReg.test(userID.value)){
        alert("ID should only contain exactly an 8-digit number");
        form[3].focus();
        return false;

    }
    else if(!phoneReg.test(phoneNumber.value)){
        alert("phone number should consist of 10 digits which can be delineated either by spaces or dashes");
        form[4].focus();
        return false;
    }
    else if(document.querySelector("#emailConfirmation").checked){
        if(!emailReg.test(email.value)){
            alert("Please input a valid email address. Email must contain an @ followed by a period and an" +
                "email domain that consists of 2 to 5 characters.");
            form[5].focus();
            return false;
        }
        else{
            form.submit();
        }
    }
    else{
        form.submit();
    }
}

function clearForm(){
    form.reset();
}