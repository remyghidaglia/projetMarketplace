<?php

$login = isset($_POST["pseudo"])?$_POST["pseudo"]:"";
$motDePasse=isset($_POST["mdp"])?$_POST["mdp"]:"";

//identifier votre BDD
$database = "ebayECE";

//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if(isset($_POST['connect']) == 'connect'){

  if(isset($_POST["pseudo"])  && isset($_POST["mdp"])){

    if ($db_found) {
      $sql = "SELECT * FROM administrateur";

      if ($login != "") {
        //on cherche le livre avec les paramètres titre et auteur
        $sql .= " WHERE login LIKE '%$login%'";

        if ($password != "") {
          $sql .= " AND password LIKE '%$motDePasse%'";
        }
      }

      $result = mysqli_query($db_handle, $sql);

      //tester s'il y a de résultat
      if (mysqli_num_rows($result) == 0) {
      //le livre recherché n'existe pas
        echo "Administrateur not found";
      }
      else {
        //on trouve le livre recherché
        while ($data = mysqli_fetch_assoc($result)) {
          echo "ID: " . $data['idAdmin'] . "<br>";
          echo "nom: " . $data['nom'] . "<br>";
          echo "prenom: " . $data['prenom'] . "<br>";
          echo "login: " . $data['login'] . "<br>";
          echo "mot de passe: " . $data['password'] . "<br>";
          echo "<br>";
        }
      }
      session_start();
      $_SESSION['id'] = $login;
      header('Location: ' . "accueilAdmin.php");
    } else {
      echo 'Mauvais pseudo/mot de passe';
    }

//fermer la connexion
    mysqli_close($db_handle);


  }
}

/*$sql1 = "SELECT idAdmin FROM administrateur WHERE (login='$login')";
      $result = mysqli_query($db_handle, $sql1);
      //tester s'il y a de résultat
      if (mysqli_num_rows($result) == 0) {
      //le livre recherché n'existe pas
        echo "Administrateur not found";
      }
      else {
        //on trouve le livre recherché
        while ($data = mysqli_fetch_assoc($result)) {
          $ID = $data['idAdmin'];
        }
      }*/
      ?>
