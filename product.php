<?php

function product($handcraft_type, $handcraft_price, $year, $weight, $handcraft_image_link, $handcraft_ID){
    $element = "
            <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"glassShop.php\" method=\"post\">
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
                                <span class=\"price\">  $handcraft_price</span>
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

?>