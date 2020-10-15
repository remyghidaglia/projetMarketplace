<?php
session_start();
//identifier votre BDD
$database = "ebayECE";

$login = $_SESSION['id'];
$vendeur_id = "";
$item_id = "";
$enchere_id = "";

$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if(isset($_POST['publier']) == 'publier'){
    echo 'Bonjour ' . $_SESSION['id'];

    $nom = isset($_POST["titre"])?$_POST["titre"] : "";
    $categorie =isset($_POST["categorie"])?$_POST["categorie"]:"";
    $statut = "enchere";
    $repetition = "5";
    $description =isset($_POST["description"])?$_POST["description"]:"";
    $prix = isset($_POST["prix"])?$_POST["prix"] : "";

    $startDate = isset($_POST["dateDebut"])?$_POST["dateDebut"] : "";
    $endDate = isset($_POST["dateFin"])?$_POST["dateFin"] : "";

    if ($db_found) {
        $target_dir = "../Vendeur/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // if everything is ok, try to upload file

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $photos = $target_file;

        $sql = "SELECT idVendeur FROM vendeur WHERE (login='$login')";
        $result = mysqli_query($db_handle, $sql);

        //tester s'il y a de résultat
        if (mysqli_num_rows($result) == 0) {
            echo "Vendeur not found";
        }

        else {
            while ($data = mysqli_fetch_assoc($result)) {
                $vendeur_id = $data['idVendeur'];
            }
            echo "Id vendeur : ".$vendeur_id."";
        }

        echo $vendeur_id;

        $sql = "INSERT INTO item (nom, categorie, statut, photos, description, prix, vendeurId) VALUES ('$nom','$categorie','$statut', '$photos', '$description','$prix', '$vendeur_id')";
        $result = mysqli_query($db_handle, $sql);
        echo "Add successful." . "<br>";
                     //on affiche le livre ajouté
        $sql = "SELECT * FROM item";

        if ($vendeur_id != "") {
                        //on cherche le livre avec les paramètres titre et auteur
            $sql .= " WHERE vendeurId LIKE '%$vendeur_id%'";
        }

        $result = mysqli_query($db_handle, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            echo "Informations sur l'item ajouté:" . "<br>";
            echo "ID: " . $data['idItem'] . "<br>";
            $item_id = $data['idItem'];
        }
        echo $item_id;

        $sql1 = "INSERT INTO enchere (startDate, endDate, prixVente, repetition, vendeurId, itemId) VALUES ('$startDate','$endDate','$prix', '$repetition', '$vendeur_id','$item_id')";
        $result1 = mysqli_query($db_handle, $sql1);
        echo "Add successful." . "<br>";

        $sql1 = "SELECT * FROM enchere";
        if ($vendeur_id != "") {
        //on cherche le livre avec les paramètres titre et auteur
            $sql1 .= " WHERE vendeurId LIKE '%$vendeur_id%'";

            if ($item_id != "") {
                $sql1 .= " AND itemId LIKE '%$item_id%'";
            }
        }

        $result1 = mysqli_query($db_handle, $sql1);
        while ($data = mysqli_fetch_assoc($result1)) {
            echo "Informations sur l'enchere ajoutée:" . "<br>";
            echo "ID: " . $data['id'] . "<br>";
            $enchere_id = $data['id'];
        }
        echo $enchere_id;
    }
    header('Location: ' . "accueilVendeur.php");
}
mysqli_close($db_handle);


?>
