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
				<h3>Add a Customer</h3>
				<?php
				 echo form_open_multipart('Admin/add_customer');
			?>
			  <div class="row">
			  <div class="col-sm-8" style="padding-right:25px;">
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Company Name</h4>
				</div>
			
				<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="customer_name" placeholder="Name" type="text" required>
				</div>
			  </div> 
			    <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Details</h4>
				</div>

				<div class="col-sm-9 form-group">
				  <textarea class="form-control" id="name" name="customer_details" placeholder="Designation" type="text" required></textarea>
				</div>
			  </div>



			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Add a photo</h4>
				</div>
				<div class="col-sm-9 form-group">
					<input id="a" name="customer_photo" placeholder="Add a photo" type="file">
			    </div>
			  </div>
			  
			   	<div class="row">
			  <button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px;">Add </button>
			  </div>
			 <?php
		echo form_close();
		?>
			  </div>
			  
			   <!-- Showing all news titles-->
			  <div class="col-sm-4 form-group" style="padding-left:15px; border-left:1px dotted #ccc;">
			  <h3 style="margin-top:-25px; margin-bottom:15px; margin-left:10px;"class="col-sm-11">customer members</h3>
		<?php
		foreach ($customer as $value1) {
			
			$id=$value1->customer_id;
				echo'<div class="row" style="padding:20px 0px 0px ">
					<div class="col-xs-11">
					<a href="#customer_'.$id.'" data-toggle="modal" data-target="#customer_'.$id.'"><h4 class="cont-head">'.$value1->customer_name.'</h4></a>
					</div>
					<div class="col-xs-1">';
					?>
					 <a id="<?php echo $id;?>" style="color:red;"title="delete" onclick="return confirm('Are you sure want to delete this member?');" href="<?php echo base_url()?>Admin/customer_delete/<?php echo $id;?>">  x </a>
					
					</div>
					</div>
		<?php
		}
					
		?>					
						
								
							
									
				</div>
			  </div>
			  
			  
			  <!--MODAL-->
		<?php
		foreach ($customer as $value2)
		 {
		 	 $id = $value2->customer_id;
		
		 	echo form_open_multipart('Admin/update_customer');
		 	echo'
		 	<input type ="hidden" value = "'.$value2->customer_id.'" name="customer_id">
			<div id="customer_'.$value2->customer_id.'" class="modal fade " role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									
									<h4 class="modal-title black1">'.$value2->customer_name.'</h4>
								  </div>
								  <div class="modal-body">
								    
									<div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Name</h4>
				</div>';
			
				 
			
				echo'<div class="col-sm-9 form-group">
				  <input class="form-control" id="name" name="customer_name" placeholder="Name" type="text" required value="'.$value2->customer_name.'">
				</div>
			  </div> 
			  
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Details</h4>
				</div>
				<div class="col-sm-9 form-group">
				  <textarea  class="form-control" id="name" name="customer_details" placeholder="Designation" type="text"  value="">'.$value2->customer_details.'</textarea>
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
			  <img src="<?php echo base_url()?><?php echo $value2->customer_photo?>" class="img-responsive">
				 
				</div>
			    </div>
			  
			  <div class="row">
				<div class="col-sm-3 form-group">
				  <h4>Change photo</h4>
				</div>
				<div class="col-sm-9 form-group">
					<input id="a" name="customer_photo"  type="file">
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
				<?php
				echo form_close();
					}
				
				?>	
		</div>
</body>
</html>