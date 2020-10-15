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
	<title>Item</title>
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


	<?php

	$achat = isset($_POST["achat"])?$_POST["achat"] : "";

	if ($achat == "enchere") {
		?>
		<div class="wrapper"style="color:white;">
			<form action="enchere.php" method="POST" enctype="multipart/form-data">
				<div class="container">
					<div class="row justify-content-lg-center">
						<div class="col-lg-4">

							<h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;margin-top:40px;">Faites votre annonce pour vendre un produit en enchere</h3>

							<div class="form-group"style="text-align:center;margin-bottom:40px;">
								<input type="text" class="form-control"
								placeholder="Categorie" name="categorie" required>
							</div>

							<div class="form-group"style="text-align:center;margin-bottom:40px;">
								<input type="text" class="form-control"
								placeholder="Titre de l'annonce" name="titre" required>
							</div>

							<div class="form-group"style="text-align:center;margin-bottom:40px;">
								<input type="text" class="form-control"
								placeholder="Description" name="description" required>
							</div>
							<div class="form-group"style="text-align:center;margin-bottom:40px;">
								<input type="number" class="form-control"
								placeholder="Prix" name="prix" required>
							</div>
							<div class="form-group"style="text-align:center;margin-bottom:40px;">
								<input type="date" class="form-control"
								placeholder="Date de debut de l'enchere" name="dateDebut" required>
							</div>
							<div class="form-group"style="text-align:center;margin-bottom:40px;">
								<input type="date" class="form-control"
								placeholder="Date de fin de l'enchere" name="dateFin" required>
							</div>

							<div class="form-group"style="text-align:center;margin-bottom:40px;">
								<label for="file">Sélectionner une photo</label>
								<input type="file" name="fileToUpload" id="fileToUpload">
							</div>


							<input type="submit" class="btn btn-secondary btn-block"
							value="Publier l'article" name="publier">
						</div>
					</div>
				</div>
				<div class="space"></div>
			</form>
		</div>
		<div class="space"></div>
		<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;background-color:white;">
			<div class="infoFooter">
				<p><a href="../contact.html">Contact</a></p>
			</div>
			<div class="infoFooter">
				<div class="text-right"><a style="text-decoration:none; " href="accueilVendeur.php"><p >Retourner à la page d'accueil</p></a></div>
			</div>
		</div>
		<?php
		/*
            <div class="form-group"style="text-align:center;margin-bottom:40px;">
              <label for="file">Sélectionner une photo de profil préférée</label>
              <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
              <input type="file" name="file">
            </div>
            <div class="form-group"style="text-align:center;margin-bottom:40px;">
              <label for="file">Sélectionner une photo de fond d'écran</label>
              <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
              <input type="file" name="file">
              </div>*/
          }
          ?>


          <?php

          $achat = isset($_POST["achat"])?$_POST["achat"] : "";

          if ($achat == "meilleureOffre") {
          	?>
          	<div class="wrapper"style="color:white;">
          		<form action="meilleureOffre.php" method="POST" enctype="multipart/form-data">
          			<div class="container">
          				<div class="row justify-content-lg-center">
          					<div class="col-lg-4">

          						<h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;margin-top:40px;">Faites votre Meilleure Offre</h3>

          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="text" class="form-control"
          							placeholder="Categorie" name="categorie" required>
          						</div>

          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="text" class="form-control"
          							placeholder="Titre de l'annonce" name="titre" required>
          						</div>

          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="text" class="form-control"
          							placeholder="Description" name="description" required>
          						</div>
          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="number" class="form-control"
          							placeholder="Prix" name="prixVente" required>
          						</div>
          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="hidden" name="MAX_FILE_SIZE" value="100000">
          							<input type="file" name="file">
          						</div>
          						<input type="submit" class="btn btn-secondary btn-block"
          						value="Publier l'article" name="publier">
          					</div>
          				</div>
          			</div>
          			<div class="space"></div>
          		</form>
          	</div>
          	<div class="space"></div>
          	<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;background-color:white;">
          		<div class="infoFooter">
          			<p><a href="../contact.html">Contact</a></p>
          		</div>
          		<div class="infoFooter">
          			<div class="text-right"><a style="text-decoration:none; " href="accueilVendeur.php"><p >Retourner à la page d'accueil</p></a></div>
          		</div>
          	</div>
          	<?php
          }
          ?>


          <?php

          $achat = isset($_POST["achat"])?$_POST["achat"] : "";

          if ($achat == "achatImmediat") {
          	?>
          	<div class="wrapper"style="color:white;">
          		<form action="achatImmediat.php" method="POST" enctype="multipart/form-data">
          			<div class="container">
          				<div class="row justify-content-lg-center">
          					<div class="col-lg-4">

          						<h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;margin-top:40px;">Faites votre annonce pour vendre un produit en achat immédiat</h3>

          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="text" class="form-control"
          							placeholder="Categorie" name="categorie" required>
          						</div>

          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="text" class="form-control"
          							placeholder="Titre de l'annonce" name="titre" required>
          						</div>

          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="text" class="form-control"
          							placeholder="Description" name="description" required>
          						</div>
          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="number" class="form-control"
          							placeholder="Prix" name="prix" required>
          						</div>

          						<div class="form-group"style="text-align:center;margin-bottom:40px;">
          							<input type="hidden" name="MAX_FILE_SIZE" value="100000">
          							<input type="file" name="file">
          						</div>


          						<input type="submit" class="btn btn-secondary btn-block"
          						value="Publier l'article" name="publier">
          					</div>
          				</div>
          			</div>
          			<div class="space"></div>
          		</form>
          	</div>
          	<div class="space"></div>
          	<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;background-color:white;">
          		<div class="infoFooter">
          			<p><a href="../contact.html">Contact</a></p>
          		</div>
          		<div class="infoFooter">
          			<div class="text-right"><a style="text-decoration:none; " href="accueilVendeur.php"><p >Retourner à la page d'accueil</p></a></div>
          		</div>
          	</div>
          	<?php
          }
          ?>
      </body>
      </html>
