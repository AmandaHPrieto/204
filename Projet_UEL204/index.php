<?php	
    //démarrage session
    session_start();
	include 'pages/inc.connexion.php';
	include './inc.functions.php';
	ini_set('display_errors', 'Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', dirname(__file__) . '/log_error_index_php.txt');

?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>AirPhP</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/styles.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&family=Sniglet&display=swap" rel="stylesheet">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>

	<body>


		<header class="bandeau ">
			<div class="row space align-center">

				<img class="header-logo" src="assets/images/logo.png" alt="logo-airphp">

				<nav>
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="pages/mes_favoris.php">Mes favoris</a></li>
						<li><a href="pages/connect.php">Me connecter</a></li>
						<li><a href="pages/inscription.php">M'inscrire</a></li>
					</ul>
				</nav>

			</div>

		</header>

<section class="section-recherche">
	<h1>AirPHP: les bonnes bases pour votre maison!</h1>
	<div class="form ">
		<form class="form-search" method="POST" action="index.php">
			<fieldset>
		 	 	<legend class="form-legend">Que recherchez vous?</legend>
			<div class="form-box column align-around">
				<div class="form-top-line line space align-center row">
		  			<div class="form-type row">
						<div class="form-item type-item">
							<label for="cat-maison">Maison<input class="form-input" type="checkbox" name="categorie[]" id="cat-maison" value="maison"><br></label>
						</div>
						<div class="form-item type-item">
							<label for="cat-appartement">Appartement<input class="form-input" type="checkbox" name="categorie[]" id="cat-appartement" value="appartement" ><br></label>
						</div>
					</div>
					<div class="form-surface form-item row">
						<label for="surface">Surface en m2<input class="form-input small" type="text" name="surface" id="surface" required><br></label>
					</div>
				</div>
				<div class="form-mid-line  space line row">
					<div class="form-city form-item  row">
						<label for="ville">Ville
							<select class="form-input med box" id="ville" name="ville" required>
								<option value=""></option>
								<option value="Limoges">Limoges</option>
								<option value="Panazol">Panazol</option>
								<option value="Couzeix">Couzeix</option>
								<option value="Feytiat">Feytiat</option>
								<option value="Condat-sur-Vienne">Condat-sur-Vienne</option>
								<option value="Le Vigen">Le Vigen</option>
								<option value="Verneuil-sur-Vienne">Verneuil-sur-Vienne</option>
								<option value="Rilhac-Rancon">Rilhac-Rancon</option>
								<option value="Boisseuil">Boisseuil</option>
							</select><br></label>
					</div>

					<div class="form-budget form-item row">
						<label for="budget">Budget
								<select class="form-input med box" id="budget" name="budget" required>
									<option value="">Votre budget max?</option>
									<option value="100000">100000€</option>
									<option value="150000">150000€</option>
									<option value="200000">200000€</option>
									<option value="250000">250000€</option>
									<option value="350000">350000€</option>
									<option value="500000€">500000€</option>
								</select><br></label>
					</div>
				</div>
				<div class="form-bottom-line justify-center line row">
					<input class="button big" type="submit" value="Trouver votre bonheur">
				</div>
			</div>	
			</fieldset>
		</form>
	</div>
</section>

<section>
	<div>
		

		<?php
			recherche();
			addFavori();
			?>

		</fieldset>
	</div>
</section>

<footer>
  <div class="row space align-center">
  <img id="logo-footer" src="assets/images/logo-footer.png" alt="logo AirPHP">

  <div class="footer-social">
    <p>Suivez-nous sur les réseaux-sociaux !</p>
      <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg></a>

<a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-youtube" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408z"/>
</svg>
      </a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4"/>
</svg></a>

</div>
</div>
</footer>


	</body>
</html>
