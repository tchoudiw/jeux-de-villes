<?php 
header('Content-type: text/html; charset=UTF-8');
include("entete-general.php") ;
if (isset($_GET['source'])) die(highlight_file(__FILE__, 1));
/*
*   Page principale pour les jouer non enregistres
*/
?>
	<div id="contentWrapper">
		<!-- Carousel -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active" style="background-image: url('images/paris.jpg');">

					<div class="container" >
						<div class="carousel-caption">
							<h1>Jeux de villes</h1>
							<p>Le jeu de villes est une programmation de jeux de devinettes sur les villes fait au Diro</p>
							<p><a class="btn btn-lg btn-primary" href="ville.php?enregistrement=e" role="button">Enregistrement </a></p>
						</div>
					</div>
				</div>
				<div class="item" style="background-image: url('images/lyon.jpg');">
					<div class="container">
						<div class="carousel-caption">
							<h1>Des Jeux de connaissance des villes de france</h1>
							<p>Vous &ecirc;tes passionn&eacute;s des jeux de lettres sur les villes , ici vous avez la possibilit&eacute; de v&eacute;rifier vos connaissances des villes de France &agrave; travers ce jeu qui vous offre diverses devinettes &agrave; partir d'une chaine pr&eacute;cice ou d'une propri&eacute;t&eacute; donn&eacute;e.</p>
							<p>
								<a class="btn btn-lg btn-primary" href="ville.php?connexion=c" role="button">Jeux de villes</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span
				class="glyphicon glyphicon-chevron-left"></span></a> <a
				class="right carousel-control" href="#myCarousel" data-slide="next"><span
				class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		
		<div class="container theme-showcase">
			<div class="row">
		        <div class="col-md-4">
		          <h2>Trouvez la ville par une syllabe</h2>
		          <p>Dans ce jeu, vous serez amen&eacute;s &agrave; trouver les noms des villes &agrave; partir d'une d&eacute;rivation donn&eacute;e </p>
		          <p><a class="btn btn-primary" href="ville.php?connexion=c" role="button">Jeu de prefixe &raquo;</a></p>
		        </div>
		        <div class="col-md-4">
		          <h2>Trouvez une ville par des propri&eacute;t&eacute;s </h2>
		          <p>Indiquer parmi les villes affich&eacute;es &agrave; l&apos;cran, celles qui ont une propri&eacute;t&eacute; particuli&egrave;re: appartenir &agrave; un d&eacute;partement donn&eacute; ou avoir une population d&eacute;finie.  </p>
		          <p><a class="btn btn-primary" href="ville.php?connexion=c" role="button">Jeu Propri&eacute;t&eacute; de ville &raquo;</a></p>
		       </div>
		        <div class="col-md-4">
		          <h2>Inscription </h2>
		          <p>Enregistrez-vous gratuitement afin de pouvoir participer et de cr&eacute;er vos &eacute;v&eacute;nements Vivamus sed ultrices nulla. Aliquam erat volutpat. Nunc tincidunt justo. </p>
		          <p><a class="btn btn-primary" href="ville.php?enregistrement=e" role="button">Enregistrement &raquo;</a></p>
		        </div>
	      </div>
	
		</div>
	</div>

	<!-- Bootstrap core JavaScript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>