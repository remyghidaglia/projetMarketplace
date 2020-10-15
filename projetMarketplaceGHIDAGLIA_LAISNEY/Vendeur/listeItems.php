<!DOCTYPE html>
<html>
<?php session_start();?>
<?php
//identifier votre BDD
$database = "ebayECE";

$login = $_SESSION['id'];
$vendeur_id = "";
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
  $sql = "SELECT * FROM vendeur WHERE (login='$login')";
  $result = mysqli_query($db_handle, $sql);
  //tester s'il y a de résultat
  if (mysqli_num_rows($result) == 0) {
    echo "Vendeur not found";
  } else {
    $data = mysqli_fetch_assoc($result);
    ?>
    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
      <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" type="text/css" href="../styles.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

      <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
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
      <script>
        $(document).ready(function () {
          $('#basictable').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
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

      <div class="parent">Mon Compte
        <div class="enfant">
          <?php echo '<img src='. $data["photoPreferee"] .'>'; ?>
          <p><?php echo 'Bonjour ' . $_SESSION['id'];?>, vous êtes connecté en tant que vendeur.</p>
        </div>
      </div>

      <div class="annonce" style="display:flex;justify-content:center;margin:20px;margin-bottom:40px;">
        <div class=""style="text-align: center;">
          <h3 >Ajoutez des items à la liste : </h3></div>
          <div >
            <form action="vendre.php" method="post" >
              <table >
                <tr>
                  <td colspan="2" align="center">
                   <input type="submit" name="button2" value="Vendre"style="width: 100%;background-color: #01717C;border: :none;padding: 10px;;color: white;border-radius: 4px;margin-top:-7px;"></td>
                 </tr>
               </table>
             </form>
           </div>
         </div>
         <div class="space"></div>
         <div class="container" style="display:flex;justify-content:center;margin:20px;margin-bottom:40px;">
          <div class="row justify-content-lg-center">
            <div class="col-lg-8">
              <table id="basictable">
                <thead>
                  <tr>
                    <th class="th-sm">Identifiant
                    </th>
                    <th class="th-sm">Nom
                    </th>
                    <th class="th-sm">Categorie
                    </th>
                    <th class="th-sm">Statut
                    </th>
                    <th class="th-sm">Photos
                    </th>
                    <th class="th-sm">Description
                    </th>
                    <th class="th-sm">Prix
                    </th>
                  </tr>

                </thead>
                <?php
                $vendeur_id = $data['idVendeur'];
                $sql = "SELECT * FROM item";
                if ($vendeur_id != "") {
                  $sql .= " WHERE vendeurId LIKE '%$vendeur_id%'";
                  $result = mysqli_query($db_handle, $sql);
                  while($data = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>' . $data['idItem'] . '</td>';
                    echo '<td>' . $data['nom'] . '</td>';
                    echo '<td>' . $data['categorie'] . '</td>';
                    echo '<td>' . $data['statut'] . '</td>';
                    echo '<td><img src='. $data['photos'] .'></td>';
                    echo '<td>' . $data['description'] . '</td>';
                    echo '<td>' . $data['prix'] . '</td>';

                    echo '</tr>';
                  }
                }
              }
            }
            ?>
          </table>
        </div>
      </div>
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
