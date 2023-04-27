
<?php

    session_start(); 

    require_once('./product.php');
    require_once('connect.php');

    if(isset($_POST['add'])){
        //print_r($_POST['handcraft_id']);
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "handcraft_id");    
            
            if (in_array($_POST['handcraft_id'], $item_array_id)){
                echo"<script>alert('Handcraft already added to the cart!') </script>";
                echo"<script>window.location = 'glassshop.php'</script>"; 
            }else{
                $count= count($_SESSION['cart']);
                $item_array = array('handcraft_id'=> $_POST['handcraft_id']);
                $_SESSION['cart'][$count]= $item_array; 
            }

        }else{
            $item_array = array('handcraft_id'=> $_POST['handcraft_id']);
            // create a session. 
            $_SESSION['cart'][0]= $item_array; 
            print_r($_SESSION['cart']);

        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Glass Shopping</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <link rel="stylesheet" href="shop.css">
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
                    <li><a href="signup.html">SIGN IN</a></li>
                    <li><a href="Shop.php">SHOP</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu"></i>
        </nav>
        <h1>  Welcome to Our Store </h1>
    </section>





    <?php require_once("shopheader.php"); ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
                
                $result= $db->getData('glass'); 
                while($row = mysqli_fetch_assoc($result)){
                    product($row['handcraft_type'], $row['handcraft_price'], $row['year'], $row['weight'], $row['handcraft_image_link'], $row['handcraft_ID']); 
                }
                
            ?>
        </div>
    </div>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>