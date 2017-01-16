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
				<h3>Add a home</h3>
				<?php
				foreach($home as $value){


				echo form_open_multipart('Admin/update_home');
				?>
					<div class="row">
						<div class="col-sm-4" style="padding-right:25px;">
							<div class="row">
								<div class="col-sm-3 form-group">
									<h4>Title</h4>
								</div>
								<input name="home_id" placeholder="Name" type="hidden" required value="<?php echo $value->home_id ?>">

								<div class="col-sm-9 form-group">
									<input class="form-control" id="name" name="home_name" placeholder="Title" type="text" required value="<?php echo $value->home_name ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<h4>Details</h4>
								</div>

								<div class="col-sm-9 form-group">
									<textarea class="form-control" id="editable" name="home_details" placeholder="Details" type="text" required><?php echo $value->home_details ?></textarea>
								</div>
							</div>


							<div class="row">
								<div class="col-sm-3 form-group">
									<h4>Change photo</h4>
								</div>
								<div class="col-sm-9 form-group">
									<div class="col-sm-5 form-group">

										<img src="<?php echo base_url() ?><?php echo $value->home_photo ?>" class="img-responsive">

									</div>
									<input id="a" name="home_photo" placeholder="Add a photo" type="file">
								</div>
							</div>

							<div class="row">
								<button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px;">Update
								</button>
							</div>

			  </div>


						<!-- Showing all news titles-->

					</div>


					<?php
					echo form_close();
				}
				?>

				</div>


				</div>


				 <!--MODAL-->

		 	<input type ="hidden" value = "'.$value2->home_id.'" name="home_id">
			<div id="home_'.$value2->home_id.'" class="modal fade " role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>

									<h4 class="modal-title black1">'.$value2->home_name.'</h4>
								  </div>
								  <div class="modal-body">

									<div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Name</h4>
				</div>';



				echo'<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="home_name" placeholder="Name" type="text" required value="'.$value2->home_name.'">
				</div>
			  </div>

			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Details</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <textarea  class="form-control" id="editable" name="home_details" placeholder="Designation" type="text"  value="">'.$value2->home_details.'</textarea>
				</div>
			  </div>
			 ';

			 /* <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Tags</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="tags" name="news_tags" placeholder="tags" type="text" required>
				</div>
			  </div> */

			echo'
			  <div class="row">
				<div class="col-sm-5 form-group">';
				?>
			  <img src="<?php echo base_url()?><?php echo $value2->home_photo?>" class="img-responsive">

				</div>
			    </div>

			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Change photo</h4>
				</div>
				<div class="col-sm-9 form-group">
					<input id="a" name="home_photo"  type="file">
			    </div>
			  </div>
			  <button type="submit" class="btn btn-success category-h" title="add category">Update</button>



								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>

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
</body>
</html>