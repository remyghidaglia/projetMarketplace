<!DOCTYPE html>
<html>
<?php
session_start();
?>
<!--utlisier $_SESSION['IdArt'] pour recup mon id -->
<head>
  <title>Encherir</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
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
<style>
  /* General button style */
.btn {
  border: none;
  font-family: 'Lato';
  font-size: inherit;
  color: inherit;
  background: none;
  cursor: pointer;
  padding: 25px 80px;
  display: inline-block;
  margin: 15px 30px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 700;
  outline: none;
  position: relative;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

.btn:after {
  content: '';
  position: absolute;
  z-index: -1;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

/* Pseudo elements for icons */
.btn:before {
  font-family: 'FontAwesome';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  position: relative;
  -webkit-font-smoothing: antialiased;
}


/* Icon separator */
.btn-sep {
  padding: 25px 60px 25px 120px;
}

.btn-sep:before {
  background: rgba(0,0,0,0.15);
}

/* Button */
.btn-4 {
  background: #34495e;
  color: #fff;
}

.btn-4:hover {
  background: #2c3e50;
}

.btn-4:active {
  background: #2c3e50;
  top: 2px;
}

.btn-4:before {
  position: absolute;
  height: 100%;
  left: 0;
  top: 0;
  line-height: 3;
  font-size: 140%;
  width: 60px;
}

/* Icons */

.icon-send:before {
  content: "\f1d8";
}
/*****************globals*************/
body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; 
        }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; 
      } 
    }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; 
        }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; 
}
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; 
  }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; 
    }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; 
    }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0;
       }

.tab-content {
  overflow: hidden; 
}
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */
  </style>
  </head>
<body>
  <?php
  $identifiant = $_GET['idAnnonce'];
  $name = $_POST['nom'];
  $statut = "enchere";
  
  //$identifiant = 12335;

  //identifier votre BDD
  $database = "ebayECE";

  $login = $_SESSION['id'];
  $acheteur_id = "";

  $db_handle = mysqli_connect('localhost', 'root', 'root');
  $db_found = mysqli_select_db($db_handle, $database);


 ?>
 <div class="topnav" id="myTopnav" >
  <b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
    <b class="active"><?php echo  $_SESSION['id'];?></b>
    <form class="form-inline col-sm-12">
      <input class="form-control mr-sm-1 col-sm-2" type="search" placeholder="Explorez par catégories" aria-label="Search">
      <button class="search" type="submit">Search</button>
    </form>
  </div>

<div class="space"></div>
  <div class="container">
    <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1">

  <?php
  if ($db_found) {

    // on recupere l identifiant de lacheteur 
    $sql = "SELECT idAcheteur FROM acheteur WHERE (login='$login')"; 
    $result = mysqli_query($db_handle, $sql);

    //tester s'il y a de résultat
    if (mysqli_num_rows($result) == 0) {
      echo "Acheteur not found";
    } 
    else {
      $sql = "SELECT * FROM item";
      $result = mysqli_query($db_handle, $sql);

      if (mysqli_num_rows($result) == 0) {
          echo "Item do not exists.";
      } else {
        $sql = "SELECT * FROM item WHERE (statut = '$statut' AND idItem = '$identifiant')";
;        $result = mysqli_query($db_handle, $sql);
        while($data = mysqli_fetch_assoc($result)) {
          echo "<img src=". $data['photos'] .">";
        
?>            </div>
            </div>
          </div>
          <div class="details col-md-6">
            <h3 class="product-title"><?php echo $data['nom'];?></h3>
            <div class="rating">
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </div>
              <span class="review-no">63729 reviews</span>
            </div>
            <p class="product-description"><?php echo $data['description']?></p>
            <h4 class="price">CURRENT PRICE <br><span><?php echo $data['prix']?> €</span></h4>
            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
            <h5>Quel prix maximal souhaitez-vous encherir ?</h5>
            <form action="enchereItem.php?idAnnonce=<?php echo $data['idItem'];?>" method="post">
                <div class="form-group"style="text-align:center;margin-bottom:40px;">
                  <input type="number" class="form-control"name="prixVente" required>
                </div>
                 <input type="submit" class="btn btn-secondary btn-block icon-send" value="encherir" name="encherir">
                  </div>
                </div>
              </div>
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
      }
    }
  }
  mysqli_close($db_handle);
  ?>
</body>
</html>