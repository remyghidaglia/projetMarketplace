<?php
//recuperer les données venant de la page HTML
$nom = isset($_POST["nom"])?$_POST["nom"] : "";
$prenom =isset($_POST["prenom"])?$_POST["prenom"]:"";
$login = isset($_POST["pseudo"])?$_POST["pseudo"] : "";
$motDePasse =isset($_POST["mdp"])?$_POST["mdp"]:"";

//identifier votre BDD
$database = "ebayECE";


//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost | votre login = root |votre password = root
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

    // Source : https://www.w3schools.com/php/php_file_upload.asp
    $target_dir = "../Vendeur/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // if everything is ok, try to upload file

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $profil = $target_file;

    // Source : https://www.w3schools.com/php/php_file_upload.asp
    $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

    // if everything is ok, try to upload file

    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
        echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $background = $target_file2;

    $sql = "SELECT * FROM vendeur";

    if ($login != "") {
        $sql .= " WHERE login LIKE '%$login%'";

        if ($motDePasse != "") {
            $sql .= " AND password LIKE '%$motDePasse%'";
        }
    }

    $result = mysqli_query($db_handle, $sql);

                //regarder s'il y a de résultat
    if (mysqli_num_rows($result) != 0) {
                    //le livre est déjà dans la BDD
        echo "Utilisateur vendeur existe deja.";
    }

    else {

        $sql = "INSERT INTO vendeur(nom, prenom, login, password, photoPreferee, backgroundPhoto) VALUES('$nom', '$prenom', '$login', '$motDePasse', '$profil', '$background')";
        $result = mysqli_query($db_handle, $sql);

        echo "Add successful." . "<br>";

        $sql = "SELECT * FROM vendeur";

        if ($login != "") {

            $sql .= " WHERE login LIKE '%$login%'";

            if ($motDePasse != "") {
                $sql .= " AND password LIKE '%$motDePasse%'";
            }
        }

        $result = mysqli_query($db_handle, $sql);//fermer Else
        while ($data = mysqli_fetch_assoc($result)) {
          echo '<img src= '. $data["photoPreferee"] .' >';
          echo '<img src= '. $data["backgroundPhoto"] .' >';

    }   //end while


    session_start();
    $_SESSION['id'] = $login;
    header('Location: ' . "accueilVendeur.php");
}

     } // fermer if($db_found)
     else {
        echo "Database not found";
    }



//fermer la connexion
    mysqli_close($db_handle);
    ?>
