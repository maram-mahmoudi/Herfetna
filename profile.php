<?php
require_once "connect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Prepare artisan data to be inserted into the database
    $profile_pic = $_FILES['profile-pic']['name'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $birthdate = $_POST['birthdate'];

    // Upload profile picture
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["profile-pic"]["name"]);
    move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $target_file);

    // Check if artisan already exists
    $sql_check_artisan = "SELECT * FROM artisan WHERE Picture_link = '$profile_pic'";
    $result_check_artisan = mysqli_query($mysqli, $sql_check_artisan);

    if(mysqli_num_rows($result_check_artisan) > 0) {
        // If artisan already exists, update the record
        $row = mysqli_fetch_assoc($result_check_artisan);
        $artisan_id = $row['artisan_ID'];
        $sql_artisan = "UPDATE artisan SET City='$city', Country='$country' WHERE artisan_ID='$artisan_id'";
        mysqli_query($mysqli, $sql_artisan);
    } else {
        // If artisan does not exist, insert new record and get ID
        $sql_artisan = "INSERT INTO artisan (Picture_link, City, Country) VALUES ('$profile_pic', '$city', '$country')";
        mysqli_query($mysqli, $sql_artisan);
        $artisan_id = mysqli_insert_id($mysqli);
    }

    // Prepare handcraft data to be inserted into the database
    $artwork_pic = $_FILES['artwork-pic']['name'];
    $artwork_type = $_POST['artwork-type'];
    $artwork_price = $_POST['artwork-price'];
    $artwork_weight = $_POST['artwork-weight'];

    // Upload artwork picture
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["artwork-pic"]["name"]);
    move_uploaded_file($_FILES["artwork-pic"]["tmp_name"], $target_file);

    // Insert handcraft data into the database
    $sql_handcraft = "INSERT INTO handcraft (handcraft_image_link, handcraft_type, handcraft_price, weight, artisan_ID) VALUES ('$artwork_pic', '$artwork_type', '$artwork_price', '$artwork_weight', '$artisan_id')";
    mysqli_query($mysqli, $sql_handcraft);

    // Close the database connection
    mysqli_close($mysqli);
}

?>
