<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">
  <script type="text/javascript">
    $(document).ready(function(){
      $('.header').height($(window).height());
    });
  </script>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
</head>
<body>

  <div class="topnav" id="myTopnav" >
    <b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
    <a>
      <form class="form-inline col-sm-12">
        <input class="form-control mr-sm-1 col-sm-8" type="search" placeholder="Explorez par catégories" aria-label="Search">
        <button class="btn btn-outline-blue " type="submit">Search</button>
      </form>
    </a>
  </div>

  <!-- https://stackoverflow.com/questions/36933107/stretch-image-to-fit-full-container-width-bootstrap -->
  <?php
  $categorie = $_SESSION['categorie'];
  $ferraille = $_SESSION['ferraille'];
  $musee = $_SESSION['musee'] ;
  $vip = $_SESSION['vip'];

  /identifier votre BDD
  $database = "ebayECE";

  $login = $_SESSION['id'];

  $db_handle = mysqli_connect('localhost', 'root', 'root');
  $db_found = mysqli_select_db($db_handle, $database);
  if ($db_found) {

  if($cat==1){
  echo '<div class="container-fluid px-0 pl-5"><div class="row"><div class="col-lg-3 " id="left-column"><table><td>';

    if($ferraille==0)
    {
      echo '<tr>  <input class="checkbox" type="checkbox" id="tick1" unchecked><label for="tick1">Ferraille ou Tresor</label></tr>';
    }

    if($musee==1)
    {
      echo '<tr>  <input class="checkbox" type="checkbox" id="tick1" checked><label for="tick1">Bon pour le musee</label></tr>';
    }

    if($vip==0)
    {
      echo '<tr>  <input class="checkbox" type="checkbox" id="tick2" unchecked><label for="tick2">VIP</label></tr>';
    }

    $sql = "SELECT * FROM item WHERE (categorie="ferraille") || (categorie="musee") ";
  }
  $result = mysqli_query($db_handle, $sql);

  $Ids = array();

  while ($data = mysqli_fetch_assoc($result)) {

  array_push($Ids,$data['idItem']);

}


for ($i = 0; $i < sizeof($Ids); $i++)

{
  if ($db_found) {
  $sql = "SELECT img1 FROM multimedia WHERE idItem = $Ids[$i] ";
}

$result = mysqli_query($db_handle, $sql);
$data = mysqli_fetch_assoc($result);

echo '<div class="col-xs-4 col-sm-3 col-md-2 box" name="'.$Ids[$i].'"><a href="product.php"><img src="'.$data['Im1'].'" alt="Pic"></a><p class=\"HiddenText\">Aperçu</p></div>';
}
echo '</div></div></div>';
}

?>




<?php

if($cat!=1){
echo '<div class="container-fluid px-0 pl-5">

  <div class="row">
    <div class="col-sm-12 " id="left-column">';
      $cat = $_SESSION['cat'];
      $fer = $_SESSION['fer'];
      $musee = $_SESSION['musee'] ;
      $vip = $_SESSION['vip'];

      /identifier votre BDD
      $database = "ebayECE";

      $login = $_SESSION['id'];

      $db_handle = mysqli_connect('localhost', 'root', 'root');
      $db_found = mysqli_select_db($db_handle, $database);
      if($kat==2){

      if ($db_found) {
      $sql = "SELECT * FROM item WHERE Type = 3 ";
    }
  }

  if($kat==3){

  if ($db_found) {
  $sql = "SELECT * FROM articles WHERE Type = 4 ";
}
}

if($kat==4){

if ($db_found) {
$sql = "SELECT * FROM articles WHERE Type = 5 ";
}
}
$result = mysqli_query($db_handle, $sql);

$Ids = array();

while ($data = mysqli_fetch_assoc($result)) {

array_push($Ids,$data['IdArt']);

}


for ($i = 0; $i < sizeof($Ids); $i++)

{
  if ($db_found) {
  $sql = "SELECT Im1 FROM multimedia WHERE IdArt = $Ids[$i] ";
}

$result = mysqli_query($db_handle, $sql);
$data = mysqli_fetch_assoc($result);

echo '<div class="col-xs-4 col-sm-3 col-md-2 box" name="'.$Ids[$i].'"><a href="product.php"><img src="'.$data['Im1'].'" alt="Pic"></a>
  <p class=\"HiddenText\">Aperçu</p>
</div>';





}



echo '</div>

</div>

</div>';
}

?>
}

?>



<div class="space"></div>
<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;">
  <div class="infoFooter">
    <p><a href="contact.html">Contact</a></p>
  </div>
  <div class="infoFooter">
    <div class="text-right"><a style="text-decoration:none; " href="../homepage.html"><p >Retourner à la page d'accueil</p>
    </a>
  </div>
</div>
</div>
</body>
</html>