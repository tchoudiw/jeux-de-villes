<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1));
	header('Content-Type:text/html; charset=UTF-8')
/*
*   Affiche la page principale pour les usager connectes
*/
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" >
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/paris_logo.png">              
        <title>Jeux de villes </title>
         <!-- Bootstrap core and theme CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/general.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet">
        <link href="css/addEvent.css" rel="stylesheet">
        <link href="css/connexion.css" rel="stylesheet">   
        <link href="css/boutton.css" rel="stylesheet">                                      
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head> 
    <body>
        <!-- Fixed navbar -->
		<div class="container">
				 <!-- Static navbar -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="ville.php?index1=i">Jeux de villes</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="ville.php?jeu_prefixe=jpr" class="navlink">Jeu de préfixe</a></li>
							<li><a href="ville.php?jeu_particularite=jpa"  class="navlink">Jeu de Particularité</a></li>
						</ul>
						<div class="pull-right connect">
							<ul class="navbar-nav pull-right navbar-right-links">
								<li><a href="ville.php?ville1=v" class="navlink"><?php echo $_SESSION['name']?></a></li>
								<li><a href="ville.php?deconnexion=i"  class="navlink">Déconnexion</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
        </div>
        <div id="contentWrapper">
		<div class="container theme-showcase">
			<h1 class="pageTitle">Choisir un Jeu </h1>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Jeu de préfixe ou bien un jeu de propriété particulière</h2>
				</div>
				<div class="panel-collapse collapse in">
					<div class="jumbotron">
                       <div class="container">
                          <h1>Deux jeux de ville vous attendent</h1>
                          <p>Faites le choix entre deux supers jeux deviner la ville  à base d'une chaine de caractere précise, ou bien à partir d'une propriété précise </p>
                          <p><a class="btn btn-info btn-lg" role="button" href="ville.php?jeu_prefixe=jpr">Jeu de prefixe  <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
                          <p><a class="btn btn-info btn-lg" role="button" href="ville.php?jeu_particularite=jpa">Jeu de particularité  <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
                        </div>
                      </div>
				</div>
			</div>
		</div>
	</div>


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>


