<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php
/*
*   Verification des usager qui se connectent 
*/
?>

<?php    
require_once('include/db_config.php');
require_once('include/dbHandler.php');
    
$name = $_POST['name'];
$password = $_POST['password'];
if(!isset($dbHandler))
{
    $dbHandler = new dbHandler($db);
}

$isRegistre = $dbHandler->estRegistre($name, $password);

if($isRegistre == "true")
{
    $_SESSION['name']=$name;

    if(isset($nouveauMembre))           //variable définie à enregistrer.php
    {
        require 'ville1.php';           //page d'accueil des nouveaux membres
    }
    else
    {
        require 'ville1.php';
    }  
}
else
{
    require 'connexion.php';
}
?>