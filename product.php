<?php


//                <form action=\"<?php echo ($_SERVER['HTTP_REFERER'] == 'http://localhost/dbpro/Herfetna/Shop.php') ? 'Shop.php' : ''; 

function product($handcraft_type, $handcraft_price, $year, $weight, $handcraft_image_link, $handcraft_ID){
    $element = "
            <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"Shop.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$handcraft_image_link\" alt=\"\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\"> Material: $handcraft_type </h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                        
                            <h5>
                                <span class=\"weight\"> weight: $weight</span>
                            </h5>
                            <h5>
                                <span class=\"year\"> year: $year</span>
                            </h5>
                            
                            <h5>
                                <span class=\"price\"> $ $handcraft_price</span>
                            </h5>

                            <button typ=\"submit\" name=\"add\">Add to cart <i class=\"fas fa-shopping-cart\"></i> </button>
                            <input type=\"hidden\"name=\"handcraft_id\" value=\"$handcraft_ID\">
                        </div>
                    </div>
                </form>
            </div>
        "; 
    echo $element;
}
// 

function cartElement($handcraft_image_link, $handcraft_type, $handcraft_price, $handcraft_ID){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$handcraft_ID\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$handcraft_image_link alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$handcraft_type</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$$handcraft_price</h5>
                               
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}






?>