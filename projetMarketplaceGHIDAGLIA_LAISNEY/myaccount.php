<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">
<script type="text/javascript">
$(document).ready(function(){
$('.header').height($(window).height());
});
</script>
</head>
<body>
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

   $sql = "Select* From administrateur WHERE (login='$_SESSION[idAdmin]')";
   $rqt= mysqli_query($conn,$sql)or die ("Mon message d'erreur presonnalisÄ‚Â©:".mysqli_error($conn));
   $data = mysqli_fetch_assoc($rqt);
}

?>

</body>
</html>