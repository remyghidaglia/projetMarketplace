<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
  <title>Paiement</title>
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
  .img {
    width:100%;
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
<style>
  .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
  }
  @media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
      width:20%;
      display: inline !important;
    }
    .actions .btn{
      width:36%;
      margin:1.5em 0;
    }

    .actions .btn-info{
      float:left;
    }
    .actions .btn-danger{
      float:right;
    }

    table#cart thead { display: none; }
    table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
    table#cart tbody tr td:first-child { background: #333; color: #fff; }
    table#cart tbody td:before {
      content: attr(data-th); font-weight: bold;
      display: inline-block; width: 8rem;
    }

    table#cart tfoot td{display:block; }
    table#cart tfoot td .btn{display:block;}

  }
</style>
</head>

<body>
  <?php 
  //identifier votre BDD
  $database = "ebayECE";

  $login = $_SESSION['id'];
  $acheteur_id="";

  $db_handle = mysqli_connect('localhost', 'root', 'root');
  $db_found = mysqli_select_db($db_handle, $database);

  if ($db_found) {
    $sql = "SELECT idAcheteur FROM acheteur WHERE (login='$login')";
    $result = mysqli_query($db_handle, $sql);
           //tester s'il y a de résultat
    if (mysqli_num_rows($result) == 0) {
      echo "Acheteur not found";
    } else {
      while ($data = mysqli_fetch_assoc($result)) {
        $acheteur_id = $data['idAcheteur'];
      }
      $sql = "SELECT itemId FROM panier";

      if ($acheteur_id != "") {
        $sql .= " WHERE acheteurId LIKE '%$acheteur_id%'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
          $identifiant = $data['itemId'];
          $statut="vendu";

          $sql = "UPDATE `item` SET `statut`='$statut' WHERE `idItem`='$identifiant'";
          $result = mysqli_query($db_handle, $sql);
          $data = mysqli_fetch_assoc($result);

          $sql = "DELETE FROM panier WHERE acheteurID = $acheteur_id AND itemId = $identifiant";
          $result = mysqli_query($db_handle, $sql);
          $data = mysqli_fetch_assoc($result);

        } //fermer Else
      }
    }
  }
  ?>
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
  <div class="wrapper"style="color:white;">
    <h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;"></h3>
    <div class="container">
      <h3 style="text-align=center;">MERCI POUR VOTRE COMMANDE !</h3>
      <img src="../img/final.jpg">
      <table id="cart" class="table table-hover table-condensed">
        
      </table>
    </div>
  </div>
  <div class="space"></div>
  <div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;">
    <div class="infoFooter">
      <p><a href="../contact.html">Contact</a></p>
    </div>
    <div class="infoFooter">
      <div class="text-right"><a style="text-decoration:none; " href="home.php"><p >Retourner à la page d'accueil</p></a></div>
    </div>
  </div>

</body>
</html>