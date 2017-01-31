<?php 
	@ob_start();
    session_start();
if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php
/*
*   Serveur pour le jeu particularite
*   (Chercher choiser les villes appartenat a un departement donne)
*/
?>

<?php   
header('Content-type: text/html; charset=UTF-8');
function getJeu2($dbHandler)
{
    $departement = $dbHandler->getDepartementAleatoire();
    $nbVilles = rand(1,4);
    $villesOk = $dbHandler->getVilles($nbVilles, $departement, "in");
    $villesKo = $dbHandler->getVilles(5-count($villesOk), $departement, "out");
    
    $villesOkSansSpace = array();
    for($i=0 ; $i < count($villesOk) ; $i++)
    {
        $villesOkSansSpace[] = str_replace(" ","_",$villesOk[$i]);            
    }
            
    $_SESSION['villesOk'] = $villesOkSansSpace;  
    $_SESSION['villesKo'] = $villesKo;
    $_SESSION['solutionAffichee'] = "false";
    
    $villes = array_merge($villesOk, $villesKo);
    $villes = array_merge($villesOk, $villesKo);    
    shuffle($villes);

    $html = "";
    
    for($i = 0 ; $i < count($villes); $i++)
    {
        $html =$html."<div class=\"checkbox\"><p id=\"label".$i."\">
            <input type=\"checkbox\" id=\"checkd".$i."\" value=\"".
            str_replace(" ","_",$villes[$i])."\">".$villes[$i].
            "</p></div>";
    }

    $solution= "";
    for($i = 0 ; $i < count($villesOkSansSpace); $i++)
    {
        $solution =$solution."<li>".$villesOkSansSpace[$i]."</li>"; 
    }
    
    $solution = "<ul id=\"solution\">.$solution.</ul>";

//    $solution = implode(" *** ", $villesOkSansSpace);
    return $html." * ".$solution." * ".$departement;
}


function isOptionsFinish()
{
    if($_SESSION['nbr_essais_du_match']<=1 )
    {
        return TRUE;
    }
    return FALSE;
}


function isMatchFinish()
{
    if($_SESSION['match_du_partie']>=5 )
    {
        return TRUE;
    }
    return FALSE;
}


