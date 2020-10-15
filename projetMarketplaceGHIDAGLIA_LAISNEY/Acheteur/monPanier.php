<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
  <title>Mon Panier</title>
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
    <h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;">Votre Panier</h3>
    <div class="container">
      <table id="cart" class="table table-hover table-condensed">
        <thead>
          <tr>
            <th style="width:40%">Nom</th>
            <th style="width:10%">Categorie</th>
            <th style="width:10%">Prix</th>
            <th style="width:10%">Statut</th>
            <th style="width:10%">Supprimer</th>
          </tr>
        </thead>
        <?php

          //identifier votre BDD
        $database = "ebayECE";

        $login = $_SESSION['id'];
        $acheteur_id = "";

        $db_handle = mysqli_connect('localhost', 'root', 'root');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
          $sql = "SELECT idAcheteur FROM acheteur WHERE (login='$login')";
          $result = mysqli_query($db_handle, $sql);
           //tester s'il y a de résultat
          if (mysqli_num_rows($result) == 0) {
            echo "Acheteur not found";
          }

          else {
            while ($data = mysqli_fetch_assoc($result)) {
              $acheteur_id = $data['idAcheteur'];
            }
            $sql = "SELECT * FROM panier";
            if ($acheteur_id != "") {
              $sql .= " WHERE acheteurId LIKE '%$acheteur_id%'";
              $result = mysqli_query($db_handle, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                $sql1 = 'SELECT * FROM acheteur Where idAcheteur='.$acheteur_id.'';
                $result1 = mysqli_query($db_handle, $sql1);
                $data1 = mysqli_fetch_array($result1);

                $item_id= $data['itemId'];
                $sql2 = 'SELECT * FROM item Where idItem='.$item_id.'';
                $result2 = mysqli_query($db_handle, $sql2);
                while($data2 = mysqli_fetch_array($result2)){ ?>

                  <tbody>
                    <tr>
                      <td data-th="Nom">
                        <div class="row">
                          <div class="col-sm-4"><img src="<?php echo $data2["photos"] ?>" alt="..." class="img-responsive"/></div>
                          <div class="col-sm-10">
                            <h4 class="nomargin"><?php echo $data2['nom'];?></h4>
                            <p><?php echo $data2['description'];?>.</p>
                          </div>
                        </div>
                      </td>
                      <td data-th="Categorie" style="text-align:center;">
                        <div class="row">
                          <p><?php echo $data2['categorie'];?></p>
                        </div>
                      </td>
                      <td data-th="Prix" style="text-align:center;">
                        <div class="row">
                          <p><?php echo $data2['prix'];?></p>
                        </div>
                      </td>
                      <td data-th="Statut" style="text-align:center;">
                        <p><?php if($data['statut']=="vendu") { echo "FELICITATIONS ! Vous avez remporté l'enchère !"; } else if ($data['statut']=="meilleureOffre") { echo "FELICITATIONS ! Vous maîtrisez l'art de la négociation à la perfection !"; } else if ($data['statut']=="enchere") { echo "FELICITATIONS ! Vous avez remporté l'enchère !"; } else { echo "Achetez ce bien maintenant !"; } ?>
                      </td>
                      <td data-th="Supprimer" style="text-align:center;">
                       <a href="supprimerPanier.php?idAnnonce=<?php echo $data2['idItem'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                       </td>
                     </tr>
                   </tbody>
                 </div>
                 <?php
               }}
               $sql3 = "SELECT SUM(prix) AS total from panier,item WHERE item.idItem=panier.itemId";
               $result3 = mysqli_query($db_handle, $sql3);
               while($data3 = mysqli_fetch_array($result3)) {?>
               </table>
               <div style="  justify-content: space-between;display:flex;">
                <div><a href="acheter.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></div>
                <div style="font-size:30px; text-decoration: underline;">TOTAL: <?php echo $data3['total'];}}}}?> €</div>
                <div><a href="checkout.php" class="btn btn-danger">Checkout <i class="fa fa-angle-right"></i></a></div>
              </div>
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