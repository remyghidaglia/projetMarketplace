<?php
session_start();
//identifier votre BDD
$database = "ebayECE";

$login = $_SESSION['id'];
$vendeur_id = "";
$item_id = "";
$offre_id = "";

$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if(isset($_POST['publier']) == 'publier'){
    echo 'Bonjour ' . $_SESSION['id'];

    $nom = isset($_POST["titre"])?$_POST["titre"] : "";
    $categorie =isset($_POST["categorie"])?$_POST["categorie"]:"";
    $statut = "meilleureOffre";
    $photos = "1";
    $description =isset($_POST["description"])?$_POST["description"]:"";
    $prix = isset($_POST["prixVente"])?$_POST["prixVente"] : "";

    if ($db_found) {
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

        $sql1 = "INSERT INTO meilleureOffre (prixAchat, prixVente, vendeurId, itemId) VALUES ('$prix','$prix', '$vendeur_id','$item_id')";
        $result1 = mysqli_query($db_handle, $sql1);
        echo "Add successful." . "<br>";

        $sql1 = "SELECT * FROM meilleureOffre";
        if ($vendeur_id != "") {
        //on cherche le livre avec les paramètres titre et auteur
            $sql1 .= " WHERE vendeurId LIKE '%$vendeur_id%'";

            if ($item_id != "") {
                $sql1 .= " AND itemId LIKE '%$item_id%'";
            }
        }

        $result1 = mysqli_query($db_handle, $sql1);
        while ($data = mysqli_fetch_assoc($result1)) {
            echo "Informations sur la meilleure offre ajoutée:" . "<br>";
            echo "ID: " . $data['id'] . "<br>";
            $offre_id = $data['id'];
        }
        echo $offre_id;
    }
    header('Location: ' . "accueilVendeur.php");
}
mysqli_close($db_handle);


?>
