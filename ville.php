<?php
	@ob_start();
    session_start();
	if (isset($_GET['source'])) die(highlight_file(__FILE__, 1));
	/*
*   Page qui gere l'url ville.php
*   Toues les pages sont redictionnes par cette page enfonction du parametre get
*/

if(isset($_GET['jeu']))
{
    if($_GET['jeu']=="1")
    {
        require 'ville/body_jeu1.php';
    }
     else if($_GET['jeu']=="2"){
     
        require 'ville/body_jeu2.php';
    }
    else
    {
        echo "<p>le jeu n'existe pas</p>";
        require 'ville/body_accueil.php';
    }
}
else if(isset($_GET['index1']))
{
    require 'index1.php';
}
else if(isset($_GET['connexion']))
{
    require 'connexion.php';
}
else if(isset($_GET['enregistrement']))
{
    require 'enregistrement.php';
}
else if(isset($_GET['testConnexion']))
{
    require 'testConnexion.php';
}
else if(isset($_GET['enregistrer']))
{
    require 'enregistrer.php';
}
else if(isset($_GET['ville1']))
{
    require 'ville1.php';
}
else if(isset($_GET['jeu_particularite']))
{
    require 'jeu-particularite.php';
}
else if(isset($_GET['jeu_prefixe']))
{
    require 'jeu-prefixe.php';
}
else if(isset($_GET['deconnexion']))
{
    $_SESSION = array();
    session_destroy();
    require 'index1.php';
}
else
{
    require 'index1.php';
}
?>