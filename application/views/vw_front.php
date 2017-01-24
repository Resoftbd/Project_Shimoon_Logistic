<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	foreach($settings as $value1){

	?>
	<title><?php echo $value1->settings_title ?></title>
	<link rel="icon" href="<?php echo base_url(); ?><?php echo $value1->settings_icon;?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/css/bootstrap.min.js"></script>
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR-API-KEY"></script>
	<script type="text/javascript" src="javascripts/jquery.googlemap.js"></script>
	<style>
		body {
			margin: 0px;
			padding: 0px;
			width: 100%;
			background: #eee;
			overflow-x: hidden;
			font-family:Montserrat;
		}



		.slide {
			margin-top: 121px;
			width: 100%;
		}

		.slider-image {
			height: 69vh !important;
			width: 100vw !important;
		}

		h1 {
			color margin: 30px;
		}

		.slider-div {
			padding: 0px;
			margin-left: 0px;
			margin-right: 0px;
			width: 100%;
		}

		.glyphicon-circle-arrow-right, .glyphicon-circle-arrow-left {
			margin-top: 35vh;
		}


		.navbar {
			background: rgba(245, 245, 245, 0.95);
		}

		.nav_dash{
			background:#3071A9;
		}
		.navbar-nav {
			padding-left: 28vw;
			width: 100vw;
			margin-left: 0px;
			border-top: 1px solid #eee;
			background: -webkit-linear-gradient(#fff, #eee); /* For Safari 5.1 to 6.0 */
			background: -o-linear-gradient(#fff, #eee); /* For Opera 11.1 to 12.0 */
			background: -moz-linear-gradient(#fff, #eee); /* For Firefox 3.6 to 15 */
			background: linear-gradient(#fff, #eee); /* Standard syntax */
			box-shadow: 1px 1px 1px #000;
			height:46px;
		}
		
		#myNavbar{overflow-x:hidden;}
		
		.navbar-nav a {
			color: #223;
			padding-bottom: 13px;
		}

		.navbar-nav a:hover {
			color: #001;
			padding-bottom: 10px;
			border-bottom: 3px solid #1B6FB8;
		}
		
		.page_details{margin:0px; padding: auto 0px;width:450px!important; float:left;}
		.page_details p{width:440px!important;}
		.image_details{margin:0px; padding: auto 0px;padding-left:-100px;width:400px!important; float:right; margin-top:50px;}
		.demo-image{height:35vh; width:389px; padding:3vh 1vh; float:left; transition: width 0.5s;}
		.demo-image:hover{height:35vh; width:399px;}

		footer {
			padding: 20px;
			text-align: center;
			border-top: 2px solid #1B6FB8;
		}

		footer a {
			color: #1B6FB8;
		}

		.row {
			padding: 1px 25px;
		}

		.rest_contents {
			padding: 50px 150px;
		}
		
		.rest_content {
			padding: 50px 180px;
		}

		.upper_row {
			padding: 5px 25px;
		}

		.upper_row_content {
			border-top: 5px solid #1B6FB8;
			background: #f2f2f2;
			height: 480px;
			box-shadow: 1px 1px 2px #557;
			overflow:hidden;
			font-size:12px;
			transition: background 0.3s, box-shadow 0.2s;
		}

		.upper_row_content:hover {
			background: #f9f9f9;
			box-shadow: 3px 3px 4px #557;
		}

		.upper_row_content h3 {
			color: #3071A9;
		}

		.upper_row_content h3, .upper_row_content p {
			padding: 2px 13px;
		}



		.slideanim {
			visibility: hidden;
		}

		.slides {
			animation-name: slides;
			-webkit-animation-name: slides;
			animation-duration: 2s;
			-webkit-animation-duration: 2s;
			visibility: visible;
		}


		@keyframes slides {
			0% {
				opacity: 0;
				-webkit-transform: translateY(70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateY(0%);
			}
		}

		@-webkit-keyframes slides {
			0% {
				opacity: 0;
				-webkit-transform: translateY(70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateY(0%);
			}
		}

		.slideanimleft {
			visibility: hidden;
		}

		.slideleft {
			animation-name: slideleft;
			-webkit-animation-name: slideleft;
			animation-duration: 1.5s;
			-webkit-animation-duration: 1.5s;
			visibility: visible;
		}

		@keyframes slideleft {
			0% {
				opacity: 0;
				-webkit-transform: translateX(70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateX(0%);
			}
		}

		@-webkit-keyframes slideleft {
			0% {
				opacity: 0;
				-webkit-transform: translateX(70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateX(0%);
			}
		}

		.slideanimright {
			visibility: hidden;
		}

		.slideright {
			animation-name: slideright;
			-webkit-animation-name: slideright;
			animation-duration: 1.5s;
			-webkit-animation-duration: 1.5s;
			visibility: visible;
		}
        .icon-bar{
            background-color: #00BED5;
        }

		@keyframes slideright {
			0% {
				opacity: 0;
				-webkit-transform: translateX(-70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateX(0%);
			}
		}

		@-webkit-keyframes slideright {
			0% {
				opacity: 0;
				-webkit-transform: translateX(-70%);
			}
			100% {
				opacity: 1;
				-webkit-transform: translateX(0%);
			}
		}
		
		
		.dropdown-content{display:none; width:110px;  transition: width 1s;}
		
		.dropdown:hover .dropdown-content {
		    	display: block;
		    	background: -webkit-linear-gradient(#fff, #eee); /* For Safari 5.1 to 6.0 */
			background: -o-linear-gradient(#fff, #eee); /* For Opera 11.1 to 12.0 */
			background: -moz-linear-gradient(#fff, #eee); /* For Firefox 3.6 to 15 */
			background: linear-gradient(#fff, #eee); /* Standard syntax */
		    	width:125px;
		}
		
		.dropdown-content li{
		    	list-style:none;
		    	margin-left:-30px;
			
		}
		
		.dropdown-content li a:hover{
		    	color: #338!important;
			padding-bottom: 10px;
			border-bottom:0px!important;
			text-decoration: none;
		}
		
		
		
		@media screen and (max-width: 1024px) {

			.navbar-nav {
				padding-left: 13vw;
			}
			.page_details{margin:0px; padding: auto 0px;width:395px!important; float:left;}
			.page_details p{width:390px!important;}
			.image_details{margin:0px; padding: auto 0px;padding-left:-100px;width:350px!important; float:right; margin-top:50px;}
			.demo-image{height:35vh; width:390px; padding:2vh 1vh; float:left;}
			
			.rest_content {
				padding: 50px 122px;
			}
			.rest_contents {
				padding: 50px 120px;
				
			}
			.upper_row {
			padding: 5px 20px;
			font-size:11px;
			}

		}
		@media screen and (max-width: 820px) {
			.slide{margin-top:150px;}
			
			.navbar-nav {
				padding-left: 8vw;
			}
			.page_details{margin:0px; padding: auto 0px;width:295px!important; float:left;}
			.page_details p{width:290px!important;}
			.image_details{margin:0px; padding: auto 0px;padding-left:-100px;width:300px!important; float:right; margin-top:50px;}
			.demo-image{height:35vh; width:290px; padding:2vh 1vh; float:left;}
			
			.rest_content {
				padding: 50px 100px;
			}
			.rest_contents {
				padding: 45px 90px;
				
			}
			.upper_row {
				padding: 4px 8px;
			}
			.upper_row_content {
			margin-top:10px;
			border-top: 2px solid #1B6FB8;
			height: 520px;
			overflow: hidden;
		}
		
		.navbar-nav {height:240px!important; overflow:scroll;}
			

		}
		@media screen and (max-width: 450px) {
			.slide{margin-top:190px;}
			.rest_contents {
			padding: 40px 50px;
		}
		.upper_row_content {
			margin-top:10px;
			border-top: 2px solid #1B6FB8;
			height: 550px;
			overflow: hidden;
		}
		.navbar-nav {height:250px!important; overflow:scroll;}
		.image_details{margin:0px; padding: auto 0px;padding-left:-70px;width:300px!important; float:right; margin-top:50px;}
		.demo-image{height:40vh; width:260px; padding:3vh 1vh; float:right;}
		}
		
		}
	</style>
</head>
<body>


<!-- NAVBAR STARTS HERE-->


<nav class="navbar navbar-fixed-top">
	<div class="nav_head">
		<div class="row">
			<div class="col-sm-8">
				<a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?><?php echo $value1->settings_logo;?>" height="70"><b style="color:#00BED5; font-size:17px;"></a>Shimoon Logistic</b>
			</div>
			<div class="col-sm-4">
				<div class="search" style="float:right;">
					<br>

					<div class="input-group">
						<b><span class="glyphicon glyphicon-phone"></span> <?php echo $value1->settings_phone ?></b><br>
						<b><span class="glyphicon glyphicon-envelope"></span> <?php echo $value1->settings_email ?></b>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="containers">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
                		<li><a href="<?php echo base_url();?>"><b>Home</b></a></li>
				<li class="dropdown" style="width:115px; padding-left:15px">
					<a href="#"><b>About Us</b></a>
				 	   	<ul  class="dropdown-content">
							    <li style="padding:4px 6px;"><a href="<?php echo base_url();?>story"><b>Our Story</b></a></li>
							    <li style="padding:4px 6px;"><a href="<?php echo base_url();?>team"><b>Our Team</b></a></li>
							    <li style="padding:4px 6px;"><a href="<?php echo base_url();?>technology"><b>Technology</b></a></li>
							  </ul>                                                                                         	        
				</li>
				<li><a href="<?php echo base_url();?>services"><b>Services</b></a></li>
				<li><a href="<?php echo base_url();?>customers"><b>Our Customers</b></a></li>
				<li class="dropdown" style="width:205px; padding-left:15px">
                    <a href="#"><b>Supply Chain Solution</b></a>
                    <ul  class="dropdown-content" style="width:200px; ">
                        <?php
                        foreach($supply as $value) {
                            ?>
                            <li style="padding:4px 6px;"><a href="<?php echo base_url(); ?>supply"><b><?php echo $value->supply_name;?></b></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>

				<li><a href="<?php echo base_url();?>contact""><b>Contact Us</b></a></li>
			</ul>
		</div>
	</div>
</nav>


<!-- NAVBAR ENDS HERE-->

<!--Dynamic Main contents starts here-->
<?php
    if (isset($vw_home_front)) {

        $this->load->view($vw_home_front);
    }
    else if (isset($vw_customer_front)) {

        $this->load->view($vw_customer_front);
    }
	else if (isset($vw_services_front)) {

		$this->load->view($vw_services_front);
	}
	else if (isset($vw_supply_front)) {

		$this->load->view($vw_supply_front);
	}
	else if (isset($vw_contact)) {

		$this->load->view($vw_contact);
	}
    else if (isset($vw_pages_front)) {

        $this->load->view($vw_pages_front);
    }
    else
    {
        $this->load->view($vw_home_front);
    }
?>

<!-- Dynamic Main contents ends here-->
<footer>
	<a href=""><b>Desclaimer</b></a> | <a href=""><b>Policy</b></a> |<a href="<?php echo base_url();?>story"><b>About Us</b></a> | <a href=""><b>Career</b></a>
	| <a href="<?php echo base_url();?>contact"><b>Contact us</b></a>
	</br></br><?php echo $value1->settings_address ?>
	</br>&copy <b>SHIMOON LOGISTICS</b>
	</br>Developed By <a href="http://resoftbd.com/"><b>RESOFT</b></a>
</footer>



		
		<script>
		$(document).ready(function(){
		
									  
					  $(window).scroll(function() {
					  $(".slideanim").each(function(){
						var pos = $(this).offset().top;

						var winTop = $(window).scrollTop();
						if (pos < winTop + 570) {
						  $(this).addClass("slides");
						}
					  });
					});
				  $(window).scroll(function() {
				  $(".slideanimleft").each(function(){
					var pos = $(this).offset().top;

					var winTop = $(window).scrollTop();
					if (pos < winTop + 570) {
					  $(this).addClass("slideleft");
					}
				  });
				});

				  $(window).scroll(function() {
				  $(".slideanimright").each(function(){
					var pos = $(this).offset().top;

					var winTop = $(window).scrollTop();
					if (pos < winTop + 570) {
					  $(this).addClass("slideright");
					}
				  });
				});

				})

		</script>

<?php
}
?>
							
</body>