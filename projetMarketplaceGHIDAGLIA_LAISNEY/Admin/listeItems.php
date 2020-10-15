<!DOCTYPE html>
<html>
<?php session_start();?>
<head>

  <title>Liste Items</title>
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

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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
    .img {
      max-width: 100%;
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
  <script>
    $(document).ready(function () {
      $('#basictable').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
  </script>
</head>
<body>
  <<div class="topnav" id="myTopnav" >
  <b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
  <b class="active">Administrateur</b>
  <a href="accueilAdmin.php"> Retour page d'accueil</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  </div>

  <div class="parent">Mon Compte
    <div class="enfant">
      <img src="../Vendeur/uploads/account.png">
      <p><?php echo 'Bonjour ' . $_SESSION['id'];?>, vous êtes connecté en tant qu'Administrateur.</p>
    </div>
  </div>

  <div class="space"></div>
  <div class="container">
    <div class="table-responsive">
      <div class="row">
        <div class="col-lg-12">
          <table class="table" id="basictable">
            <thead>
              <tr>
                <th class="th-sm">Identifiant
                </th>
                <th class="th-sm">Nom
                </th>
                <th class="th-sm">Catégorie
                </th>
                <th class="th-sm">Statut
                </th>
                <th class="th-sm">Photos
                </th>
                <th class="th-sm">Description
                </th>
                <th class="th-sm">Prix
                </th>
                <th class="th-sm">Identifiant Vendeur
                </th>
              </tr>

            </thead>
            <?php

          //identifier votre BDD
            $database = "ebayECE";

            $login = $_SESSION['id'];
            $vendeur_id = "";

            $db_handle = mysqli_connect('localhost', 'root', 'root');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {
              $sql = "SELECT * FROM item";
              $result = mysqli_query($db_handle, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<td>' . $data['idItem'] . '</td>';
                  echo '<td>' . $data['nom'] . '</td>';
                  echo '<td>' . $data['categorie'] . '</td>';
                  echo '<td>' . $data['statut'] . '</td>';
                  echo '<td><img src='. $data["photos"] .'></td>';
                  echo '<td>' . $data['description'] . '</td>';
                  echo '<td>' . $data['prix'] . '</td>';
                  echo '<td>' . $data['vendeurId'] . '</td>';

                  echo '</tr>';
                }
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;background-color:white;">
    <div class="infoFooter">
      <p><a href="../contact.html">Contact</a></p>
    </div>
    <div class="infoFooter">
      <div class="text-right"><a style="text-decoration:none; " href="accueilAdmin.php"><p >Retourner à la page d'accueil</p></a></div>
    </div>
  </div>
</body>
</html>