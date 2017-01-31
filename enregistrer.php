<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php
/*
*   Execute l'enregistrement d'un noueveau jouer dans la base de donnees 
*/
?>

<?php    
require_once('include/db_config.php');
require_once('include/dbHandler.php');
    
$name = $_POST['name'];
$password = $_POST['password'];
$dbHandler = new dbHandler($db);

$dbHandler->enregistrer($name, $password);

$nouveauMembre = TRUE;      //pour être utilisé à 'testConnexion.php'

require 'testConnexion.php';

?>