
function check(form) {
    
    var x = document.getElementById("myform");

    if (x.elements[0].value == '' || x.elements[0].value == null) {
        alert("first name cannot be empty");
        return false;
    }

    if (x.elements[1].value == '' || x.elements[1].value == null) {
        alert("Last name cannot be empty");
        return false;
    }


    if (document.forms.myform.Gender[0].checked == false && document.formsmyform.Gender[1].checked == false) {
        alert("Please choose your Gender: Male or Female");
        return false;
    }
   
    var e = x.elements[3].value;
    var reg = /\w+@(somaiya.edu|gmail.com)/;
    if(!reg.test(e)) return false;
    
    if (!phone(x)) {
        alert("Please add valid phone number");
        return false;
    }
    if (!username(x)) {
        alert("Please use only aphabets and numbers");
        return false;
    }
    password(x);

}

function password(x) {
    var p = x.elements[7].value;
    var cp = x.elements[8].value;
    var regp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
    if (p == '' || p == null) {
        alert("fill the password input");
        return false;
    }
    if (cp == '' || cp == null) {
        alert("fill the confirm password input")
        return false;
    }

    if (cp == p) {
        if (!regp.test(p)) {
            alert("Enter strong password with min 8 characters, a uppercase and lowercase.also use special symbol");
            return false;
        }

    }

    else {
        alert("password doesnt match");
        return false;
    }
    var sub = document.getElementById('sub');
    sub.addEventListener('onclick', print);
    function print(e) {
        e.preventDefault();
        alert("Signed up successful");
    }

}
function phone(x) {
    var ph = x.elements[5].value;
    var regno = /[0-9]{10}/;
    if (ph == '' || ph == null) {
        alert("fill the phone number input");
        return false;
    }
    return regno.test(ph);

}
function username(x) {
    var ph = x.elements[6].value;
    var regno = /^[a-zA-Z]+(_)?\d+$/;
    if (ph == '' || ph == null) {
        alert("fill the userID");
        return false;
    }
    return regno.test(ph);
}


