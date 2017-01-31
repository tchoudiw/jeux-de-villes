<?php 

/**
* Fonction de traitement de chaîne de caractère qui formate selon le format du nom de villes 
*/
  function  enleveVide($chaine){
        $tab = "A*B*C*D*E*F*G*H*I*J*K*L*M*N*O*P*Q*R*S*T*U*V*W*X*Y*Z ";
        $tab = explode("*",$tab);
        $ch = array();
        for($i=0 ;$i<strlen($chaine); $i++){
            
            if(in_array(strtoupper ($chaine[$i]),$tab)){
                $ch[] = $chaine[$i];
            }
        }
        return implode("",$ch);
   }

 

?>
