function isPwdWeak(){
    let pwd = document.getElementById("pwd").value.trim();
    let input = document.querySelectorAll(".user-input");
    if (!isPwdValid(pwd)) {
        event.preventDefault();
    }
    changeMultipleCol(0, 2, input, "1px solid #ed8796");
    setTimeout(() => changeMultipleCol(0, 2, input, "none"), 2000);
}

function isSubmitable() {
    let pwd = document.getElementById("pwd").value.trim();
    let email = document.getElementById("email").value.trim();
    let recEmail = document.getElementById("recovery").value.trim();
    let input = document.querySelectorAll(".user-input");

    if(!isPwdValid(pwd) && isEqual(email, recEmail)){
        window.alert(`Your password doesn't meet the requirements and your recovery email is the same as your email`);
        changeMultipleCol(2, 4, input, "1px solid #ed8796");
        setTimeout(() => changeMultipleCol(2, 4, input, "none"), 2000);
        event.preventDefault();
    }
    else if(isEqual(email, recEmail)){
        window.alert(`Your recovery email is the same as your email`);
        outlineColor(input, 2, "1px solid #ed8796");
        setTimeout(() => outlineColor(input, 2, "none"), 2000);
        event.preventDefault();
    }
    else if(!isPwdValid(pwd)){
        window.alert(`Your password doesn't meet the requirements`);
        outlineColor(input, 3, "1px solid #ed8796");
        setTimeout(() => outlineColor(input, 3, "none"), 2000);
        event.preventDefault();
    }
}

function changeMultipleCol(num1, num2, input, str){
    for(let i = num1; i < num2; i++){
        outlineColor(input, i, str);
    }
}

function outlineColor(input, number, str){
    input[number].style.outline = str;
}

function isEqual(str, str2){
    return str == str2;
}

function isPwdValid(str){
    return hasMinChar(str) && hasLowercase(str) && hasUppercase(str) && hasNumber(str) && hasSpecial(str);
}

function hasMinChar(str){
    return str.length >= 8;
}

function hasLowercase(str){
    return /[a-z]/.test(str);
}

function hasUppercase(str){
    return /[A-Z]/.test(str);
}

function hasNumber(str) {
    return /[0-9]/.test(str);
}

function hasSpecial(str){
    return /[`!@#$%^&*()_\-+=\[\]{};':"\\|,.<>\/?~]/.test(str);
}

