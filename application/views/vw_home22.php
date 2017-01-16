<!DOCTYPE html>
<html lang="en">
<script>
function load_block(str) {

if (str.length == 0) {
document.getElementById("block").innerHTML = "";
return;
} else {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("block").innerHTML = xmlhttp.responseText;
}
};
xmlhttp.open("GET", "<?php echo base_url(); ?>" + "Admin/load_block/" + str, true);
xmlhttp.send();
}
}
</script>
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
			  <div class="col-sm-12" style="padding-right:50px;">
			 
			<?php
				 echo form_open_multipart('Admin/update_home');
				 foreach ($home as $key => $value) {
			
			?>
			<input type ="hidden" value = "<?php echo $value->home_id;?>" name="home_id">
											
			  <div style="margin-top:5px;">
			  
				
				<!--Newly added-->
				<div class="row">
					<div class="col-xs-8">
							
							<div class="form-group" style="padding:5px; margin:15px 0px;">
									<textarea  class="editable" id="name" name="about_details" placeholder="content" type="text"  rows="6" style=" height:275px;"><?php echo $value->about_details;?> </textarea><br>
									<br><br>
							</div>
					</div>
					
					<div class="col-xs-4">
							<h4>Select a block</h4>
							<select id ="block" name="news_category_fkey" style="width:100%;margin-top:10px; padding:3px 10px;">
								<option value="" style="display:none">Select Block</option>
									<?php
									foreach ($category as $value) {
										echo '<option value="'.$value->category_id.'" >'.$value->category_name.'</option>';
									}
											  
									?>		  
								</select>
							
							<br><br>
							<div class="form-group">
							  <h4>Block Image:</h4>
							</div>
						    <div style="padding:5px; margin:10px 0px;">
							    <img src="<?php echo base_url()?><?php echo $value->about_photo_1?>" class="img-responsive" style="height:22vh; width:22vw;">
						    </div>
							<div class="form-group" style="padding:5px; margin:10px 0px;">
								<input id="a" name="about_photo_1" placeholder="Add a photo" type="file">
							</div>
							
							<button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px; width:99%; padding:0.5%;"> Update </button>

					    </div>
						
					</div>
					<div style="width:100vw; height:1px; background:#ccc; margin-bottom:20px"></div>
					<!--Newly added ends-->
					
					
					
				
				
			  </div> 

			  
			  	  <div class="row">
				  <h3 style="padding-left:20px;">Slider Images</h3>
				        <div class="col-xs-4">
							<div class="form-group">
							
							  <h4>Slider Image1:</h4>
							</div>
						    <div style="padding:5px; margin:10px 0px;">
							    <img src="<?php echo base_url()?><?php echo $value->about_photo_1?>" class="img-responsive" style="height:22vh; width:22vw;">
						    </div>
							<div class="form-group" style="padding:5px; margin:10px 0px;">
								<input id="a" name="about_photo_1" placeholder="Add a photo" type="file">
							</div>
					    </div>
				   
				  
						<div class="col-xs-4">
						  <div class="form-group">
							  <h4>Slide Image 2:</h4>
						  </div>
						  <div style="padding:5px; margin:10px 0px;">
							  <img src="<?php echo base_url()?><?php echo $value->about_photo_2?>" class="img-responsive" style="height:22vh; width:22vw;">
						  </div>
						  <div class="form-group" style="padding:5px; margin:10px 0px;">
							  <input id="a" name="about_photo_2" placeholder="Add a photo" type="file">
						  </div>
					  </div>
				  
				  
						<div class="col-xs-4">
						  <div class="form-group">
							  <h4>Slide Image 3:</h4>
						  </div>
						  <div style="padding:5px; margin:10px 0px;">
							  <img src="<?php echo base_url()?><?php echo $value->about_photo_3?>" class="img-responsive" style="height:22vh; width:22vw;">
						  </div>
						  <div class="form-group"  style="padding:5px; margin:10px 0px;">
							  <input id="a" name="about_photo_3" placeholder="Add a photo" type="file">
						  </div>
						</div>
						
						<button class="btn btn-primary pull-right" type="submit" style=" margin:15px 0px;"> Update </button>
				   
		
			  </div>

			 </div></div>
			 </div>
					<script type="text/javascript">
						tinymce.init({
							selector: ".editable",
							theme: "modern",
							plugins: [
								"advlist autolink lists link image charmap print preview hr anchor pagebreak",
								"searchreplace wordcount visualblocks visualchars code fullscreen",
								"insertdatetime media nonbreaking save table contextmenu directionality",
								"emoticons template paste textcolor colorpicker textpattern"
							],
							toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
							toolbar2: "print preview media | forecolor backcolor emoticons | fontsizeselect",
							image_advtab: true,
							templates: [
								{title: 'Test template 1', content: 'Test 1'},
								{title: 'Test template 2', content: 'Test 2'}
							]
						});
						$(".close").click(function(){
							data_dismiss = $(this).attr("data-dismiss");
							$("."+data_dismiss).slideUp("slow");
						});
					</script>
					<script>
						$(".confirm_delete").click(function(){
							element = $(this).attr("data-element");
							var r=confirm("Sure, you want to Delete "+element+"?");
							if (r==true)
							{

								target = $(this).attr("href");
								document.location.href = target;
							}
							else
							{
								return false;
							}
						});
					</script>
			  <?php
			}
			?>
</body>
</html>