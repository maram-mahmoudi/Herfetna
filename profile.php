<?php
    require_once('connect.php');
    $image = $_POST["image"]; 
    $id= $_POST["id"];
    $type = $_POST["type"]; 
    $price = $_POST["price"];
    $year = $_POST["year"];  
    $weight = $_POST["weight"]; 
    

    $sql = "INSERT INTO handcraft (handcraft_ID, handcraft_image_link, handcraft_type, handcraft_price, year, weight)
        VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($mysqli);

    if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
        die(mysqli_error($mysqli));
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $id, $image, $type, $price, $year, $weight);

    mysqli_stmt_execute($stmt);


?>