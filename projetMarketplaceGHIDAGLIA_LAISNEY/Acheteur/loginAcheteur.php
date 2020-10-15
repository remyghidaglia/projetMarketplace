<?php

if(isset($_POST['connect']) == 'connect'){

    if(isset($_POST["pseudo"])  && isset($_POST["mdp"])){

       $login = isset($_POST["pseudo"])?$_POST["pseudo"]:"";
       $motDePasse=isset($_POST["mdp"])?$_POST["mdp"]:"";

       $servername = "localhost";
       $username = "root";
       $password = "root";
       $dbname = "ebayECE";

       $mysqli = new mysqli($servername, $username, $password, $dbname);


        // Check connection
       if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    } else {

       echo "Connection Successful";
   }


    // Perform query 
   if ($result = $mysqli -> query("SELECT * FROM acheteur WHERE (login='$login' && password='$motDePasse')")) {

    echo "Returned rows are: " . $result -> num_rows;

        // Free result set
    $result -> free_result();
    session_start();
    $_SESSION['id'] = $login;
    header('Location: ' . "home.php");
} else {
    echo 'Mauvais pseudo/mot de passe';
}


$mysqli -> close();


}
}

?>