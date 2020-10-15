<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script
  src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script type="text/javascript">
    $(document).ready(function(){
      $('.header').height($(window).height());
    });
  </script>
</head>
<body>

  <h6><?php echo 'Bonjour ' . $_SESSION['id'];?></h6>

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
  else{

    echo "Connection successful";
  }

  $sql = "SELECT * FROM administrateur WHERE (login='$_SESSION[id]')";
  $requete= mysqli_query($conn,$sql)or die ("Erreur de connection :".mysqli_error($conn));
  $data = mysqli_fetch_assoc($requete);
  ?>

</body>
</html>

        <div class="container">
          <div class="row justify-content-lg-center">
            <div class="col-lg-8">
              <table id="basictable">
                <thead>
                  <tr>
                    <th class="th-sm">Titre de l'annonce
                    </th>
                    <th class="th-sm">Catégorie 
                    </th>
                    <th class="th-sm">Photos 
                    </th>
                    <th class="th-sm">Description 
                    </th>
                    <th class="th-sm">Prix 
                    </th>
                    <th class="th-sm"> 
                    </th>
                  </tr>
                </thead>

              </table>
            </div>
          </div>
        </div>

<?php

value="'.$data['idItem'].'" name="enchere">Encherir 

              <div class="col-md-6 col-sm-6">
                <button value="<?php if($data['statut']=="enchere") { echo "Submit";}?>"></button>
              </div>

/*        //identifier votre BDD
$database = "ebayECE";

$login = $_SESSION['id'];

$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
  $sql = "SELECT * FROM item";
  $result = mysqli_query($db_handle, $sql);
  while ($data = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $data['nom'] . '</td>';
    echo '<td>' . $data['categorie'] . '</td>';
    echo '<td><img src='. $data["photos"] .'></td>';
    echo '<td>' . $data['description'] . '</td>';
    echo '<td>' . $data['prix'] . '</td>';
    if($data['statut']=="enchere") {
      echo '<td><button class="valid" type="button" value="'.$data['idItem'].'" name="enchere">Encherir </button></td>';
    } else if ($data['statut']=="meilleureOffre") {
      echo '<td><button class="valid" type="button" value="'.$data['idItem'].'" name="meilleureOffre">Faire une offre </button></td>';
    } else if ($data['statut']=="achatImmediat") {
      echo '<td><button class="valid" type="button" value="'.$data['idItem'].'" name="achatImmediat">Acheter maintenant! </button></td>';

    } else {
      echo '<td><button class="valid" type="button" value="'.$data['idItem'].'" name="achat">Acheter </button></td>';
    }
    echo '</tr>';
  }
}*/
?>