<?php
session_start();
//identifier votre BDD
$database = "ebayECE";

$login = $_SESSION['id'];
$vendeur_id = "";

$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

echo 'Bonjour ' . $_SESSION['id'];

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
	echo $target_file;

	$sql = "UPDATE `vendeur` SET `backgroundPhoto`='$target_file' WHERE `login`='$login'";
	$result = mysqli_query($db_handle, $sql);
	echo "Update successful." . "<br>";
                     //on affiche le livre ajouté
	$sql = "SELECT * FROM vendeur";

	$result = mysqli_query($db_handle, $sql);
	while ($data = mysqli_fetch_assoc($result)) {
		echo "<img src=" . $data['backgroundPhoto'] . ">";
	}
	header('Location: ' . "accueilVendeur.php");
}
mysqli_close($db_handle);


?>
