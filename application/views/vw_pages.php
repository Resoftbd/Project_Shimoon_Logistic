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
					<?php
					echo form_open_multipart('Admin/update_pages');
					foreach ($pages as $key => $value) {

					?>
					<h3>Update <?php echo $value->pages_name;?></h3>
			  <div class="row">
			  <div class="col-sm-12" style="padding-right:50px;">
			 
		
			<input type ="hidden" value = "<?php echo $value->pages_name;?>" name="pages_name">
											
			  <div style="margin-top:5px;">
				
				<div class="form-group" style="padding:5px; margin:15px 0px;">
				  <textarea  class="editable" id="name" name="pages_details" placeholder="content" type="text"  rows="6" style=" height:275px;"><?php echo $value->pages_details;?> </textarea><br>
				<br><br>
				</div>
			  </div> 

			  
			  	  <div class="row">
				        <div class="col-xs-4">
							<div class="form-group">
							  <h4>Header Image:</h4>
							</div>
						    <div style="padding:5px; margin:10px 0px;">
							    <img src="<?php echo base_url()?><?php echo $value->pages_photo_1?>" class="img-responsive" style="height:22vh; width:22vw;">
						    </div>
							<div class="form-group" style="padding:5px; margin:10px 0px;">
								<input id="a" name="pages_photo_1" placeholder="Add a photo" type="file">
							</div>
					    </div>
				   
				  
						<div class="col-xs-4">
						  <div class="form-group">
							  <h4>Side Image 1:</h4>
						  </div>
						  <div style="padding:5px; margin:10px 0px;">
							  <img src="<?php echo base_url()?><?php echo $value->pages_photo_2?>" class="img-responsive" style="height:22vh; width:22vw;">
						  </div>
						  <div class="form-group" style="padding:5px; margin:10px 0px;">
							  <input id="a" name="pages_photo_2" placeholder="Add a photo" type="file">
						  </div>
					  </div>
				  
				  
						<div class="col-xs-4">
						  <div class="form-group">
							  <h4>Side Image 2:</h4>
						  </div>
						  <div style="padding:5px; margin:10px 0px;">
							  <img src="<?php echo base_url()?><?php echo $value->pages_photo_3?>" class="img-responsive" style="height:22vh; width:22vw;">
						  </div>
						  <div class="form-group"  style="padding:5px; margin:10px 0px;">
							  <input id="a" name="pages_photo_3" placeholder="Add a photo" type="file">
						  </div>
						</div>


		
			  
			   
			    	<div class="row">
			  <button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px;"> Update </button>
			  </div>
		
			  </div>

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