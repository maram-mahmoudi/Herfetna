<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="payment.css">
    </head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Credit Card: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']);
    if (empty($name)) {
        echo "Credit Card is empty";
    } else {
        echo $name;
    }
}
?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Email: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']);
    if (empty($name)) {
        echo "Email is empty";
    } else {
        echo $name;
    }
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']);
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 Address: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']);
    if (empty($name)) {
        echo "Address is empty";
    } else {
        echo $name;
    }
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Phone Number: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']);
    if (empty($name)) {
        echo "Phone number is empty";
    } else {
        echo $name;
    }
}
?>

</body>
</html>