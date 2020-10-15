<?php
session_start();
$identifiant = $_GET['idAnnonce'];
//recuperer les données venant de la page HTML

// on recupere le prix propose par l'acheteur
$prix = isset($_POST["prixVente"])?$_POST["prixVente"] : "";
$login = $_SESSION['id'];

// la date d'aujourdhui
$today = date("Y-m-d");

//identifier votre BDD
$database = "ebayECE";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost | votre login = root |votre password = root
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
	// on ouvre la table enchere pour recuperer l'item a encherir
	$sql = "SELECT * from enchere";
	if ($identifiant != "") {
		$sql .= " WHERE itemId LIKE '%$identifiant%'";
	}
	$result = mysqli_query($db_handle, $sql);
	$data = mysqli_fetch_assoc($result);
	$prixbase=$data['prixVente'];
	echo $prixbase;

	if($prix > $prixbase){
		/* DEBUT DE LA PARTICIPATION A LA COURSE DE L'ENCHERE POUR NOTRE ACHETEUR */
		// si le prix est superieur au prix de vente alors, l'enchere peut commencer
		$startDate = $data['startDate'];
		$endDate = $data['endDate'];
		$repetition = $data['repetition'];
		$vendeurId = $data['vendeurId'];
		echo $prix;

		// on insere dans le tableau 'enchere' la nouvelle enchere proposee par cette acheteur
		$sql = "INSERT INTO enchere (startDate, endDate, prixVente, repetition, vendeurId, itemId) VALUES ('$startDate','$endDate','$prix', '$repetition', '$vendeurId','$identifiant')";
		echo $prix;
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);

		echo "Added successfully." . "<br>";

		// on update le prix de l'objet au prix propose par l'acheteur
		$sql = "UPDATE `item` SET `prix`='$prix' WHERE `idItem`='$identifiant'";
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);

		if($today >= $endDate) {

			/* DERNIER JOUR ENCHERE */

			$sql = "SELECT * from enchere ORDER BY prixVente";
			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);

			// Pour trouver le prix final : on recupere le deuxieme prix le plus cher auquel on ajoute 1
			$sql = "SELECT MAX(prixVente) AS deuxiemeMax FROM enchere WHERE prixVente < (SELECT MAX(prixVente) FROM enchere WHERE `itemID`='$identifiant')";
			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);

			/* PRIX FINAL */

			$prixFinal = $data['deuxiemeMax'];
			$prixFinal +=1;
			echo $prixFinal;

			$sql = "SELECT prix from item";
			if ($identifiant != "") {
				$sql .= " WHERE idItem LIKE '%$identifiant%'";
			}
			
			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);

			$sql = "UPDATE `item` SET `prix`='$prixFinal' WHERE `idItem`='$identifiant'";
			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);

			// On change le statut de l'item de "enchere" à "vendu"

			$statut = "panier";

			$sql = "UPDATE `item` SET `statut`='$statut' WHERE `idItem`='$identifiant'";
			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);


			/* PANIER */

			// on ajoute l'item au panier de l'acheteur
			$sql = "SELECT idAcheteur FROM acheteur WHERE (login='$login')"; 
			$result = mysqli_query($db_handle, $sql);

			
			if (mysqli_num_rows($result) == 0) {
				echo "Acheteur not found";
			} 

			else {
				while ($data = mysqli_fetch_assoc($result)) {
					$acheteur_id = $data['idAcheteur'];
				}
				echo "Id acheteur : ".$acheteur_id."";
			}

			echo $acheteur_id;

			$sql = "INSERT INTO panier (acheteurId, itemId) VALUES ('$acheteur_id','$identifiant')";
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				echo "<br>". "Informations sur l'item ajouté au panier:" . "<br>";
				echo "ID: " . $data['id'] . "<br>";
				echo "Acheteur: " . $data['acheteurId'] . "<br>";
				echo "Item: " . $data['itemId'] . "<br>";
				$item_id = $data['itemId'];
			}
			header('Location: ' . "monPanier.php");
		}
	}
	header('Location: ' . "../Acheteur/home.php");
} // fermer if($db_found)
else {
	echo "Database not found"; 
}

//fermer la connexion
mysqli_close($db_handle);
?>