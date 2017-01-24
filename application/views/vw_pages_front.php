<!DOCTYPE html>
<html lang="en">
							<!-- NAVBAR ENDS HERE-->
										
										
										<!-- Slider starts here-->
										
<?php
foreach($pages as $value) {


    ?>
    <div class="container-fluid slider-div">
        <div id="myCarousel" class="carousel slide jumborton" data-ride="carousel" data-interval="4500">


                <div class="item">
                    <img src="<?php echo base_url()?><?php echo $value->pages_photo_1?>" alt="Mashrafee" width="1367px" height="400px"
                         class="img-responsive slider-image">
                </div>

            </div>

        </div>
    </div>


    <!--Slider ends here-->

    <!--Rest of the items-->

        <div class="row rest_content">
	        <div class="page_details">
	            <h2 style="color:#3071A9;" ><?php echo $value->pages_name?></h2>
	
	            <p><?php echo $value->pages_details?></p>
	        </div>
	
	        <div class="image_details">
	            <img src="<?php echo base_url()?><?php echo $value->pages_photo_2?>" class="img-responsive demo-image">
	           
	            <img src="<?php echo base_url()?><?php echo $value->pages_photo_3?>" class="img-responsive demo-image">
	        </div>

    	</div>
    <?php
}
    ?>

</body>
</html>