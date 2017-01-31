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
 
    // Définir tout les caractères possibles dans le mot de passe,
    // Il est possible de rajouter des voyelles ou bien des caractères spéciaux
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
 
    // obtenir le nombre de caractères dans la chaîne précédente
    // cette valeur sera utilisé plus tard
    $longueurMax = strlen($possible);
 
    if ($longueur > $longueurMax) {
        $longueur = $longueurMax;
    }
 
    // initialiser le compteur
    $i = 0;
 
    // ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
    while ($i < $longueur) {
        // prendre un caractère aléatoire
        $caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
 
        // vérifier si le caractère est déjà utilisé dans $mdp
        if (!strstr($mdp, $caractere)) {
            // Si non, ajouter le caractère à $mdp et augmenter le compteur
            $mdp .= $caractere;
            $i++;
        }
    }
 
    // retourner le résultat final
    return $mdp;
}

// ************** fonction qui génère une chaine de caractère aléatoire ******************

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
