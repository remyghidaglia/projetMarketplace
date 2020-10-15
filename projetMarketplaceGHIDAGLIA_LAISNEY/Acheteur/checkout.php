<!DOCTYPE html>
<html>
<?php session_start();
$login = $_SESSION['id'];
?>

<head>
	<title>Checkout</title>
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
<style>
  .parent{
    text-align: center;
    background-color: #01717C;
    color:white;
    padding: 5px;
    border-bottom: grey;
    padding-left:5px;
    width:100%;
  }
  .enfant{
    margin-top: 10px;
    font-size: 15px;
  }
  .enfant img{
    width:20%;
    border-radius: 30px;
  }
  .enfant p{
    margin: 5px;
  }
  .enfant
  {
    display: none;
  }

  .parent:hover .enfant{
    display:block;
  }
</style>

</head>
<body>
	<div class="topnav" id="myTopnav" >
    <b class="active"><img src="../img/logomarket.jpg" alt="ECEmarketplace" style="width:100px;"></b>
    <b class="active"><?php echo  $_SESSION['id'];?></b>
    <a>
      <form class="form-inline col-sm-12">
        <input class="form-control mr-sm-1 col-sm-8" type="search" placeholder="Explorez par catégories" aria-label="Search">
        <button class="btn btn-outline-blue " type="submit">Search</button>
      </form>
    </a>
    <a class="active" href="monPanier.php"><img src="../img/panier.png" alt="ECEmarketplace" style=" height:50px; width:50;;"></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <div class="parent">Mon Compte
    <div class="enfant">
      <img src="../Vendeur/uploads/account.png">
      <p><?php echo 'Bonjour ' . $_SESSION['id'];?>, vous êtes connecté en tant que Acheteur.</p>
    </div>
  </div>

  <div class="space"></div>
  <div class="wrapper"style="color:white;">
    <h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;">RECAPITUALITF DE VOTRE PANIER</h3>
    <div class="container">
      <table id="cart" class="table table-hover table-condensed">
        <thead>
          <tr>
            <th style="width:40%">Nom</th>
            <th style="width:10%">Categorie</th>
            <th style="width:10%">Prix</th>
            <th style="width:10%">Statut</th>
            <th style="width:10%">Supprimer</th>
          </tr>
        </thead>
        <?php

          //identifier votre BDD
        $database = "ebayECE";
        $acheteur_id = "";

        $db_handle = mysqli_connect('localhost', 'root', 'root');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
          $sql = "SELECT idAcheteur FROM acheteur WHERE (login='$login')"; 
          $result = mysqli_query($db_handle, $sql);
           //tester s'il y a de résultat
          if (mysqli_num_rows($result) == 0) {
          } 

          else {
            while ($data = mysqli_fetch_assoc($result)) {
              $acheteur_id = $data['idAcheteur'];
            }
            $sql = "SELECT * FROM panier";
            if ($acheteur_id != "") {
              $sql .= " WHERE acheteurId LIKE '%$acheteur_id%'";
              $result = mysqli_query($db_handle, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                $sql1 = 'SELECT * FROM `acheteur` Where idAcheteur='.$acheteur_id.'';
                $result1 = mysqli_query($db_handle, $sql1);
                $data1 = mysqli_fetch_array($result1);

                $item_id= $data['itemId'];
                $sql2 = 'SELECT * FROM `item` Where idItem='.$item_id.'';
                $result2 = mysqli_query($db_handle, $sql2);
                while($data2 = mysqli_fetch_array($result2)){ ?>

                  <tbody>
                    <tr>
                      <td data-th="Nom">
                        <div class="row">
                          <div class="col-sm-4"><img src="<?php echo $data2["photos"] ?>" alt="..." class="img-responsive"/></div>
                          <div class="col-sm-10">
                            <h4 class="nomargin"><?php echo $data2['nom'];?></h4>
                            <p><?php echo $data2['description'];?>.</p>
                          </div>
                        </div>
                      </td>
                      <td data-th="Categorie" style="text-align:center";>
                        <div class="row">
                          <p><?php echo $data2['categorie'];?></p>
                        </div>
                      </td>
                      <td data-th="Prix" style="text-align:center";>
                        <div class="row">
                          <p><?php echo $data2['prix'];?></p>
                        </div>
                      </td>
                      <td data-th="Statut" style="text-align:center";>
                        <p><?php if($data['statut']=="vendu") { echo "FELICITATIONS ! Vous avez remporté l'enchère !"; } else if ($data['statut']=="meilleureOffre") { echo "FELICITATIONS ! Vous maîtrisez l'art de la négociation à la perfection !"; } else if ($data['statut']=="enchere") { echo "FELICITATIONS ! Vous avez remporté l'enchère !"; } else { echo "Achetez ce bien maintenant !"; } ?>
                      </td>
                      <td data-th="Supprimer" style="text-align:center";>
                       <a href="supprimerPanier.php?idAnnonce=<?php echo $data2['idItem'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                       </td>
                     </tr>
                   </tbody>
                 </div>
                 <?php
               }}
               $sql3 = "SELECT SUM(prix) AS total from panier,item WHERE item.idItem=panier.itemId";
               $result3 = mysqli_query($db_handle, $sql3);
               while($data3 = mysqli_fetch_array($result3)) {?>
               </table>
               <table>      
                <tfoot>
                  <tr>
                    <div style="font-size:30px; text-decoration: underline;">TOTAL: <?php echo $data3['total'];}}}}?> €</div>
                  </tr>
                  <tr>
                    <td><a href="acheter.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="space"></div>

      <div class="row" style="justify-content:center;">
        <div class="col-sm-5 wrapper"style="color:white;justify-content:center;">
          <form action="paiement.php" method="POST" enctype="multipart/form-data">
           <div class="container">
            <div class="row justify-content-lg-center">
             <div class="col-lg-6">

              <h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;margin-top:40px;">Lieu de livraison</h3>

              <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="text" class="form-control"
               placeholder="Nom" name="nom" required>
             </div>

             <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="text" class="form-control"
               placeholder="Prénom" name="prenom" required>
             </div>

             <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="text" class="form-control"
               placeholder="Adresse 1" name="adresse1" required>
             </div>
             <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="text" class="form-control"
               placeholder="Adresse 2" name="adresse2" >
             </div>
             <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="text" class="form-control"
               placeholder="Pays" name="pays" required>
             </div>
             <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="text" class="form-control"
               placeholder="Ville" name="ville" required>
             </div>
             <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="number" class="form-control"
               placeholder="Code postal" name="codepostal" required>
             </div>
             <div class="form-group"style="text-align:center;margin-bottom:40px;">
               <input type="tel" class="form-control" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"
               placeholder="Téléphone" name="telephone" required>
             </div>
           </div>
         </div>
       </div>
       <div class="space"></div>
     </form>
   </div>
   <div class="col-sm-6 wrapper"><form action="paiement.php" method="POST" enctype="multipart/form-data">
    <div class="container">
      <div class="row justify-content-lg-center">
        <div class="col-lg-7 " style="color:white;justify-content:center;">

          <h3 class="feature-title"style="text-align:center;margin-bottom:40px;color:white;margin-top:40px;">Information paiement</h3>

          <form>
            <div class="form-group ">
              <input type="text"  class="form-control" name="titulaire"placeholder="Titulaire" required>
            </div>
            <div class="form-group ">
              <input type="text" class="form-control" name="codeSecurite"placeholder="CVV" required>
            </div>
            <div class="form-group" name="numeroCarte">
              <input type="text" class="form-control"pattern="[0-9]{13,16}" name="numeroCarte"placeholder="Numéro de Carte" required> <!-- PATTERN AFIN DE DEMANDER A L'UTILISATEUR OBLIGATOIREMENT UN NOMBRE ENTRE 12 ET 16 (le nbre de caracètere d'une CB) -->
            </div>            
            <div class="form-group" name="dateExpiration">
              <label>Expiration Date</label>
              <select>
                <option value="01">January</option>
                <option value="02">February </option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <select>
                <option value="20"> 2020</option>
                <option value="21"> 2021</option>
                <option value="22"> 2022</option>
                <option value="23"> 2023</option>
                <option value="24"> 2024</option>
              </select>
            </div>
            <div class="form-group"style="color:white;margin-bottom:40px;">
             <table>
               <td>Type de Paiement :</td>
               <td>
                 <input type="radio" name="typeCarte" value="visa"><img src="../img/visa.jpg"style="margin-left: 5px;"><br>
                 <input type="radio" name="typeCarte" value="masterCard"><img src="../img/mastercard.jpg"style="margin-left: 5px;"> <br>
                 <input type="radio" name="typeCarte" value="americanExpress"><img src="../img/american.png"style="margin-left: 5px;"><br>
                 <input type="radio" name="typeCarte" value="payPal"> <img src="../img/paypal.png"style="margin-left: 5px;"><br><br>
               </td>
             </table>
           </div>
           <div class="form-group ">
            <button type="submit"  class="btn btn-danger btn-block" name="Confirmer"style="color:white;margin-bottom:40px;">Confirmer Paiement</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="space"></div>
</form>
</div>
</div>


<div class="space"></div>
<div class="footer" style="border-top : 1px solid grey;  justify-content: space-between;display:flex;background-color:white;">
 <div class="infoFooter">
  <p><a href="../contact.html">Contact</a></p>
</div>
<div class="infoFooter">
  <div class="text-right"><a style="text-decoration:none; " href="home.php"><p >Retourner à la page d'accueil</p></a></div>
</div>
</div>
</body>
</html>