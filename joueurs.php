<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>
<?php include("include/db_config.php");?>
<?php include("include/dbHandler.php");?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
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
        <link href="css/connexion.css" rel="stylesheet">   
        <link href="css/boutton.css" rel="stylesheet">  
        <link href="css/joueurs.css" rel="stylesheet">                                     
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head> 
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand navlink" href="ville.php">Jeux de villes</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
          
                        <li><a href="joueurs.php"  class="navlink">Base des Joueur</a></li>
                    </ul>
                    <div class="pull-right connect">
                        <ul class="navbar-nav pull-right navbar-right-links">
                            <li>Administrateur</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="contentWrapper">
		<div class="container theme-showcase">
			<h1 class="pageTitle">Information sur les Joueurs </h1>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Affichage des Noms , points, nombre de parties </h2>
				</div>
				<div class="panel-collapse collapse in">
					<div class="jumbotron">
                       <div class="container" "col-lg-10 col-lg-offset-1">
                          <?php 
                                 $pref = new dbHandler($db); 
                                 //echo $pref->afficheJoueur();
                                 //echo $reponse ;
                             $query = "SELECT * FROM `joueurs`";
                             $result = $pref->getDb()->query($query);
                               echo '<table border="1">';  

                               while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                 if (!isset($keys)) { // header 
                                   $keys = array_keys($row);
                                   echo "<tr><th>". implode("</th><th>",$keys) . "</th></tr>";
                                 }
                             
                                 // contenu
                                 $values = array_values($row);
                                 echo "<tr><td>". implode("</td><td>",$values) . "</td></tr>";
                             
                               }
                               echo '</table>';
      
                          ?>
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


