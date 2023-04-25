<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/connect.php";
    
    $sql = "SELECT * FROM artisan
            WHERE artisan_ID = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
<div class="index">
    <h1>Home</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["first_name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        <p>Session variable user_id is <?php echo isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "not set"; ?></p>
        
    <?php endif; ?>
</div>

</body>
</html>
    