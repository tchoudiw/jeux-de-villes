<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); 
	header('Content-Type:text/html; charset=UTF-8')
/*
*   Entete pour les pages des joueurs non connectes
*/
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang ="en">
    <head>
        <meta charset= "utf-8"> 
 <!--       <meta http-equiv="Content-Type" ontent="text/html; charset= utf-8">  -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/paris_logo.png">              
        <title>Jeux de villes</title>
         <!-- Bootstrap core and theme CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/general.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet">
        <link href="css/addEvent.css" rel="stylesheet">
        <link href="css/connexion.css" rel="stylesheet"> 
        <link href="css/carousel.css" rel="stylesheet"> 
		<link href="css/demo.css" rel="stylesheet">
	 
		<!-- Yamm styles-->
		<link href="css/yamm.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
                        <li><a href="ville.php?connexion=c" id="navlink">Jeu de préfixe</a></li>
                        <li><a href="ville.php?connexion=c"  id="navlink1">Jeu de Particularité</a></li>
                    </ul>
					<div class="pull-right connect">
                        <a class="btn btn-primary" href="ville.php?enregistrement=e" role="button">Enregistrez-vous</a>
                        <a class="btn btn-default" href="ville.php?connexion=c" role="button">Connexion</a>
                    </div>
				  </div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			  </nav>
            </div>
        