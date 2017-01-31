<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); 
	header('Content-Type:text/html; charset=UTF-8')
/*
*   Affiche la page html du jeu prefixe
*/
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang = "en">
    <head>
        <meta charset= "utf-8"> 
 <!--       <meta http-equiv="Content-Type" ontent="text/html; charset= utf-8">  -->
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
        <link href="css/instruction.css" rel="stylesheet">                                       
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
						<a class="navbar-brand" href="ville.php?ville1=v">Jeux de villes</a>
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
		    <br/>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Jeu de chaîne de caractères</h2>
				</div>
                <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-0">
                            <h2 id="instructions1_title">Instructions</h2>                                
                        </div>                          
                    <div class="col-lg-4 col-lg-offset-0" id="info1_div">
                        <button id="info1" class="btn btn-info btn-large ">
                            <span id="point1" class="badge"></span> 
                            <span id="nbr_options" class="badge"></span> 
                            <span id="nbr_partie" class="badge"></span>
                        </button>
                    </div>         
                </div>
                        
                <div id="play1">
                    <div class="row">
                        
                        <div class="col-lg-6 col-lg-offset-0">
                            <dl id ="instructions1">
                                <dt>Jeu:</dt>
                                <dd>Taper le nom d'une ville qui contient la chaine de caractère 
                                    indiqué dans le formulaire.</dd>
                                <dt>Partie:</dt>
                                <dd>La partie est composée de 1 question.</dd>
                                <dd>Chaque question a 3 chances pour trouver la bonne réponse.</dd> 
                                <dd>Si après 3 essais vous ne trouvez pas la solution, une solution sera affichée.</dd>                                                                        
                                <dt>Ponctuation:</dt>
                                <dd>1 er essai: 10 points.</dd>
                                <dd>2 ème essai: 7 points.</dd>
                                <dd>3 ème essai: 4 points.</dd>
                                <dd>3 errreus: 0 points.</dd>
                            </dl>
                        </div>
                    
                        <div id="form_jpa2" class="col-lg-4 col-lg-offset-0">
                            <form  class="form-inline well" method="post" action="">
                                <div class="form-group">
                                    <p id="question">
                                        <span id = "texteq" >Saisissez une ville qui contient la chaine: </span> 
                                        <span id= "syllabe1"></span>
                                    </p>
                                    <textarea  class="form-control" placeholder="Texte ici" name = "reponse1" id ="rep1" rows="1" cols="30"></textarea>
                                    <p id="btn_jpr"  class="btn btn-primary pull-right">Jouer!</p>
                                </div>
                            </form>
                                                                       
                            <div id="fail1" class="alert alert-block alert-danger"  style="display:none">
                                <h4 id ="failtext"></h4>  
                            </div>
                            <div id="success1" class="alert alert-block alert-success"  style="display:none">
                                <h4 id= "sucesstext"></h4> 
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
		</div>
	</div>
	
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js" ></script>
	<script src="js/jquery-ui-1.10.4.custom.min.js" ></script>
	<script src="js/bootstrap.js" ></script>
	<script src="js/jquery.js" ></script> 
	<script src="js/ajax.js" type="text/javascript"></script> 
	<script src="js/ajax_jeu_prefixe.js" type="text/javascript"></script> 

</body>
</html>


