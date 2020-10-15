<!DOCTYPE html>
<html>
<?php session_start(); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ebayECE";
$sql="";
// checking connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


$sql = "SELECT * FROM vendeur WHERE (login='$_SESSION[id]')";
$requete= mysqli_query($conn,$sql)or die ("Erreur de connection :".mysqli_error($conn));
$data = mysqli_fetch_assoc($requete);

?>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$('.header').height($(window).height());
		});
	</script>
	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
	</script>
	<style>
		body{
			<?php echo 'background-image:url('.$data["backgroundPhoto"].');'; ?>
			background-repeat: no-repeat;
			background-size: cover;
		}
		.parent{
			text-align: center;
			background-color: #01717C;
			color:white;
			padding: 5px;
			border-bottom: grey;
			padding-left:5px;
			width:100%;
		}
		.enfant{
			margin-top: 10px;
			font-size: 15px;
		}
		.enfant img{
			width:20%;
			border-radius: 30px;
		}
		.enfant p{
			margin: 5px;
		}
		.enfant
		{
			display: none;
		}

		.parent:hover .enfant{
			display:block;
		}
	</style>
</head>
<body >
	<div class="topnav" id="myTopnav" style="background-color:white;">
		<b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
		<b class="active"><?php echo  $_SESSION['id'];?></b>
		<a href="vendre.php"> Vendre un objet</a>
		<a href="listeItems.php"> Mon historique</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<div class="parent">Mon Compte
		<div class="enfant">
			<?php echo '<img src='. $data["photoPreferee"] .'>'; ?>
			<p><?php echo 'Bonjour ' . $_SESSION['id'];?>, vous êtes connecté en tant que vendeur.</p>
		</div>
	</div>
	<div class="row "style="margin:5px;">
		<div class="col-lg-6">
			<div class="card mt-5">

				<div class="card-body"style="text-align:center;background-color:white;color:black;">
					<h5 class="card-title">Mes Ventes</h5>
					<p class="card-text">Accédez à votre historique de vente</p>
					<a href="listeItems.php" class="btn btn-primary"style="background-color:#01717C;border:none;">Accéder</a>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card mt-5">
				<div class="card-body"style="text-align:center;background-color:white;color:black;">
					<h5 class="card-title">Ajouter une vente</h5>
					<p class="card-text">Ajoutez un article à la vente en renseignant toutes les informations nécessaires.</p>
					<a href="vendre.php" class="btn btn-primary"style="background-color:#01717C;border:none;">Ajouter</a>
				</div>
			</div>
		</div>
	</div>
<div class="wrapper" style="display:flex;justify-content: space-between;color: white;"> 
	<div style="text-align:center;">
	<h6>Modifier ma photo de profil</h6>
	<form action="photoVendeurProfil.php" method="post" enctype="multipart/form-data">
		<div class="form-group" enctype="multipart/form-data" action="post" >
			<div class="col-lg-2">
				<input type="file" name="fileToUpload" id="fileToUpload"> 
			</div>
			<div class="row justify-content-lg-left">
				<div class="col-lg-1 mt-1">
					<input type="submit" class="valid" value="Valider" name="ajouter">
				</div>
			</div>
		</div>
	</form>

</div>
<div style="text-align:center;">
	<h6>Modifier mon fond d'écran</h6>
	<form action="photoVendeurBackground.php" method="post" enctype="multipart/form-data">
		<div class="form-group" enctype="multipart/form-data" action="post" >
			<div class="col-lg-2">
				<input type="file" name="fileToUpload" id="fileToUpload"> 
			</div>
			<div class="row justify-content-lg-left">
				<div class="col-lg-1 mt-1">
					<input type="submit" class="valid" value="Valider" name="ajouter">
				</div>
			</div>
		</div>
	</form>
</div>
</div>

	<div class="space"></div>
	<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;">
		<div class="infoFooter">
			<p><a href="contact.html">Contact</a></p>
		</div>
		<div class="infoFooter">
			<div class="text-right"><a style="text-decoration:none; " href="../homepage.html"><p >Retourner à la page d'accueil</p>
				<div class="text-left"><a style="text-decoration:none; " href="../deconnection.php"><p >Se déconnecter<p>
				</a>
			</div>
		</div>
	</div>
</body>
</html>
