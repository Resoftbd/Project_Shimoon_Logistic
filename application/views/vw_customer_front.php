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
			<h2 style="color:#3071A9">Our Valueable customers</h2>
					<p>Our commitment to sustainability helps us reduce waste and share the benefits with our customers. It permeates the way we do business, driving us to innovate and be creative in everything from warehousing operations to transportation, from solution design to procurement policy. Our commitment to sustainability helps us reduce waste and share the benefits with our customers. It permeates the way we do business, driving us to innovate and be creative in everything from warehousing operations to transportation, from solution design to procurement policy.</p>
		</div>

									
		<div class="row rest_contents">
			<?php
				$count =0;
				foreach($customer as $value2) {
					if ($count == 0 || $count%3 == 0)
						$side = 'slideanimleft';
					if ($count == 1 || $count%3 == 1)
						$side = 'slideanim';
					if ($count == 2 || $count%3 == 2)
						$side = 'slideanimright';


					?>
					<div class="col-sm-4 upper_row <?php echo $side?>">
						<div class="upper_row_content">
							<img src="<?php echo base_url()?><?php echo $value2->customer_photo?>" class="img-responsive brand-logo">

							<h3><?php echo $value2->customer_name?></h3>

							<p><?php echo $value2->customer_details?></p>

						</div>
					</div>


					<?php

                    $count=$count+1;
				}
			?>
		</div>
</body>
</html>