<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberV</title>
    <link rel="stylesheet" href="logReg.css">
</head>
<body>
    <div class="container">
        <h1>Team: CyberV</h1>
        <div class="box">
            <div class="button-box">
                <div id="btn"></div>
                <button type= "button" class="toggle-btn" onclick="login()">LogIn</button>
                <button type= "button" class="toggle-btn" onclick="register()">SignUp</button>
            </div>
            <form id = "login" class="inputs">
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="text" class="input-field" placeholder="Enter Password" required>
                <br></br>
                <button type="submit" class="submit-btn" onclick="change()">Log In</button>
            </form>

            <form id="register" class="inputs">
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="email" class="input-field" placeholder="Email Id" required>
                <input type="text" class="input-field" placeholder="Enter Password" required>
                <br></br>
                <button type="submit" class="submit-btn" onclick="change()">Register</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        function register(){
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login(){
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0px"; 
        }
        function change(){
            window.location.href = "tiles.php";
        }
        </script>
</body>
</html>