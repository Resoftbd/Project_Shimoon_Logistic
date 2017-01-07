<!DOCTYPE html>
<html lang="en">
	
				 <!-- Main content-->
			
				<div class="col-xs-10 content">
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
				<div class="cat">
				<h3>Update Details</h3>
			  <div class="row">
			  <div class="col-sm-12" style="padding-right:25px;">
			 
			<?php
				 echo form_open_multipart('Admin/update_about');
				 foreach ($about as $key => $value) {
			
			?>
			<input type ="hidden" value = "<?php echo $value->about_id;?>" name="about_id">
			  	  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Image 1:</h4>
				</div>
				<div class="col-sm-6 form-group">
					<input id="a" name="about_photo_1" placeholder="Add a photo" type="file">
			    </div>
					  <div class="col-sm-3" style="padding:5px;">
						  <img src="<?php echo base_url()?><?php echo $value->about_photo_1?>" class="img-responsive">
					  </div>
			  </div>
				  <div class="row">
					  <div class="col-sm-3 form-group">
						  <h4>Image 2:</h4>
					  </div>
					  <div class="col-sm-6 form-group">
						  <input id="a" name="about_photo_2" placeholder="Add a photo" type="file">
					  </div>
					  <div class="col-sm-3" style=" padding:5px;">
						  <img src="<?php echo base_url()?><?php echo $value->about_photo_2?>" class="img-responsive">
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-sm-3 form-group">
						  <h4>Image 3:</h4>
					  </div>
					  <div class="col-sm-6 form-group">
						  <input id="a" name="about_photo_3" placeholder="Add a photo" type="file">
					  </div>
					  <div class="col-sm-3" style="padding:5px;">
						  <img src="<?php echo base_url()?><?php echo $value->about_photo_3?>" class="img-responsive">
					  </div>
				  </div>
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>About</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <textarea  class="form-control" id="name" name="about_details" placeholder="content" type="text"  rows="6"><?php echo $value->about_details;?> </textarea><br>
				</div>
			  </div> 

			  
			<!--  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Tags</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="tags" name="news_tags" placeholder="tags" type="text" required>
				</div>
			  </div> 
			 --> 
		 
			  
			  
		
			  
			   
			    	<div class="row">
			  <button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px;"> Update </button>
			  </div>
		
			  </div>

			 </div>
			  <?php
			}
			?>
</body>
</html>