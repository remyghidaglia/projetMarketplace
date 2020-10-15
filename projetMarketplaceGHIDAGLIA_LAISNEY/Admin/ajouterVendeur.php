<?php
//recuperer les données venant de la page HTML
$nom = isset($_POST["nom"])?$_POST["nom"] : "";
$prenom =isset($_POST["prenom"])?$_POST["prenom"]:"";
$login = isset($_POST["pseudo"])?$_POST["pseudo"] : "";
$motDePasse =isset($_POST["mdp"])?$_POST["mdp"]:"";
$profil = isset($_POST["profil"])?$_POST["profil"] : "";
$background = isset($_POST["background"])?$_POST["background"] : "";

//identifier votre BDD
$database = "ebayECE";


    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost | votre login = root |votre password = root
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
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
        echo "Utilisateur acheteur existe deja.";
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
    } 

    
     } // fermer if($db_found)
     else {
        echo "Database not found"; 
    }



//fermer la connexion
    mysqli_close($db_handle);
    ?>