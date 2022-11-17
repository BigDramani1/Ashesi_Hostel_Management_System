<?php 
function home($hostel_id, $hostel_name, $price_range, $image){
    $element = "
    <div class=\"item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale\">
    <div class=\"project-single\" data-aos=\"fade-up\">
        <div class=\"project-inner project-head\">
            <div class=\"project-bottom\">
            <input type='hidden' name='hostel_id' value='$hostel_id'>
                <h4><a href=\"hostel_details.php?hostel_id=$hostel_id\" >View Property</a></h4>
            </div>
            <div class=\"homes\">
                <a href=\"hostel_details.php?hostel_id=$hostel_id\" >
                    <img src=\"$image\" alt=\"home-1\" class=\"img-responsive\">
                </a>
            </div>
            <div class=\"button-effect\">
                <a href=\"hostel_details.php?hostel_id=$hostel_id\"  class=\"img-poppu btn\"><i class=\"fa fa-photo\"></i></a>
            </div>
        </div>
        <div class=\"homes-content\">
            <h3><a href=\"hostel_details.php?hostel_id=$hostel_id\" >$hostel_name</a></h3>
            <p class=\"homes-address mb-3\">
                <a href=\"hostel_details.php?hostel_id=$hostel_id\" >
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
                 <a href=\"hostel_details.php?hostel_id=$hostel_id\"  name='click'>GH₵ $price_range</a>
                </h3>
            </div>
        </div>
    </div>
</div>
    ";
    echo $element;
}

function all_hostels($hostel_id, $hostel_name, $hostel_owner, $price_range, $image){
    $element = "
    <div class=\"item col-lg-4 col-md-6 col-xs-12 people rent\">
                        <div class=\"project-single\" data-aos=\"fade-up\">
                            <div class=\"project-inner project-head\">
                                <div class=\"project-bottom\">
                                <input type='hidden' name='hostel_id' value='$hostel_id'  >
                                    <h4><a href=\"hostel_details.php?hostel_id=$hostel_id\">View Property</a><span class=\"category\">Real Estate</span></h4>
                                </div>
                                <div class=\"homes\">
                                    <a href=\"hostel_details.php?hostel_id=$hostel_id\" class=\"homes-img\">
                                        <img src=\"$image\" alt=\"home-1\" class=\"img-responsive\">
                                    </a>
                                </div>
                                <div class=\"button-effect\">
                                    <a href=\"hostel_details.php?hostel_id=$hostel_id\" class=\"img-poppu btn\"><i class=\"fa fa-photo\"></i></a>
                                </div>
                            </div>
                            <div class=\"homes-content\">
                                <h3><a href=\"hostel_details.php?hostel_id=$hostel_id\">$hostel_name</a></h3>
                                <p class=\"homes-address mb-3\">
                                    <a href=\"hostel_details.php?hostel_id=$hostel_id\">
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
                                <a href=\"hostel_details.php?hostel_id=$hostel_id\">GH₵ $price_range</a>
                                </h3>
                                </div>
                                <div class=\"footer\">
                                    <a href=\"hostel_details.php?hostel_id=$hostel_id\" >
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
