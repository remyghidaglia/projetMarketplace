<!DOCTYPE html>
<html>
<?php
session_start();
?>
<!--utlisier $GET['idAnnonce'] pour recup mon id -->
<head>
  <title>Panier</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

  <?php
  $identifiant = $_GET['idAnnonce'];
  echo $identifiant;

  //identifier votre BDD
  $database = "ebayECE";
  echo "ok";

  $login = $_SESSION['id'];
  $acheteur_id = "";

  $db_handle = mysqli_connect('localhost', 'root', 'root');
  $db_found = mysqli_select_db($db_handle, $database);

  echo 'Bonjour ' . $_SESSION['id'];

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
      echo "Id acheteur : ".$acheteur_id."";
    }

    //on ouvre le panier
    $sql = "SELECT * FROM panier";

    if ($acheteur_id != "") {
        //on cherche le panier avec les paramètres item
      $sql .= " WHERE acheteurId LIKE '%$acheteur_id%'";
      if ($identifiant != "") {
        //on cherche le panier avec les paramètres item
      $sql .= " AND itemId LIKE '%$identifiant%'";
      }
    }

    $result = mysqli_query($db_handle, $sql);

    //regarder s'il y a de résultat
    if (mysqli_num_rows($result) != 0) {
      //l' item est déjà dans la BDD
      echo "Item est deja dans le panier.
      Duplicate not allowed.";
    } 

    else {

      $sql = "INSERT INTO panier (acheteurId, itemId) VALUES ('$acheteur_id','$identifiant')";
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);
      echo "1";

    //on ajoute l'item au panier
      $sql = "SELECT * FROM panier";

      if ($acheteur_id != "") {
        $sql .= " WHERE acheteurId LIKE '%$acheteur_id%'";
      }

      $result = mysqli_query($db_handle, $sql);
      while ($data = mysqli_fetch_assoc($result)) {
        echo "1";
        echo "<br>". "Informations sur l'item ajouté au panier:" . "<br>";
        echo "ID: " . $data['id'] . "<br>";
        echo "Acheteur: " . $data['acheteurId'] . "<br>";
        echo "Item: " . $data['itemId'] . "<br>";
        $item_id = $data['itemId'];
      }
    } 
    header('Location: ' . "monPanier.php");
  }

  ?>
  </body>
  </html>