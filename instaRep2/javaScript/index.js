function checkPasswordMatch() {
    if (document.getElementById("psw1").value == document.getElementById("psw2").value) {
        document.getElementById("confirmation").innerHTML = "Passwords match";
        document.getElementById("psw2").style.borderColor = "lime";
    } else {
        document.getElementById("confirmation").innerHTML = "Passwords don't match";
        document.getElementById("psw2").style.borderColor = "red";
    }
}

function showLogin() {
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("registerForm").style.display = "none";
}

function showRegister() {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "block";
}