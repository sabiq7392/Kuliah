function Form() {
    var x = document.forms['myForm']['fname'].value;
    var z = document.forms['myForm']['pass'].value;
    if (x =="Sabiq143", z == "gajahmada123") {
        alert('Login Success!');
        return true;
    }
    
   
    else {
        alert('Username atau password salah');
        return false;
    }
}
