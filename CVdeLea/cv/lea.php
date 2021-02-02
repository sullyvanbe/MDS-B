<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<title> Contacter l&eacutea </title>
	<link rel="stylesheet" type="text/css" href="cv.css">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

	<?php
		echo "hello world";

		/*
		je-code.com/desinscription.php?mail=lealignel@gmail.com
		$_GET["mail"]

		créer une page de désinscription
		recup le mail dans l'url
		connection bdd
		suppression(DELETE)
		message de confirmation de désinscription
		
		*/
		if ( isset($_POST["envoie"]) ) {
			if($_POST["message"]=='' || !isset($_POST["message"]) ){
				echo "veillez remplir le champ message";
			}
			else{
			mail('lealignel@gmail.com','coucou MDS', $_POST["message"]);
			echo '<script type="text/javascript">alert(\'envoyé\');</script>';
			echo "Message envoyé, merci!";
				if(isset($_POST["autorise"])){
					if(!isset($_POST['mail'])){
						$_POST['mail']='';
					}
					$adresseMail = $_POST['mail'];
					$message = $_POST["message"];
					$db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci','carp310M');
					$result = $db->prepare('INSERT INTO mdsLignel (mail, message) VALUES (:adresseMail, :message)');
					$result->execute(array('adresseMail' => $adresseMail, 'message' => $message));
				}
			}
		}

	?>
	
	<h1>Contact </h1>
	<form method="post" action="#"  name="contact" onsubmit="return envoie()">


		

		<!--choix de la langue-->
		<select>
			<option>FR</option>
			<option>UK</option>
			<option>BE</option>
		</select> <br>

		<section class="middle">

		Mr <input type="radio" name="civilité"> 
		Ms <input type="radio" name="civilité"> 
		Autre <input type="radio" name="civilité"> <br><br>

		Nom : <br> <input type="text" name="nom" placeholder=" Prénom nom" autofocus="autofocus"> <br> <br><!--marquer du texte dans la case / mettr le curseur dans la case-->
		
		Age : <br> <input type="number" name="age"> <br><br>

		Mail : <input type="email" name="mail"> <br><br>

		Téléphone : <input type="tel" name="téléphone"> <br><br>

		Message : <textarea name="message"></textarea> <br> <br><!--rendre la case obligatoire-->

		<input type="checkbox" name="autorise" id="form-autorisation">
		<label for=" form-autorisation"> Je vous autorise à conserver mes coordonées</label><br><br>

		<input type="submit" value="send mail" name="envoie"> <br> <!-- boutton pour envoyer le formulaire-->
		</section>

	</form> <br>
	<a href="suppression.php"> Supprimer le mail </a> <br>

	<!--lien poour permettre de revenir sur la page de présentation -->
	<a href="index.html"> Revenir sur mon CV </a>

</body>

</html>