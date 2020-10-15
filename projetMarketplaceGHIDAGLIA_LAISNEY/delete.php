<?php
$data = $_POST['idVendeur'];
$data1 = $_POST['nom'];
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
}
else{
	
	echo "connection success";
}
$sql = "DELETE FROM `vendeur` WHERE `idVendeur`=$data";
if ($conn->query($sql) == true) 
{ 
    echo "Records updated successfully.";
    header('Location: ' . "GestionVendeurs.php?");	
} 
else
{ 
    echo "ERROR: Could not able to execute $sql. "
    .$conn->error; 
} 


$conn->close();

?>

 /*
            //identifier votre BDD
        $database = "ebayECE";

//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost | votre login = root |votre password = root
        $db_handle = mysqli_connect('localhost', 'root', 'root');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
          $sql = "SELECT * FROM vendeur";

          $result = mysqli_query($db_handle, $sql);
          echo '<td><button class="valid" type="button">Ajouter</button>';
          while ($data = mysqli_fetch_assoc($result)) {
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $data['idVendeur'] . '</td>';
            echo '<td>' . $data['nom'] . '</td>';
            echo '<td>' . $data['prenom'] . '</td>';
            echo '<td>' . $data['login'] . '</td>';
            echo '<td>' . $data['password'] . '</td>';
            echo '<td><button class="valid" type="button" value="'.$data['idVendeur'].'" name="IdVrefuse">Supprimer</td>';;
            echo '</tr>';
            echo '</tbody>';
    } //fermer while

  } else {
    echo "Database not found"; 
}//fermer la connexion
mysqli_close($db_handle);*/