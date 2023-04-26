<?php

if(empty($_POST["artisan_ID"])){
    echo "<script>alert('ID is required  and should be 5 digits!!!!!!!!!!');</script>";
    echo "<script>window.history.back();</script>";
}

if(empty($_POST["firstname"])){
    echo "<script>alert('First Name is required !!!!!!!!!!');</script>";
    echo "<script>window.history.back();</script>";
}

if(empty($_POST["lastname"])){
    echo "<script>alert('Last Name is required !!!!!!!!!!');</script>";
    echo "<script>window.history.back();</script>";
}

if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    echo "<script>alert('Valid Email is required !!!!!!!!!!');</script>";
    echo "<script>window.history.back();</script>";
}

if(strlen($_POST["password"]) < 6){
    echo "<script>alert('Password should contain at least 6 characters');</script>";
    echo "<script>window.history.back();</script>";
    
}

if( ! preg_match("/[a-z]/i", $_POST["password"]) ){

    echo "<script>alert('Password should contain at least one letter');</script>";
    echo "<script>window.history.back();</script>";
}

if($_POST["password"] !== $_POST["password_confirmation"]){

    echo "<script>alert('Password must match');</script>";
    echo "<script>window.history.back();</script>";
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

    header("Location: profile.html");  // change this location into profile page 
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}


print_r($_POST);
 
