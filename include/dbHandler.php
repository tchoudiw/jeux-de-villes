<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1));
?>

<?php
class dbHandler{
    protected $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getDb(){
        return  $this->db;
    }
    public function estRegistre($name, $password) {
      $query = 'SELECT login, motpasse FROM joueurs WHERE\''. 
                $name.'\' = login AND \''.$password.'\' = motpasse';

      $result = $this->db->query($query);
      $items = array();
      
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
      }
     
      $result->closeCursor();
      return count($items)>=1?"true":"false";      
   }
   
   /*
   *    return array contenant le nom de tous les departements
   */
   public function getDepartements(){
        $query = 'SELECT DISTINCT ville_departement FROM villes_france_free';
        $result = $this->db->query($query);
        $items = array();
              
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }

        $departements = array(); 
        for($i = 0; $i < count($items); $i++){
            $departement = implode("",$items[$i]);
            $departements[] = $departement;

        }      
        $result->closeCursor();
       return $departements;      
   }      
   
   
   public function getDepartementAleatoire(){
        $departements = $this->getDepartements();
        $alea = rand(0 , count($departements) -1);
        return $departements[$alea];
   }
   
    public function getVilles($nbVilles, $departement, $in_out){
        $query ="";
        if($in_out == "in"){
            $query = 'SELECT ville_nom 
                        FROM villes_france_free 
                        WHERE ville_departement = \''.$departement.'\'';
        }
        else if($in_out == "out"){
        $query = 'SELECT ville_nom 
                        FROM villes_france_free 
                        WHERE ville_departement != \''.$departement.'\'';
        }
        else{return "erreur";}
        
        $result = $this->db->query($query);
        $i=0;
        $items = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
            $i++;
        }
        $result->closeCursor();

        $villes = array(); 
        for($k = 0; $k < count($items); $k++){
            $ville = implode("",$items[$k]);
            $villes[] = $ville;
        }
        $villesChoisis = array();

        $j=0;

         while($j < $nbVilles && $j<count($villes)){
            $alea = rand(0,$i-1);
            if(!in_array($villes[$alea], $villesChoisis)){
                $villesChoisis[$j] = $villes[$alea];
                $j++;
            }
        }      

        return $villesChoisis;      
   }
   
   function get_score($name, $nbrJeu)
   {
        $query = 'SELECT nbrpoint_jeu'.$nbrJeu.' FROM joueurs WHERE login = \''.$name.'\'';
        $result = $this->db->query($query);
        $items = array();
             
        $score = "";              
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            $score = implode("",$row);
        }

        $result->closeCursor();
        
        return $score;
   }
   
   function add_score($login, $add, $nbrJeu)
   {
        $score = $this->get_score($login, $nbrJeu);
        $nbrpoint = $score + $add;
        $sql = 'UPDATE joueurs SET nbrpoint_jeu'.$nbrJeu.'=? WHERE login=?';
        $q = $this->db->prepare($sql);
        $q->execute(array($nbrpoint, $login));
        
   }
   
   function get_nbr_partie($name, $nbrJeu)
   {
        $query = 'SELECT nbrpartie_jeu'.$nbrJeu.' FROM joueurs WHERE login = \''.$name.'\'';
        $result = $this->db->query($query);
        $items = array();
             
        $score = "";              
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            $score = implode("",$row);
        }

        $result->closeCursor();
        
        return $score;
   }
   
   function add_nbr_partie($login, $add, $nbrJeu)
   {
        $nbrpartie = $this->get_nbr_partie($login, $nbrJeu);
        $nbrpartie = $nbrpartie + $add;
        $sql = 'UPDATE joueurs SET nbrpartie_jeu'.$nbrJeu.'=? WHERE login=?';
        $q = $this->db->prepare($sql);
        $q->execute(array($nbrpartie, $login));
        
   }
  
   function enregistrer($login, $password)
   {
      $statement = $this->db->prepare("INSERT INTO joueurs(login, motpasse, 
                        nbrpartie_jeu1, nbrpoint_jeu1, 
                        nbrpartie_jeu2, nbrpoint_jeu2, creation)
        VALUES('".$login."','".$password."', 0,0,0,0,DEFAULT)");

        return $statement->execute();
   }
   
//**************fonction pour jeux 1 ********************************//
   function syllabeAlea($taille) {
        $syllabe = "";
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $n = strlen($alphabet);
    
        for($i=0; $i<$taille; $i++)
        {
            $syllabe .= $alphabet[ rand(0, ($n - 1)) ];
        }
    
        return $syllabe;
    }
    
    /*
    *Fonction qui renvoit true ou false si la syllabe est contenu dans le nom d'une ville
    *@param $syb  la syllabe
    *@return $items  tableau de ville sous forme clé=>valeur
    */
   function resultatSyllabe($syb){
    $symb = '%'.$syb.'%' ;
    $query = 'SELECT ville_nom FROM villes_france_free WHERE ville_nom LIKE \''.$symb.'\'' ; 
    
      $result = $this->db->query($query);
      $items = array();
      
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
      }
      $result->closeCursor();
      return $items;  
   }
 /**
 * Fontion qui génère  une syllabe alléatoirement la syllabe doit faire partir du nom d'une ville
 *  @param $taille  longueur de la syllabe 
 *  @return $syb     la bonne syllabe 
 */  
    function verifSyllabe($taille){
        $syb = $this->syllabeAlea($taille); 
        $rep = $this->resultatSyllabe($syb);
        if($rep){
            return $syb ;
        }
        else {
            while(!$rep){
                $syb = $this->syllabeAlea($taille); 
                $rep = $this->resultatSyllabe($syb);
            }
        }
        return $syb;
    }
  
/**
 * Donne la solution sous forme d'un tableau contenant le nom de la ville et la syllabe en question
 *  @param $taille  longueur de la syllabe 
 *  @return $sol     
 */  
   function solutionJeu($taille){
           
         $symb = $this->verifSyllabe($taille);
         $result = $this->resultatSyllabe($symb);
         $items = array();
         $sol = array();
         
         foreach($result as  $val) {
               $items[] = $val['ville_nom'];
         }
         $len = count($items) ;
         $nomVille = $items[rand(0, ($len - 1))];  
         $sol[]= $nomVille;   
         $sol[]= $symb ;
         return $sol;   
   }
 /**
 * Donne la solution sous forme d'une chaine de caractère contenant le statut vrai ou faux de la réponse du joueur  et le nom de la ville
 *  @param $ville  nom de la ville entrée 
 *  @param $symb  la bonne syllabe
 *  @return $sol     
 */
   function checkReponse($ville, $symb){
        $result = $this->resultatSyllabe($symb);
         $items = array();
         foreach($result as  $val) {
               $items[] = $val['ville_nom'];
         }
         $str = strtoupper($ville);
          $len = count($items) ;
         $nomVille = $items[rand(0, ($len - 1))]; 
         $in = in_array($str, $items) ?"true":"false";
         $sol = $in.'*'.$nomVille ;
         return $sol ;
   }
}
?>