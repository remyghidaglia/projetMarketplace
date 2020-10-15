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
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	echo "error connection";
}

$sql = "SELECT * FROM vendeur WHERE (login='$_SESSION[id]')";
$requete= mysqli_query($conn,$sql)or die ("Erreur de connection :".mysqli_error($conn));
$data = mysqli_fetch_assoc($requete);
?>

<head>
	<title>Vendre</title>
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
<body>
	<div class="topnav" id="myTopnav" style="background-color:white;">
		<b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
		<b class="active"><?php echo  $_SESSION['id'];?></b>
		<a href="vendre.php"> Vendre un objet</a>
		<a href="listeItems.php"> Mon historique</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<div class="space"></div>

	<div class="parent">Mon Compte
		<div class="enfant">
			<?php echo '<img src='. $data["photoPreferee"] .'>'; ?>
			<p><?php echo 'Bonjour ' . $_SESSION['id'];?>, vous êtes connecté en tant que vendeur.</p>
		</div>
	</div>

	<div class="wrapper"style="color:white;">
		<form action="item.php" method="post"style="text-align:center;margin-bottom:40px;color:white;margin-top:40px;">
			<h3 >Quel type de vente pour votre produit ?</h3>
			<input type="radio" id="enchere" name="achat" value="enchere"style="margin-top:40px;">
			<label for="enchere">Enchere</label><br>
			<input type="radio" id="meilleureOffre" name="achat" value="meilleureOffre">
			<label for="meilleureOffre">Meilleure Offre</label><br>
			<input type="radio" id="achatImmediat" name="achat" value="achatImmediat">
			<label for="achatImmediat">Achat Immédiat</label></br>
			<input type="submit" value="Valider"style="margin-top:40px;background-color:white;border-radius:5px;">
		</form>
	</div>
	<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;background-color:white;">
		<div class="infoFooter">
			<p><a href="../contact.html">Contact</a></p>
		</div>
		<div class="infoFooter">
			<div class="text-right"><a style="text-decoration:none; " href="accueilVendeur.php"><p >Retourner à la page d'accueil</p></a></div>
		</div>
	</div>

</body>

</html>
