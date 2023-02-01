<?php 
$bdd=new PDO('mysql:host=localhost;dbname=event;charset=utf8','root','');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CDD INSCRIPTION</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="booking/css/booking.css">
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->
		<script src="booking/js/booking.js"></script>
		<script>
			$(document).ready(function(){
			jQuery('#camera_wrap').camera({
				loader: false,
				pagination: false ,
				minHeight: '444',
				thumbnails: false,
				height: '48.375%',
				caption: true,
				navigation: true,
				fx: 'mosaic'
			});
			/*carousel*/
			var owl=$("#owl");
				owl.owlCarousel({
				items : 2, //10 items above 1000px browser width
				itemsDesktop : [995,2], //5 items between 1000px and 901px
				itemsDesktopSmall : [767, 2], // betweem 900px and 601px
				itemsTablet: [700, 2], //2 items between 600 and 0
				itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
				navigation : true,
				pagination : false
				});
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		
<link rel="stylesheet" href="//cdn.tutorialjinni.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.tutorialjinni.com/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />

		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->
	</head>
	<body class="page1" id="top" >
<!--==============================header=================================-->
		<header >
			<div class="container_12" >
				<div class="grid_12" >
					<div class="menu_block" >
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
							<li class="current"><a href="index.php">INSCRIPTION</a></li>
								<li><a href="hotel.php">HOTELS</a></li>
								<li><a href="car.php">DEPLACEMENTS</a></li>
								<li><a href="event.php">SOIREE</a></li>
								<li><a href="schedule.php">PROGRAMMES</a></li>
								
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12">
					<h1>
						<a href="index.php">
							<img src="images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
		<div class="slider_wrapper"  >
			<div id="camera_wrap" class="" >
				<div data-src="images/buja1.jpg">
					<div class="caption fadeIn">
						<h2>BURUNDI</h2>
						
							<a href="#">BIENVENU</a>
					</div>
				</div>
				<div data-src="images/buja4.webp">
					<div class="caption fadeIn">
						<h2>BUJUMBURA</h2>
						
							<a href="#">BIENVENU</a>
					</div>
				</div>
				<div data-src="images/buja3.jpg">
					<div class="caption fadeIn">
						<h2>GITEGA</h2>
						
							<a href="#">BIENVENU</a>
						
					</div>
				</div>
			</div>
		</div>
<!--==============================Content=================================-->
		<div class="content">
			<div class="ic">
				More Website Template @ bujait.com - February 10, 2014!
			</div>
			<div class="container_12">
				<div class="grid_4">
					<div class="banner"><img style ="height:300px;" src="images/buja7.jpg" alt="">
							<div class="label">
							<div class="title">Bujumbura</div>
							
							<a href="#">BIENVENU</a>
						
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/buja9.jpg" alt="">
						<div class="label">

						<div class="title">Hotels</div>
							
							<a href="#">BIENVENU</a>
							
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
					<img style ="height:300px;" src="images/buja6.jpg" alt="">
						<div class="label">
						<div class="title">BURUNDI</div>
							
							<a href="#">BIENVENU</a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				
				<div class="grid_6">
					<h3>Formulaire de réservation</h3>
					<form id="bookingForm" method="POST" enctype="multipart/form-data">
						<div class="fl1">
							<div class="tmInput">
								<input name="name"  placeHolder="Nom" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input name="mail" placeHolder="Email" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="fl1">
							<div class="tmInput">
								<input name="surname" placeHolder="Prénom" type="text" data-constraints="@NotEmpty @Required @Email">
							</div>
							<div class="tmInput mr0">
								<input type="tel" name="phone" placeHolder="Téléphone"  data-constraints="@NotEmpty @Required">
							</div>
						</div>
					<div class="content">
                
                <div class="input-box">
                   <br>
                    <input type="text" name="passport" placeholder="Numero passport" required>
                </div>
               
                
                <div class="input-box">
                    <br>
                    <input type="text" name="rotary" placeholder="Votre rotary" required>
                </div>
				<div class="input-box">
					<br>
                    <label for="photopassport">Votre Passport</label>
                    <input type="file" name="image" required>
                </div>
				<div class="input-box">
					<br>
                    <label for="pays">Choisir votre pays</label>
                    <br>
           			 <select class="selectpicker countrypicker" data-flag="true" name="pays"></select>
                </div>
				 
                <div class="input-box">
                    <input type="hidden" name="statut" required>
                </div>
                <div class="input-box">
                    <input type="hidden" name="password" required>
                </div>
               
           
            <div class="input-box">
			<br>
			<br>
                <input type="submit" name="submit" value="Inscription" style="background-color:#DF4341;color:#fff;">
            </div>
			 </div>
						
					</form>
				</div>
				<div class="grid_5 prefix_1">
					<h3>Welcome</h3>
					<img src="images/buja.jpg" alt="" class="img_inner fleft">
					<div class="extra_wrapper">
						<p>Lorem ipsum dolor sit ere amet, consectetur ipiscin.</p>
						In mollis erat mattis neque facilisis, sit ametiol
					</div>
					<div class="clear cl1"></div>
					<p>Find the detailed description of this <span class="col1">
						<a href="http://blog.templatemonster.com/free-website-templates/" rel="dofollow">freebie</a></span> at TemplateMonster blog.</p>
					<p><span class="col1"><a href="http://www.templatemonster.com/category/travel-website-templates/" rel="nofollow">Travel Website Templates</a></span> category offers you a variety of designs that are perfect for travel sphere of business.</p>
					Proin pharetra luctus diam, a scelerisque eros convallis
					
				</div>
				<div class="grid_12">
					<h3 class="head1">Programmes</h3>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01">10<span>Fevrier</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Inscriptions</a></div>
							Proin pharetra luctus diam, any scelerisque eros convallisumsan. Maecenas vehicula egestas
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01">10<span>Mars</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Fin des inscription </a></div>
							Any scelerisque eros vallisumsan. Maecenas vehicula egestas natis. Duis massa elit, auctor non
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01">5<span>Avril</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Ouverture CDD</a></div>
							Ros convallisumsan. Maecenas vehicula egestas venenatis. Duis massa elit, auctor non
						</div>
					</div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
<footer style="background:#002141">
			<div class="container_12">
				<div class="grid_12">
					<div class="socials">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						Your Trip (c) 2023 | <a href="#">Privacy Policy</a> | Website Template Designed by <a href="http://www.templatemonster.com/" rel="nofollow">Buja IT</a>
					</div>
				</div>
			</div>
		</footer>
		<script>
			$(function (){
				$('#bookingForm').bookingForm({
					ownerEmail: '#'
				});
			})
			$(function() {
				$('#bookingForm input, #bookingForm textarea').placeholder();
			});
		</script>
	</body>

	
<script src="//cdn.tutorialjinni.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdn.tutorialjinni.com/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
</body>
</html>
<?php 
if(isset($_POST["submit"])){
    $target="image/".basename($_FILES['image']['name']);
    $nom_utilisateur=$_POST["name"];
    $prenom_utilisateur=$_POST["surname"];
    $email_utilisateur=$_POST["mail"];
    $telephone_utilisateur=$_POST["phone"];
    $passport_utilisateur=$_POST["passport"];
    $photo_passport=$_FILES["image"]["name"];
	$rotary_utilisateur=$_POST["rotary"];
    $pays_utilisateur=$_POST["pays"];  
    $statut=$_POST["statut"];
    $password=$_POST["password"];

    $insert=$bdd->prepare("INSERT INTO utilisateurs(nom,prenom,email,numero_telephone,passport,photo,pays,rotary,statut,mot_de_passe) VALUES(?,?,?,?,?,?,?,?,?,?)");

    if($insert->execute(array($nom_utilisateur,$prenom_utilisateur,$email_utilisateur,$telephone_utilisateur,$passport_utilisateur,$photo_passport,$pays_utilisateur,$rotary_utilisateur,$statut,$password)))
    {
        move_uploaded_file($_FILES["image"]["tmp_name"],$target);
        echo "<script>alert('Votre Inscription a été enregistré avec succès !')</script>";
    }else{
        echo "<script>alert('Echec lors de l'enregistrement !')</script>";
    }
    
}

?>

