<?php

if(empty($_POST["firstname"])){
    die(" First Name is required");
}

if(empty($_POST["lastname"])){
    die("Last Name is required");
}

if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 6){
    die("Password should contain at least 6 characters");
}

if( ! preg_match("/[a-z]/i", $_POST["password"]) ){
    die("Password should contain at least one letter"); 
}

if($_POST["password"] !== $_POST["password_confirmation"]){
    die("Password must match.");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli  = require __DIR__ . "/connect.php";

// sql statements
//$sql = "INSERT INTO artisan (artisan_ID, Country, City, first_name, last_name, email, gender, password_hash) 

$sql = "INSERT INTO artisan (artisan_ID, first_name, last_name, gender,email, password ) 
VALUES (?, ?, ?, ?, ?, ?)"; 

$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql) ){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssss", $_POST["artisan_ID"], $_POST["firstname"], $_POST["lastname"], $_POST["gender"], $_POST["email"], $password_hash);
                  
if ($stmt->execute()){

    header("Location: aboutUs.html");  // change this location into profile page 
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}


print_r($_POST);
 
