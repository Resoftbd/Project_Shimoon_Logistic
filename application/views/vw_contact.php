<!DOCTYPE html>
<html lang="en">

										
										
										<!-- Slider starts here-->
										

		<div class="container-fluid slider-div">
		  <div id="myCarousel" class="carousel slide jumborton" data-ride="carousel" data-interval="4500">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"> I </li>
			  <li data-target="#myCarousel" data-slide-to="1"> II </li>
			  <li data-target="#myCarousel" data-slide-to="2"> III </li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner jumborton" role="listbox">
			  <div class="item active">
				<img src="img/log1.jpg" alt="Mashrafee" width="1367px" height="400px" class="img-responsive slider-image">
			  </div>

			  <div class="item">
				<img src="img/log2.jpg" alt="Mashrafee" width="1367px" height="400px" class="img-responsive slider-image">
			  </div>
			
			  <div class="item">
				<img src="img/log3.jpg" alt="Mashrafee" width="1367px" height="400px" class="img-responsive slider-image">
			  </div>

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
									
		<div class="row rest_contents" style="padding-left:180px;">
		<div>
			<?php
			if($msg!='')
			{
				?>
				<div class="alert alert-<?php echo $msg_type;?> alert-dismissable">
					<button type="button" class="close" data-dismiss="alert"
							aria-hidden="true">
						&times;
					</button>
					<?php echo $msg;?>
				</div>
				<?php
			}
			?>
			<h2 style="color:#3071A9">Contact Us</h2><br>
					<p>Our commitment to sustainability helps us reduce waste and share the benefits with our customers. It permeates the way we do business, driving us to innovate and be creative in everything from warehousing operations to transportation, from solution design to procurement policy. Our commitment to sustainability helps us reduce waste and share the benefits with our customers. It permeates the way we do business, driving us to innovate and be creative in everything from warehousing operations to transportation, from solution design to procurement policy.</p>
		
		</div>

		</div>
		 <!-- Main content-->
		<?php
		echo form_open(base_url().'Front/send_message','class="form-horizontal"');
		foreach($settings as $value){
		?>
				<div class="rest_contents">
				<div class="cat">
			  <div class="row">
			  <div class="col-sm-11">
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Name:</h4>
				</div>
				<div class="col-sm-8 form-group">
				  <input class="form-control" id="name" name="inbox_name" placeholder="Name" type="text" required>
				</div>
			  </div> 
			  
			  <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Email:</h4>
				</div>
				<div class="col-sm-8 form-group">
				  <input class="form-control" id="password" name="inbox_email" placeholder="Email" type="email" required>
				</div>
			  </div> 
			  
			 <div class="row">
				<div class="col-sm-4 form-group">
				  <h4>Tell Us Something:</h4>
				</div>
				<div class="col-sm-8 form-group">
				  <input class="form-control" id="dsgntn" name="inbox_message" placeholder="Tell Us Something" type="text">
				</div>
			  </div> 
			  <div class="row">
			 <div class="col-sm-3 form-group">
				  <a href="<?php echo $value->settings_facebook?>"><button class="btn btn-primary" type="submit" style="width:100%; margin-top:15px;">Find us in facebook</button>
				</div>
				<div class="col-sm-3 form-group pull-right">
				  <button class="btn btn-info" type="submit" style="width:100%; margin-top:15px;">Submit Your Opinion</button>
				</div>
			  </div>
			  </div>
			  
			  </div>
					<?php
					}
					echo form_close();
					?>
				
				</div>
		</div>
									


							
</body>
</html>