<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	if($inbox_count!=0){
		 $read = count($inbox_count);
	    $unread = $inbox_total-$read;
	}
	foreach ($settings as  $value1) {

	
	
	?>
  <title><?php echo $value1->settings_copyright?> Admin</title>
  <link rel="icon" href="<?php echo base_url(); ?><?php echo $value1->settings_icon;?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/css/bootstrap.min.js"></script>
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto:700,500" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
</head>

<body>
	<div class="header">
	<div class="row">
	 <!-- Site title -->
	<div class="col-xs-6">
	<h2 style="margin-left:10px; margin-top:8px"><a href="<?php echo base_url(); ?>"><?php echo $value1->settings_title?></a></h2></div>
	
	 <!-- Profile -->
	 <?php
	 foreach ($profile as $value2) {
	 ?>
	<div class="col-xs-6">
	<div class="col-xs-11">
	<li class="dropdown pull-right">
								<a class="dropdown-toggle pro" data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile
								<span class="caret"></span></a>
								<ul class="dropdown-menu sub">
								  <a href="<?php echo base_url()?>Admin/edit_profile"><li><i class="fa fa-user" aria-hidden="true"></i>Edit Profile</li></a>

								  <a href="<?php echo base_url()?>Admin/add_admin"><li><i class="fa fa-user-plus" aria-hidden="true"></i>Add or remove</li></a>

								  <a href="<?php echo base_url()?>Admin_logout"><li><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</li></a>
								</ul>
							  </li></div>
							  
							   <!-- Settings -->

							  <div class="col-xs-1">
								<li class="dropdown pull-right">
								<a class="dropdown-toggle pro" data-toggle="dropdown" href="#"><i class="fa fa-gear" aria-hidden="true"></i> </a>
								<ul class="dropdown-menu sub sub-long">
					   <?php
						echo form_open_multipart('Admin/settings_update','class="form-horizontal"');
					
												
						echo'
					   			  <input type= "hidden" name="settings_id" value="'.$value1->settings_id.'">
								  
								  <li><h3>Set site title</h3>
									<input class="form-control" id="site-title" name="settings_title" value="'.$value1->settings_title.'"  placeholder="site-title"  type="text"></li>

									<li><h3>Set title-bar logo</h3>
									<input name="settings_icon" placeholder="Add a photo" type="file"></li>
									
									<li><h3>Set site logo</h3>
									<input name="settings_logo" placeholder="Add a photo" type="file"></li>
									<li><h3>Set Facebook</h3>
									<input class="form-control" name="settings_facebook" value="'.$value1->settings_facebook.'" placeholder="Facebook" type="text" style="margin-top:5px;">

									<li><h3>Set address</h3>
									<input class="form-control" name="settings_address" value="'.$value1->settings_address.'" placeholder="Address" type="text">
									<input class="form-control" name="settings_phone" value="'.$value1->settings_phone.'" placeholder="Mobile number" type="text" style="margin-top:5px;">
									<input class="form-control" name="settings_email" value="'.$value1->settings_email.'" placeholder="Email address" type="text" style="margin-top:5px;">
								    <input class="form-control" name="settings_facebook" value="'.$value1->settings_facebook.'" placeholder="Facebook" type="text" style="margin-top:5px;">

									<li><button class="btn btn-primary" type="submit" style="width:100%; margin-top:15px;">Done</button></li>
								
								</ul>
							    </li>
								</div>';
						

						echo form_close();
					    } 
					 ?>
	</div>
							  
	</div>
	</div>
	
	 <!-- Side bar -->
	 <?php
		
			echo'
		<div class="row container-fluid">
				<div class="col-xs-2 menu">
				<div class="row menu-head">
				<div class="col-sm-4">';
				?>
			<img src="<?php echo base_url()?><?php echo $value2->admin_photo?>" class="img-responsive" style="height:52px;width:59px; border-radius:30px; margin-top:7px; margin-left:10px;"></img>
				</div>
				<div class="col-sm-8">
			<?php
					echo'<h5>'.$value2->admin_name.'</h5>';
				}
				
			?>
				
				<h6><i class="fa fa-circle" aria-hidden="true" style="color:#2b2; font-size:12px; padding-top:-12px;"> </i> Online</h6> 
				</div>
				</div>
				<ul>
				<a href="<?php echo base_url();?>Admin"><li><h5><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h5></li></a>
				<a href="<?php echo base_url();?>Admin/details"><li><h5><i class="fa fa-clone" aria-hidden="true"></i> Details</h5></li></a>
				<a href="<?php echo base_url();?>Admin/portfolio"><li><h5><i class="fa fa-file-code-o" aria-hidden="true"></i> Portfolio</h5></li></a>
				<a href="<?php echo base_url();?>Admin/reviews"><li><h5><i class="fa fa-comments-o" aria-hidden="true"></i> Reviews</h5></li></a>
				<a href="<?php echo base_url();?>Admin/team"><li><h5><i class="fa fa-users" aria-hidden="true"></i> Team</h5></li></a>
	
				<a href="<?php echo base_url();?>Admin/inbox"><li><h5><i class="fa fa-envelope" aria-hidden="true"></i> Inbox <span class="badge"><?php echo $unread;?></span></h5></li></a>
				<a href="<?php echo base_url();?>Admin/add_links"><li><h5><i class="fa fa-link" aria-hidden="true"></i> Add links</h5></li></a>
				</ul>
				</div>
				
				
	<!--dynamic page call starts here-->
	<?php
				if(isset($vw_dashboard))
				{

				$this->load->view($vw_dashboard);

				}
				
				else if(isset($vw_inbox))
				{
				
				$this->load->view($vw_inbox);
				}

				else if(isset($vw_details))
				{
				
				$this->load->view($vw_details);
				}

				else if(isset($vw_portfolio))
				{
				
				$this->load->view($vw_portfolio);
				}

				else if(isset($vw_team))
				{
				
				$this->load->view($vw_team);
				}
				
				else if(isset($vw_reviews))
				{
				
				$this->load->view($vw_reviews);
				}

				else if(isset($vw_add_admin))
				{
				
				$this->load->view($vw_add_admin);
				}

				else if(isset($vw_edit_profile))
				{
				
				$this->load->view($vw_edit_profile);
				}

				else if(isset($vw_add_links))
				{
				
				$this->load->view($vw_add_links);
				}
				
				else
				{
				$this->load->view($vw_dashboard);
				}
			?>
</body>
</html>