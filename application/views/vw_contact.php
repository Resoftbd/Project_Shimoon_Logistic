<!DOCTYPE html>
<html lang="en">

										
										
		<h1 style="height:8vh;"></h1>
									
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
					<p>Find Out How We Can Help You Today!For any kind of queries just send us a message or call.Also you can meet us in office just in the center of the Chittagong.</p>
		
		</div>

		</div>


		<div class="">
			<div id="map" style="width: 74vw; height: 70vh; margin:3vh 13vw;"></div>


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

					  <script>
						  function initMap() {
							  var uluru = {lat: 22.3338549, lng: 91.8122900};
							  var map = new google.maps.Map(document.getElementById('map'), {
								  zoom: 19,
								  center: uluru
							  });
							  var marker = new google.maps.Marker({
								  position: uluru,
								  map: map
							  });
						  }
					  </script>
					  <script async defer
							  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT9JEXvz-8AlAxV72y1n9wGtqS3WsOivk&callback=initMap">
					  </script>
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