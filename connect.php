<?php
// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'Herfetna';

// Create a database connection
$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


class ConnectDB {
    private $con;

    function __construct() {
        $this->con = $GLOBALS['mysqli'];
    }

    function getData($handcraft_type) {
        $sql= "SELECT * FROM handcraft where handcraft_type = '$handcraft_type'";

        $result = mysqli_query($this->con, $sql); 

        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }
    function getDataall() {
        $sql= "SELECT * FROM handcraft ";

        $result = mysqli_query($this->con, $sql); 

        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }

    
}

// Create an instance of the ConnectDB class
$db = new ConnectDB();

// Return the database connection object
return $mysqli;

?>


