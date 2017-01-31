<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php
/*
*   Fonctions pour la gestion du jeu prefixe
*/
?>

<?php 
function genererMDP ($longueur = 8){
    // initialiser la variable $mdp
    $mdp = "";
 
    // D�finir tout les caract�res possibles dans le mot de passe,
    // Il est possible de rajouter des voyelles ou bien des caract�res sp�ciaux
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
 
    // obtenir le nombre de caract�res dans la cha�ne pr�c�dente
    // cette valeur sera utilis� plus tard
    $longueurMax = strlen($possible);
 
    if ($longueur > $longueurMax) {
        $longueur = $longueurMax;
    }
 
    // initialiser le compteur
    $i = 0;
 
    // ajouter un caract�re al�atoire � $mdp jusqu'� ce que $longueur soit atteint
    while ($i < $longueur) {
        // prendre un caract�re al�atoire
        $caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
 
        // v�rifier si le caract�re est d�j� utilis� dans $mdp
        if (!strstr($mdp, $caractere)) {
            // Si non, ajouter le caract�re � $mdp et augmenter le compteur
            $mdp .= $caractere;
            $i++;
        }
    }
 
    // retourner le r�sultat final
    return $mdp;
}

// ************** fonction qui g�n�re une chaine de caract�re al�atoire ******************

    function syllabeAlea($taille) {
         $syllabe = "";
         $alphabet = "abcdefghijklmnpqrstuvwxyz";
         $n = strlen($alphabet);
     
         for($i=0; $i<$taille; $i++)
         {
             $syllabe .= $alphabet[ rand(0, ($n - 1)) ];
         }
     
         return $syllabe;
    }

    function verifSyllabe($rep , $taille){
        //$rep = syllabeAlea($taille);  
        if($rep == "true"){
            return $rep ;
        }
        else {
            while($rep != "true"){
               $rep = syllabeAlea($taille); 
            }
        }
        return $rep;
    }

   function solutionJeu($longueur){
        
         $query = 'SELECT ville_nom FROM villes_france_free' ; 
    
         $result = $this->db->query($query);
         $items = array();
         $sol = array();
         
         while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
               $items[] = $row;
         }
         $result->closeCursor();
         $len = count($items) ;
         $nomVille = $items[rand(0, ($len - 1))];
         foreach ($nomVille as $k => $v){
            $sol[] = $v ;
         } 
         $len = strlen($sol[0]);
         $plage = rand(0, ($len - $longueur -1));
         $symb = substr($sol[0],$plage,$longueur);
         $sol[]= $symb ;
     // echo "$k  -- $v".'<br/>';
         
         return $sol;  
   }
  function  enleveVide($chaine){
        $tab = "A-B-C-D-E-F-G-H-I-J-K-L-M-N-O-P-Q-R-S-T-U-V-W-X-Y-Z";
        $tab = explode("-",$tab);
        $ch = array();
        for($i=0 ;$i<strlen($chaine); $i++){
            
            if(in_array(strtoupper ($chaine[$i]),$tab)){
                $ch[] = $chaine[$i];
            }
        }
        return implode("",$ch);
   }



?>
