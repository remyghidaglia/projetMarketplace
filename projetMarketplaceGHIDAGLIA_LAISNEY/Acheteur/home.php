<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
  <title>Home Acheteur</title>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }
    #category{
    }

    .titre h1{
      color:white;
    }
    .titre h1:hover{
      color: black;
    }
  </style>
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
    <b class="active"><?php echo  $_SESSION['id'];?></b>
    <a>
      <form class="form-inline col-sm-12">
        <input class="form-control mr-sm-1 col-sm-8" type="search" placeholder="Explorez par catégories" aria-label="Search">
        <button class="btn btn-outline-blue " type="submit">Search</button>
      </form>
    </a>
    <a class="active" href="monPanier.php"><img src="../img/panier.png" alt="ECEmarketplace" style=" height:50px; width:50;;"></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  
  <div class="parent">Mon Compte
    <div class="enfant">
      <img src="../Vendeur/uploads/account.png">
      <p><?php echo 'Bonjour ' . $_SESSION['id'];?>, vous êtes connecté en tant que Acheteur.</p>
    </div>
  </div>

  <div class="space"></div>
  <div class="wrapper">
    <div class="titre"style="padding-bottom:10px;"><a  href="acheter.php"style="color:black;text-decoration: none;text-align:center;margin-bottom:20px;"><h1>Acheter</h1></a></div>
    <div class="space"></div>
    <div class="container-fluid" id="category">
      <div class="row" style="justify-content: space-between;display:flex;">
        <div >
          <button class="type" type="button" name="ferraille" onclick="location.href='ferraille.php'"style="background-color: #01717C;border: :none;padding: 10px;;color: white;border-radius: 4px;margin-top:-7px;">Ferraille ou Trésor</button>
        </div>
        <div >
          <button class="type" type="button" name="musee" onclick="location.href='musee.php'"style="background-color: #01717C;border: :none;padding: 10px;;color: white;border-radius: 4px;margin-top:-7px;">Bon pour le musée</button>
        </div>
        <div  >
          <button class="type" type="button" name="vip" onclick="location.href='vip.php'"style="background-color: #01717C;border: :none;padding: 10px;;color: white;border-radius: 4px;margin-top:-7px;">VIP</button>
        </div>
      </div>
    </div>
  </div>
  <div class="space"></div>
  <div class="container">
    <div class="space"></div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">

        <div class="item active">
          <img src="../img/tresor.jpeg" alt="Los Angeles" style="width:100%;">
          <div class="carousel-caption">
            <h2>Ferraille ou Trésor</h2>
            <p></p>
          </div>
        </div>

        <div class="item">
          <img src="../img/musee.jpg" alt="Chicago" style="width:100%;">
          <div class="carousel-caption">
            <h2>Bon pour le musée</h2>
            <p>Trouvez vos meilleures œuvres d'art.</p>
          </div>
        </div>

        <div class="item">
          <img src="../img/vip.jpeg" alt="New York" style="width:100%;">
          <div class="carousel-caption">
            <h2>Objets VIP</h2>
            <p>A la recherche de la rareté.</p>
          </div>
        </div>

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="space"></div>
  <div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;">
    <div class="infoFooter">
      <p><a href="../contact.html">Contact</a></p>
    </div>
    <div class="infoFooter">
      <div class="text-right"><a style="text-decoration:none; " href="../Acheteur/home.php"><p >Retourner à la page d'accueil</p>
        <div class="text-left"><a style="text-decoration:none; " href="../deconnection.php"><p >Se déconnecter<p>
        </a>
      </div>
    </div>
  </div>
</body>
</html>