<?php
$identifiant = $_POST['vendeur_id'];
$name = $_POST['nom'];

//identifier votre BDD
$database = "ebayECE";

    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost | votre login = root |votre password = root
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    $sql = "SELECT * FROM vendeur";
    $result = mysqli_query($db_handle, $sql);

        //regarder s'il y a de résultat
    if (mysqli_num_rows($result) == 0) {
            //le livre n'est pas dans la BDD
        echo "Vendeur do not exists.";
    } else {

        $sql = "DELETE FROM `vendeur` WHERE `idVendeur`=$identifiant";
        $result = mysqli_query($db_handle, $sql);

        echo "Supp successful." . "<br>";
        } //fermer Else
    } else {
        echo "Database not found"; 
    }


//fermer la connexion
mysqli_close($db_handle);
?>

