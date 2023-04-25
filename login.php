<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/connect.php"; //connect to db
    
    $sql = sprintf("SELECT * FROM artisan WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {  
        
        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["artisan_ID"];
            
            header("Location: index.php");
            exit;
        }
        else{
            print("password not verified ay haga"); 
        }
        
    }
    else {
        print("whatver");
    }
    
    $is_invalid = true;
}


?>



<html> 
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <section class="sign">
        <nav> 
            <div class="nav-links" id="navLinks"> 
                <i class="fa fa-times" onclick="hideMenu()" ></i>
                <ul>  
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="aboutUs.html">ABOUT</a></li>
                    <!--li><a href="">CONTACT</a></li-->
                    <li><a href="signup.html">SIGN IN</a></li>
                    <li><a href="shoppingCart.html">SHOPPING CART</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu"></i>
        </nav>
        <h1>  Welcome to Our Community </h1>
    </section>

        <div class="login-box">
            <h1>Login</h1>

            <?php if ($is_invalid): ?>
                <em> Invalid login </em>
            <?php endif; ?>

            <form method="post">
                <label for="email"> Email </label>
                <input type="email" placeholder="" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                <label for="password"> Password </label>
                <input type="password" placeholder="" id="password" name="password">
                <button> log in</button>
            </form>
        </div>
        <p class="para-2"> You do not have an acount? <a href="signup.html">Sign Up Here</a></p>
    </body>

</html>