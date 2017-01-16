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
	<style>
		body {
			margin: 0px;
			padding: 0px;
			width: 100%;
			background: #eee;
			overflow-x: hidden;
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
		}

		.navbar-nav a {
			color: #223;
			padding-bottom: 13px;
		}

		.navbar-nav a:hover {
			color: #001;
			padding-bottom: 10px;
			border-bottom: 3px solid #1B6FB8;
		}
		.demo-image{width:98vw; height:35vh; padding:1vh; transition: width 0.4s, padding 0.4s;}
		.demo-image:hover{width:100vw; height:35vh;  padding:0.2vh;}


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

		.upper_row {
			padding: 5px 25px;
		}

		.upper_row_content {
			border-top: 5px solid #1B6FB8;
			background: #f2f2f2;
			height: 425px;
			box-shadow: 1px 1px 2px #557;
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
			padding: 2px 14px;
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
	</style>
</head>
<body>


<!-- NAVBAR STARTS HERE-->


<nav class="navbar navbar-fixed-top">
	<div class="nav_head">
		<div class="row">
			<div class="col-sm-9">
				<a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?><?php echo $value1->settings_logo;?>" height="70"><b style="color:#00BED5; font-size:17px;"></a>Shimoon Logistic</b>
			</div>
			<div class="col-sm-3">
				<div class="search">
					<br>

					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search here" name="srch-term"
							   id="srch-term">

						<div class="input-group-btn">
							<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
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
				<li><a href="<?php echo base_url();?>about"><b>About Us</b></a></li>
				<li><a href="<?php echo base_url();?>customers"><b>Our Customers</b></a></li>
				<li><a href="<?php echo base_url();?>supply"><b>Supply Chain Solution</b></a></li>
				<li><a href="<?php echo base_url();?>freights"><b>Freights</b></a></li>
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
	<a href=""><b>Desclaimer</b></a> | <a href=""><b>Policy</b></a> | <a href="<?php echo base_url();?>about"><b>About Us</b></a> | <a href=""><b>Career</b></a>
	| <a href="<?php echo base_url();?>contact"><b>Contact us</b></a>
	</br></br>Shimoon Logistic , Choumuhuni, Chittagong, Bangladesh
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