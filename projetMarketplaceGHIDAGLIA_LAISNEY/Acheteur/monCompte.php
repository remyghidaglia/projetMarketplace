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
	<div class="col-sm-1">
		<h6><?php echo 'Bonjour ' . $_SESSION['id'];?></h6>
	</div>
	<div class="col-sm-1">
    </div>
	
  </div>
  
</nav>
<?php
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
  echo "error connection";
}
else{
  
  echo "Connection successful";
}

$sql = "SELECT * FROM administrateur WHERE (login='$_SESSION[id]')";
$requete= mysqli_query($conn,$sql)or die ("Erreur de connection :".mysqli_error($conn));
$data = mysqli_fetch_assoc($requete);
?>


</body>
</html>