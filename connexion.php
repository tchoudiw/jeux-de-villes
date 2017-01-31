<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php
/*
*   Affiche la page de connexion a l'application
*/
?>

<?php 
//session_start();
include("entete-general.php");
?>
  

	<div id="contentWrapper">
		<div class="container theme-showcase">
			<h1 class="pageTitle">Connexion</h1>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Entrez vos informations de connexion</h2>
				</div>
				<div class="panel-collapse collapse in">
					<form id="formAddEvent" role="form" action="ville.php?testConnexion=c" method="post">
						<div class="form-group row">
							<label class="col-sm-2 control-label">Nom utilisateur:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="name">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-2 control-label">Mot de passe:</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						
						<div class="form-group">
							<button class="btn btn-lg btn-primary" type="submit">Me connecter</button>
						</div>
					</form>
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


