<!DOCTYPE html>
<html lang="en">
<head>

  <title>Login</title>
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
	<style>
		
		.cntent{margin-top:160px; height:275px!important; overflow-y:hidden; background:#eee; color: #000; }
		.content-next{margin-top:160px; height:325px!important; overflow-y:hidden;}
		.cntent h1{color:#286090;}
		
		.element{margin:15px; padding-top:10px;}
		@media screen and (max-width: 780px) {
			.cntent{padding:10px!important; margin-left:170px!important; margin-right:170px!important; margin-top:160px;}
			.element{margin:15px 10px;}
		}
		@media screen and (max-width: 560px) {
			.cntent{padding:10px!important; margin-left:50px!important; margin-right:50px!important; margin-top:150px;}
		}
		@media screen and (max-width: 480px) {
			.cntent{padding:5px!important; margin-left:16px!important; margin-right:16px!important; margin-top:150px;}
			.element{margin:15px 5px;}
		}
		@media screen and (max-width: 321px) {
			.cntent{padding:4px!important; margin-left:4px!important; margin-right:4px!important; margin-top:140px;}
			.element{margin:15px 0px;}
		}
	</style>
</head>
<body>
	<div class="row">
		<?php
		if(isset($msg)	)
			{
				$class="content-next";
			}
		else {
			$class=" ";
		}
					?>
		<div class="col-md-4">
			
		</div>
			<div class="col-md-4 cntent <?php echo $class;?>">
				<h3>Login</h3>
					<?php
				
			  
						if(isset($msg)	)
						{
							
					?>

						<div class="alert-danger" style="padding:7px;"> <?php echo $msg ?></div>

					<?php	
						}
				    ?>
					<?php
						if(validation_errors())
						{
					?>
						<div class="alert-danger"> <?php echo validation_errors(); ?></div>

					<?php	
						}
				    ?>
					<?php
					echo form_open(base_url().'Admin_login/do_login','class="form-horizontal"');
					?>
						<div class="row element">
						<div class="col-xs-3">
						<h4>Username:</h4>
						</div>
						<div class="col-xs-9">
						<input class="form-control" id="admin_username" name="username" placeholder="Type Username" type="text" required>
						</div>
						</div>
						<div class="row element">
						<div class="col-xs-3">
						<h4>Password:</h4>
						</div>
						<div class="col-xs-9">
						<input class="form-control" id="admin_password" name="password" placeholder="Type Password" type="password" required>
						</div>
						</div>
						<button class="btn btn-primary pull-right" type="submit" style="margin:17px;">Log in</button><br>
					<?php
					echo form_close();
					?>
				<p class="notice"> Forgot password? <a href="admin.html"> Click here. </a>
			</div>
		<div class="col-xs-4">
		
		</div>
	</div>

</body>
</html>