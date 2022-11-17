<?php 
function favorites($hostel_id, $image, $min_price, $max_price, $direction){
    $element = "
    
    <table class=\"table-responsive\">
                                <thead>
                                    <tr>
                                        <th class=\"pl-2\">All Hostels</th>
                                        <th class=\"p-0\"></th>
                                        <th>Price Range in GH₵</th>
                                        <th>Total Available Rooms</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class=\"image myelist\">
                                            <a href=\"single-property-1.html\"><img alt=\"my-properties-3\" src=\"images/feature-properties/fp-1.jpg\" class=\"img-fluid\"></a>
                                        </td>
                                        <td>
                                            <div class=\"inner\">
                                                <a href=\"single-property-1.html\"><h2>Luxury Villa House</h2></a>
                                            </div>
                                        </td>
                                        <td>5000-8000</td>
                                        <td>12</td>
                                        <td>
                                        <a href=\"#\" style=\"color:red;\"><i  class=\"far fa-trash-alt\"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
    
    ";
    echo $element;

}

function index($hostel_id, $hostel_name, $price_range, $image){
    $element = "
    <div class=\"item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale\">
    <div class=\"project-single\" data-aos=\"fade-up\">
        <div class=\"project-inner project-head\">
            <div class=\"project-bottom\">
            <input type='hidden' name='room_id' value='$hostel_id'>
                <h4><a href=\"login.php\">View Property</a></h4>
            </div>
            <div class=\"homes\">
                <a href=\"login.php\" class=\"homes-img\">
                    <img src=\"$image\" alt=\"home-1\" class=\"img-responsive\">
                </a>
            </div>
            <div class=\"button-effect\">
                <a href=\"login.php\" class=\"img-poppu btn\"><i class=\"fa fa-photo\"></i></a>
            </div>
        </div>
        <div class=\"homes-content\">
            <h3><a href=\"login.php\">$hostel_name</a></h3>
            <p class=\"homes-address mb-3\">
                <a href=\"login.php\">
                    <i class=\"fa fa-map-marker\"></i><span>1 University Avenue, Berekuso</span>
                </a>
            </p>
            <ul class=\"homes-list clearfix pb-3\">
                <li class=\"the-icons\">
                    <i class=\"fa fa-bed mr-2\" aria-hidden=\"true\"></i>
                    <span>Bedrooms</span>
                </li>
                <li class=\"the-icons\">
                    <i class=\"fa fa-bath mr-2\" aria-hidden=\"true\"></i>
                    <span>Bathrooms</span>
                </li>
                <li class=\"the-icons\">
                    <i class=\"fa fa-lock mr-2\" aria-hidden=\"true\"></i>
                    <span>Security</span>
                </li>
                <li class=\"the-icons\">
                    <i class=\"fa fa-car mr-2\" aria-hidden=\"true\"></i>
                    <span>Car park</span>
                </li>
            </ul>
            <div class=\"price-properties footer pt-3 pb-0\">
                <h3 class=\"title mt-3\">
                 <a href=\"login.php\">GH₵ $price_range</a>
                </h3>
            </div>
        </div>
    </div>
</div>
    ";
    echo $element;
}

function index_all($hostel_id, $hostel_name, $hostel_owner, $price_range, $image){
    $element = "
    <div class=\"item col-lg-4 col-md-6 col-xs-12 people rent\">
                        <div class=\"project-single\" data-aos=\"fade-up\">
                            <div class=\"project-inner project-head\">
                                <div class=\"project-bottom\">
                                <input type='hidden' name='room_id' value='$hostel_id'>
                                    <h4><a href=\"login.php\">View Property</a><span class=\"category\">Real Estate</span></h4>
                                </div>
                                <div class=\"homes\">
                                    <a href=\"login.php\" class=\"homes-img\">
                                        <img src=\"$image\" alt=\"home-1\" class=\"img-responsive\">
                                    </a>
                                </div>
                                <div class=\"button-effect\">
                                    <a href=\"login.php\" class=\"img-poppu btn\"><i class=\"fa fa-photo\"></i></a>
                                </div>
                            </div>
                            <div class=\"homes-content\">
                                <h3><a href=\"login.php\">$hostel_name</a></h3>
                                <p class=\"homes-address mb-3\">
                                    <a href=\"login.php\">
                                        <i class=\"fa fa-map-marker\"></i><span>1 University Avenue, Berekuso</span>
                                    </a>
                                </p>
                                <ul class=\"homes-list clearfix pb-3\">
                                    <li class=\"the-icons\">
                                        <i class=\"fa fa-bed mr-2\" aria-hidden=\"true\"></i>
                                        <span>Bedrooms</span>
                                    </li>
                                    <li class=\"the-icons\">
                                        <i class=\"fa fa-bath mr-2\" aria-hidden=\"true\"></i>
                                        <span>Bathrooms</span>
                                    </li>
                                    <li class=\"the-icons\">
                                        <i class=\"fa fa-lock mr-2\" aria-hidden=\"true\"></i>
                                        <span>Security</span>
                                    </li>
                                    <li class=\"the-icons\">
                                        <i class=\"fa fa-car mr-2\" aria-hidden=\"true\"></i>
                                        <span>Car park</span>
                                    </li>
                                </ul>
                                <!-- Price -->
                                <div class=\"price-properties\">
                                    <h3 class=\"title mt-3\">
                                <a href=\"login.php\">GH₵ $price_range</a>
                                </h3>
                                </div>
                                <div class=\"footer\">
                                    <a href=\"login.php\">
                                        <i class=\"fa fa-user\"></i> $hostel_owner
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

    ";
    echo $element;
}
?>
