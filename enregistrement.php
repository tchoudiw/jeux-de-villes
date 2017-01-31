<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php
/*
*   Affiche la page de enregistrement d'un nouveau usager
*/
?>

<?php include("entete-general.php") ;?>
	<div id="contentWrapper">
		<div class="container theme-showcase">
			<h1 class="pageTitle">Enregistrement</h1>
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Entrez vos information de cr&eacute;ation de compte </h2>
				</div>
				<div class="panel-collapse collapse in">
					<form id="formAddEvent" role="form" action="ville.php?enregistrer=e" method="post">
	
						<div class="form-group">
							<label class="col-sm-3 control-label">Nom d'utilisateur:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name ="name" placeholder="Exemple : jacksparrow" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Mot de passe:</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password"  placeholder="Choisissez un mot de passe s&eacute;cure" required>
							</div>
						</div>
	
						<div class="form-group description">
							<label class="col-sm-3 control-label">Description:</label>
							<div class="col-sm-9">
								<textarea class="form-control" placeholder="Falcultatif : D&eacute;crivez-vous bri&egrave;vement si vous souhaitez laisser une impression aux autres membres"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<button class="btn btn-lg btn-primary" type="submit">Cr&eacute;er mon compte</button>
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

