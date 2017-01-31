<?php 
	@ob_start();
    session_start();
if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php
/*
*   Serveur pour l'execution du jeu prefixe (pas pour demarrer le jeu)
*   Verifiee la reponse du jouer et gere la partie
*/
?>

<?php include("include/db_config.php");?>
<?php include("include/dbHandler.php");?>
<?php include("helper.php");?>
<?php
    $reponse= "";

   $pref = new dbHandler($db);   
   if (isset($_POST['reponse1']) AND isset($_POST['syllabe1'])){
       $rep1 = $_POST['reponse1'];
       $syb1 =  $_POST['syllabe1'];
       
       $rep1 = trim($rep1);
       $syb1 = enleveVide($syb1);
       
       $reponse =  $pref->checkReponse($rep1, $syb1);
   }
        
    $answer = explode("*",$reponse);
    
    // Gestion de partie
    if($_SESSION['options_jeu1'] > 0)
    {
        if($answer[0]=="true")
        {
            
            $a = $_SESSION['options_jeu1'];
            $points = 10 - (3-$a)*3 ;
            $pref->add_score($_SESSION['name'],$points, "1");

            $_SESSION['options_jeu1'] = 0;
            
            $_SESSION['points_jeu1'] =  $pref->get_score($_SESSION['name'], "1");
        }
        else
        {
            $_SESSION['options_jeu1']--;
        }
    }
    echo    $reponse."*"            
            .$_SESSION['points_jeu1']."*"
            .$_SESSION['partie_jeu1']."*"
            .$_SESSION['options_jeu1'];    
?>