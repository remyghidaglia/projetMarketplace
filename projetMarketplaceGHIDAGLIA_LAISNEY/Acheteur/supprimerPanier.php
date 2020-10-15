<?php
session_start();
$identifiant = $_GET['idAnnonce'];
echo $identifiant;
echo "ok";

$login = $_SESSION['id'];
$acheteur_id = "";
//identifier votre BD
$database = "ebayECE";

echo 'Bonjour ' . $_SESSION['id'];

//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost | votre login = root |votre password = root
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
  $sql = "SELECT * FROM panier";
  $result = mysqli_query($db_handle, $sql);
  $sql = "DELETE FROM panier WHERE (itemId = $identifiant AND acheteurID = $acheteur_id)";
  $result = mysqli_query($db_handle, $sql);

  echo "Supp successful." . "<br>";

    } // fermer if($db_found)
    else {
      echo "Database not found";
    }
header('Location: ' . "monPanier.php");
//fermer la connexion
    mysqli_close($db_handle);
    ?>
