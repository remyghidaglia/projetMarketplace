<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>

	<title>Accueil Admin</title>
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
	<div class="topnav" id="myTopnav" >
		<b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
		<b class="active">Administrateur</b>
		<a href="listeAcheteurs.php"> Acheteurs</a>
		<a href="listeVendeurs.php"> Vendeurs</a>
		<a href="listeItems.php"> Items</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>

	<div class="parent">Mon Compte
		<div class="enfant">
			<img src="../Vendeur/uploads/account.png">
			<div class="center"style="background-color:grey;color:white;">
				<p><?php echo 'Bonjour ' . $_SESSION['id'];?>, vous êtes connecté en tant que Administrateur.</p>
			</div>
		</div>
	</div>
	<nav>
		
		<h1 style="text-align:justify;">Depuis cette interface, gérez les acheteurs, les vendeurs et les objets enregistrés sur ce site web depuis la barre de navigation.</h1>
	</nav>
	<div class="row ">
		<div class="col-md-6">
			<div class="wrapper">
				<div class="space"></div>
				<div class="center"style="color:white;"><h1>Meilleurs vendeurs</h1></div>
				<div class="space"></div>
				<table class="table"style="color:white;">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nom</th>
							<th scope="col">Prénom</th>
							<th scope="col">Nombre de ventes</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Gérard</td>
							<td>Ifier</td>
							<td>38</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Alain</td>
							<td>Tairieur</td>
							<td>30</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Victor</td>
							<td>Haiador</td>
							<td>26</td>
						</tr>
					</tbody>
				</table>
				<div class="space"></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="wrapper">
				<div class="space"></div>
				<div class="center"style="color:white;"><h1>Dernières commandes</h1></div>
				<div class="space"></div>
				<table class="table"style="color:white;">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nom</th>
							<th scope="col">Prénom</th>
							<th scope="col">Prix</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Leblé</td>
							<td>29,99€</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Jeremie</td>
							<td>Molette</td>
							<td>12,00€</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Larry</td>
							<td>Golait</td>
							<td>6,66€</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;">
		<div class="infoFooter">
			<p><a href="../contact.html">Contact</a></p>
		</div>
		<div class="infoFooter">
			<div class="text-right"><a style="text-decoration:none; " href="../homepage.html"><p >Retourner à la page d'accueil</p></a></div>
			<div class="text-left"><a style="text-decoration:none; " href="../deconnection.php"><p >Se déconnecter<p>
			</div>
		</div>
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
		$sql = "SELECT * FROM administrateur WHERE (login='$_SESSION[id]')";
		$requete= mysqli_query($conn,$sql)or die ("Erreur de connection :".mysqli_error($conn));
		$data = mysqli_fetch_assoc($requete);
		?>


	</body>
	</html>