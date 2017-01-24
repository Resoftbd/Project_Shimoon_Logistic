<!DOCTYPE html>
<html lang="en">							<!-- Slider starts here-->


<div class="container-fluid slider-div">
    <div id="myCarousel" class="carousel slide jumborton" data-ride="carousel" data-interval="4500">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $count = count($slideshow);
            echo' <li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
            for($i=1;$i<$count;$i++){
                echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
            }
            ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner jumborton" role="listbox">
            <?php
            $active = 0;
            foreach ($slideshow as $slide_value) {

                if($active==0)
                {
                    ?>
                    <div class="item active">
                        <img src="<?php echo base_url();?><?php echo $slide_value->slideshow_photo?>" alt="resoft" class="slider-image img-responsive">
                    </div>

                    <?php
                }
                else
                {
                    ?>
                    <div class="item">
                        <img src="<?php echo base_url();?><?php echo $slide_value->slideshow_photo?>" alt="resoft" class="slider-image img-responsive">
                    </div>
                    <?php
                }
                $active++;
            }

            ?>

        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<!--Slider ends here-->

<!--Rest of the items-->

<div class="row rest_contents" style="padding-left:172px;">
    <h2 style="color:#3071A9">Our Services</h2>
    <p>If you are importing or exporting, you need a Freight Forwarder that is dedicated to finding the lowest freight cost, the fastest transit time, and the most reliable carrier available. Because we take the time to learn everything we can about your business, you can trust that we will treat your shipments like they were our own. </p>
</div>


<div class="row rest_contents">
    <?php
    $count =1;
    foreach($services as $value2) {
        if ($count%2 == 0)
            $side = 'slideanimleft';
        if ( $count%2 == 1)
            $side = 'slideanimright';


        ?>
        <div class="col-sm-6 upper_row <?php echo $side?>">
            <div class="upper_row_content">
                <img src="<?php echo base_url()?><?php echo $value2->services_photo?>" class="img-responsive" style="height: 40vh; width:100%">

                <h3><?php echo $value2->services_name?></h3>

                <p><?php echo $value2->services_details?></p>

            </div>
        </div>


        <?php

        $count=$count+1;
    }
    ?>
</div>
</body>
</html>