//Evaluation de la reponse du joueur
if(isset($_GET['choix']))
{
    require('include/db_config.php');
    require('include/dbHandler.php');
    $dbHandler = new dbHandler($db);
    $choix = $_GET['choix'];
    $choix = explode("***",$choix);
//    if(count($choix)==count($_SESSION['villesOk']))
 //   {
        $reponse = "true";  // bon reponse
        for($i =0; $i < count($_SESSION['villesOk']) ; $i++)
        {
            if(!in_array($_SESSION['villesOk'][$i],$choix)){
                $reponse = "false"; //mauvasse reponse
            }
        }
        
        if(count($choix)!= count($_SESSION['villesOk']))
        {
            $reponse = "false";
        }
        
        if($reponse=="true")
        {
            $a = $_SESSION['nbr_essais_du_match'];
            $points = 10 - (3-$a)*3 ;
            $_SESSION['points_match'] =$_SESSION['points_match'] + $points; 
            $dbHandler->add_score($_SESSION['name'],$points,"2");
            if(isMatchFinish())
            {   
                $score = $dbHandler->get_score($_SESSION['name'],"2");
                $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");
               
                $reponse = 
                    $reponse." * "
                    ."2"." * "
                    .$score." * "
                    .$nbr_partie." * "
                    ."<h3 id=\"match_fini\">La partie est finie</h3><dl><dt>Résumé: </dt><dd>- Points obtenu:".$_SESSION['points_match']."</dd><dd>- Numéro de partie juée: ".$nbr_partie."</dd></dl>"." * "
                    ."null"." * "     //  pour la case Solution
                    ."null"." * "     //  pour la case departement
                    .$_SESSION['nbr_essais_du_match']." * "
                    .$_SESSION['match_du_partie'];
                echo utf8_encode($reponse);

            }
            else
            {   
                $_SESSION['nbr_essais_du_match'] = 3;
                $_SESSION['match_du_partie'] = $_SESSION['match_du_partie'] +1;
                $nouveau_jeu = getJeu2($dbHandler);
                $score = $dbHandler->get_score($_SESSION['name'],"2");
                $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");
                                
                $reponse = 
                    $reponse." * "
                    ."1"." * "
                    .$score." * "
                    .$nbr_partie." * "
                    .$nouveau_jeu." * "   // inclu la solution  et deprtement
                    .$_SESSION['nbr_essais_du_match']." * "
                    .$_SESSION['match_du_partie'];
                echo $reponse;
            }
        }
        else
        {
            $score = $dbHandler->get_score($_SESSION['name'],"2");
            $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");
                    
            if(isMatchFinish() && isOptionsFinish())
            { 
                $score = $dbHandler->get_score($_SESSION['name'],"2");
                $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");              
        
                $reponse = 
                    $reponse." * "    //false
                    ."2"." * "
                    .$score." * "
                    .$nbr_partie." * "
                    ."<h3 id=\"match_fini\">La partie est finie</h3><dl><dt>Résumé: </dt><dd>- Points obtenu:".$_SESSION['points_match']."</dd><dd>- Numéro de partie juée: ".$nbr_partie."</dd></dl>"." * "
                    ."null"." * "          //  pour la case Solution
                    ."null"." * "          //  pour la case departement
                    .$_SESSION['nbr_essais_du_match']." * "
                    .$_SESSION['match_du_partie'];
                echo utf8_encode($reponse);
            }
            else if(isOptionsFinish() && $_SESSION['solutionAffichee']=="false")  /// si les options sont finis et pas encore affiche envoyer la solution   // if les options sont finis et deja affiche envoyer un nouveu jeu  //solution estAffiche
            {   $_SESSION['solutionAffichee']="true";
                $score = $dbHandler->get_score($_SESSION['name'],"2");
                $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");                
                
                $reponse =  
                    $reponse." * "
                    ."4"." * "
                    .$score." * "
                    .$nbr_partie." * "
                    ."null"." * "
                    .implode("xxxxx", $_SESSION['villesOk'])." * "      //solution
                    ."null"." * "
                    .$_SESSION['nbr_essais_du_match']." * "
                    .$_SESSION['match_du_partie'];
                echo utf8_encode($reponse);
            }
            else if(isOptionsFinish() && $_SESSION['solutionAffichee']=="true"){
                $_SESSION['solutionAffichee']="false";
                $_SESSION['match_du_partie'] = $_SESSION['match_du_partie'] + 1;
                $_SESSION['nbr_essais_du_match'] = 3;
                $nouveau_jeu = getJeu2($dbHandler);
                $score = $dbHandler->get_score($_SESSION['name'],"2");
                $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");                

                echo  
                    $reponse." * "
                    ."1"." * "
                    .$score." * "
                    .$nbr_partie." * "
                    .$nouveau_jeu." * "      //inclu la solution et departement
                    .$_SESSION['nbr_essais_du_match']." * "
                    .$_SESSION['match_du_partie'];            
            }
            else
            {
                $_SESSION['nbr_essais_du_match'] = $_SESSION['nbr_essais_du_match'] - 1;                
                $score = $dbHandler->get_score($_SESSION['name'],"2");
                $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");                
                
                echo 
                    $reponse." * "
                    ."3"." * "
                    .$score." * "
                    .$nbr_partie." * "
                    ."null"." * "      //reste dans le match
                    .implode("xxxxx", $_SESSION['villesOk'])." * "      //solution
                    ."null"." * "      //departement
                    .$_SESSION['nbr_essais_du_match']." * "
                    .$_SESSION['match_du_partie'];      
            }
        }
}
else // Generation d'un nouveau jeee
{
    require('include/db_config.php');
    require('include/dbHandler.php');
    
    $_SESSION['match_du_partie']="1";
    $_SESSION['nbr_essais_du_match'] = "3";
    $_SESSION['points_match'] = 0;
    
    $dbHandler = new dbHandler($db);
    $dbHandler->add_nbr_partie($_SESSION['name'],1,2);
    
    $score = $dbHandler->get_score($_SESSION['name'],"2");
    $nbr_partie = $dbHandler->get_nbr_partie($_SESSION['name'],"2");             
    echo 
        "true"." * "
        ."1"." * "
        .$score." * "
        .$nbr_partie." * "
        .getJeu2($dbHandler)." * "      //nouveau jeu." * ".solution
        .$_SESSION['nbr_essais_du_match']." * "
        .$_SESSION['match_du_partie'];
}
?>