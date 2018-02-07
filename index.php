<?php
	//si le visiteur a soumis le formulaire de connexion
	if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
		if ((isset($_POST['Email']) && !empty($_POST['Email'])) && (isset($_POST['Mdp']) && !empty($_POST['Mdp']))) {

			require_once(__DIR__.'/dao/MembreDAO.class.php');
			$listeMembre = new MembreDAO();

			require_once('control/Securite.class.php');
			// si une entrée de la base contient le login / pass
			$user = $listeMembre->authentification($_POST['Email'], Securite::crypter($_POST['Mdp']));

			// si on obtient une réponse, alors l'utilisateur est un client2fodis
			if($user->getID() > 0) {
				$listeMembre->modifierStatut($user->getID(), 'CONNECTE');		// Modifier le statut.
				session_start();
				$_SESSION['user'] = serialize($user);
				header('Location: view/service.php');
				exit();
			} else {			// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
				$erreur =  '<div id="erreur">Email ou mot de passe incorrect!</div>';
			}
		} else {
			$erreur = '<div id="erreur">Veuillez remplir<br> tous les champs!!!</div>';
		}
	}

	if (isset($erreur)) echo '<br /><br />',$erreur;
?>
<!DOCTYPE html>
<html>
<head>

<?php
	require_once('view/CDN.php');
 ?>
    <link rel="stylesheet" type="text/css" href="view/css/homestylesheet.css">
	<title>SPEAKEASY</title>
</head>
<body>


	 <!-- CONTENT -->


<div class="container ct1">
	<div class="row">
		<div class="col-lg-4">

		</div>
		<div class="marque col-lg-4">
			<h1>SPEAKEASY</h1>
		</div>
		<div class="col-lg-4">

		</div>
	</div>
</div>

<div class="container ct2">
	<div class="row">
		<div class="col-lg-2">

		</div>
		<div class=" baseline col-lg-8">
			<h2>Votre messagerie visuelle intelligente</h2>
		</div>
		<div class="col-lg-2">

		</div>
	</div>
</div>

<div class="container ct3">
  <div class="row">
    <div class="col-lg-2">

    </div>
    <div class="description col-lg-8">
      <p>Speakeasy est une <span class="bold">messagerie visuelle innovante</span> qui retranscrit les messages oraux en écrit afin de garder un historique des conversations.
		Sous un format d’application web, Speakeasy permet aux utilisateurs d’avoir des échanges vocaux avec une interaction vidéo instantannée. Les conversations sont archivées pour que chaque utilisateurs puissent garder un historique.</p>
    </div>
    <div class="col-lg-2">

    </div>
  </div>
</div>

<div class="container ct4">
	<div class="row">
		<div class="col-lg-2">

		</div>
		<div class="demo col-lg-8">
			<a href=""><video alt="demo video Speakeasy" width="740" autoplay muted loop playsinline><source src="view/img/demo.mp4" type="video/mp4" /></video></a>
		</div>
		<div class="col-lg-2">

		</div>
	</div>
</div>

<div class="container ct6">
	<div class="row">
		<div class="col-lg-2">

		</div>

		<div class="col-lg-8">
			<div class="connexion">
				<form class="formulaire" action="index.php" method="POST">
					<input onfocus="currentForm = this.form;" id="inputConnexion" type="text" placeholder="  Email" class="inputEmail" name="Email"  value="<?php if (isset($_POST['Email'])) echo htmlentities(trim($_POST['Email']));?>"/> <BR><BR>

					<input  onfocus="currentForm = this.form;" id="inputConnexion" type="password" placeholder="  Mot de passe" class="inputPass" name="Mdp" value="<?php if (isset($_POST['Mdp'])) echo htmlentities(trim($_POST['Mdp']));?>"/> <BR><BR>

					<input id="btnConnexion" type="submit" name="connexion" value="Connexion"/><br><br>

					<div class="formLien">
						<a id="aMDPoublie" href="view/mdpOublie.php" style="color:#b4cc83;text-decoration: none;"><u>Mot de passe oublié </u></a>
						<a id="aSinscrire" href="view/inscription.php" style="color:#b4cc83;text-decoration: none; float: right;"><u>S'inscrire </u></a>
					</div>
					<div class="formLien800maxWidth">
						<a id="aMDPoublie" href="#" style="color:#b4cc83;text-decoration: none;"><u>Mot de passe oublié </u></a>
						<a id="aSinscrire" href="#" style="color:#b4cc83;text-decoration: none;"><u>S'inscrire </u></a>
					</div>
				</form>
			</div>

		</div>

		<div class="col-lg-2">

		</div>

	</div>
</div>

<div class="container ct5">
	<div class="row">
		<div class="col-lg-2">

		</div>

		<div class="icon col-lg-8">
			<div class="video">
				<img src="view/img/icon_3.png">
				<div>
					<h3>VIDEO</h3>
					<br />
					<p>Retrouvez vos contacts pour discuter avec eux par vidéo</p>
				</div>
			</div>
			<div class="chat">
				<img src="view/img/icon_2.png">
			</div>
			<div class="tag">
				<img src="view/img/icon_1.png">
			</div>
		</div>

		<div class="col-lg-2">

		</div>

	</div>
</div>










    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script type="text/javascript" src="javascript.js"></script>

</body>
</html>
