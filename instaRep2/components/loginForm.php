<form action="php/login.php" method="POST">
    <div id="loginForm" class="formIndex formActive">
        <h2>Login</h2>
        <input name="mailuid" type="text" placeholder="Username or email">
        <br>
        <input name="pwd" type="password" placeholder="Password">
        <br>
        <input type="submit">
        <br>
        <a onclick="showRegister()">Not a user? Register here!</a>
        <!-- <button type="button" id="registerBtn" onclick="showRegister()">Register</button> -->
    </div>
</form>