<!DOCTYPE html>
<html>
<?php session_start();?>
<head>

  <title>Page Achat</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

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
  <style>
    .thumbnail:hover{
      opacity:1.00;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      transition: box-shadow 0.5s;
    }
    /* General button style */
    .btn {
      border: none;
      font-family: 'Lato';
      font-size: inherit;
      color: inherit;
      background: none;
      cursor: pointer;
      padding: 25px 20px;
      display: inline-block;
      margin: 15px 30px;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: 300;
      outline: none;
      position: relative;
      -webkit-transition: all 0.3s;
      -moz-transition: all 0.3s;
      transition: all 0.3s;
    }

    .btn:after {
      content: '';
      position: absolute;
      z-index: -1;
      -webkit-transition: all 0.3s;
      -moz-transition: all 0.3s;
      transition: all 0.3s;
    }

    /* Pseudo elements for icons */
    .btn:before {
      font-family: 'FontAwesome';
      speak: none;
      font-style: normal;
      font-weight: normal;
      font-variant: normal;
      text-transform: none;
      line-height: 1;
      position: relative;
      -webkit-font-smoothing: antialiased;
    }


    /* Icon separator */
    .btn-sep {
      padding: 25px 60px 25px 120px;
    }

    .btn-sep:before {
      background: rgba(0,0,0,0.15);
    }

    /
    /* Button */
    .btn-2 {
      background: #2ecc71;
      color: #fff;
    }

    .btn-2:hover {
      background: #27ae60;
    }

    .btn-2:active {
      background: #27ae60;
      top: 2px;
    }

    .btn-2:before {
      position: absolute;
      height: 100%;
      left: 0;
      top: 0;
      line-height: 3;
      font-size: 140%;
      width: 60px;
    }

    /* Icons */

    .icon-cart:before {
      content: "\f07a";
    }
    .icon-send:before {
      content: "\f07a";
    }
  </style>

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
    .img {
      max-width: 100%;
    }
  </style>
  <script>
    $(document).ready(function () {
      $('#basictable').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
  </script>
</head>
<body>
  <div class="topnav" id="myTopnav" >
    <b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
    <b class="active"><?php echo  $_SESSION['id'];?></b>
    <a>
      <form class="form-inline col-sm-12">
        <input class="form-control mr-sm-1 col-sm-8" type="search" placeholder="Explorez par catégories" aria-label="Search">
        <button class="valid" type="submit">Search</button>
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
  <div class="row">

    <?php 
        //identifier votre BDD
    $database = "ebayECE";

    $login = $_SESSION['id'];

    $db_handle = mysqli_connect('localhost', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
      $sql = "SELECT * FROM item ORDER by prix ASC";
      $result = mysqli_query($db_handle, $sql);
      while ($data = mysqli_fetch_assoc($result)) {
        if($data['statut']!= "panier"){
          if($data['statut']!= "vendu"){
            ?>
            <!-- BEGIN ITEM -->
            <div class="col-md-5 col-sm-10">
              <span class="thumbnail text-center">
                <h2 class="text-blue"><?php echo $data['nom']; ?></h2>
                <br>
                <?php echo "<img src=". $data['photos'] .">"; ?> 
                <div class="ratings">
                  <br>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <p>Categorie : <?php echo $data['categorie'];?></p>
                  <p>Description: <?php echo $data['description'];?></p>
                  <h2><?php echo $data['prix'];?> € </h2>


                </div>
                <p><?php if($data['statut']=="enchere") {

                    //on calcule dans combien de temps finit l'enchere et on l'affiche
                  echo "Auction ends in ";
                  $today = date("Y-m-d");
                  $item_id = $data['idItem'];

                  $sql1= "SELECT endDate FROM enchere WHERE (itemId = $item_id)";
                  $result1 = mysqli_query($db_handle, $sql1);
                  $data1 = mysqli_fetch_assoc($result1);

                  $enddate= $data1['endDate'];

                  $datetime1 = new DateTime($today);
                  $datetime2 = new DateTime($enddate);
                  $interval = $datetime1->diff($datetime2);
                  echo $interval->format('%R%a days !');

                } } ?></p>

                <hr class="line">
                <div class="row">
                  <div class="col-md-2 col-sm-6">
                    <?php if($data['statut']=="enchere") { ?>
                      <a href="encherir.php?idAnnonce=<?php echo $data['idItem'];?>" type=button class="btn btn-2 btn-sep icon-cart" type="button" value="'.$data['idItem'].'" name="enchere">Encherir</button></a>
                    <?php } else if ($data['statut']=="meilleureOffre") { ?>
                      <a href="panier.php?idAnnonce=<?php echo $data['idItem'];?>" type=button class="btn btn-2 btn-sep icon-cart" type="button" value="'.$data['idItem'].'" name="offre">Faire une offre</button></a><?php } else if($data['statut']=="achatImmediat"){ ?>
                        <a href="panier.php?idAnnonce=<?php echo $data['idItem'];?>" type=button class="btn btn-2 btn-sep icon-cart" type="button" value="'.$data['idItem'].'" name="enchere">Ajouter au panier !</button></a><?php } 
                        ?>
                      </div>
                      <br>
                    </div>
                  </span>
                </div>

                <?php 
              }}}

              ?>
            </div>
            <div>
            </div>
          </div>
        </div>
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

      </body>
      
    </div>
    </html>