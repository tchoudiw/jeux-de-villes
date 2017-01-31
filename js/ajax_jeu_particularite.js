/*
 * Gère le jeu particularite (Trouver les villes d'une departement) 
 */


var nouvellePartie = false;

/****** Variable Ajax ******/
var xhr;


/****** Ajoute de fonction a l'object Array ******/
Array.prototype.inArray = function(val) {
   for(var i = 0; i < this.length; i++) {
      if(this[i] == val)
        return true;
   }
   return false;
}

function animerReusi(){
 $("div#success1").show("slow").delay(1000).hide("slow");
}

function animerEchec(){
 $("div#fail1").show("slow").delay(1000).hide("slow");
}


/****** Gestion de partie ******/
function jouer() {
    xhr = createXHR();
    
    var url = "";
    var string  = "";
    if(document.getElementById("match_fini") != null){
        url="ajax-jeu-particularite.php?nocache="+Math.random();
        nouvellePartie = true;
    }
    else{
        for(var i=0; i < 5; i++){
            var  check_box = document.getElementById("checkd"+i);
            if(check_box.checked){
                if(string==""){string = string +check_box.value;}
                else{string = string+"***"+check_box.value;}
            }
        }
        url="ajax-jeu-particularite.php?choix="+string+"&nocache="+Math.random();
    }
    xhr.onreadystatechange=stateChanged;
    xhr.open("GET",url,true);
    xhr.send();
}


function stateChanged() {
    if ((xhr.readyState==4) && (xhr.status == 200))  {
    
        var reponse = xhr.responseText;
        reponse = reponse.split(" * "); 
        
        //Reponse Vrai
        if(reponse[0].length === 11){
//	if(enleveVide(reponse[0]) == "true"){

            document.getElementById("jeu2").innerHTML = reponse[4];
            document.getElementById("donne1").innerHTML = reponse[6];
            document.getElementById("point1").innerHTML = reponse[2] +" points";
            document.getElementById('titre_form_div').style.display = "block" ;
            if(!nouvellePartie){
                animerReusi();
                nuvellePartie = false;
            }

        }
        //Reponse Faux
        else if(reponse[0].length === 12){
            if(reponse[1]==="1" || reponse[1]==="2"){         
                document.getElementById("jeu2").innerHTML = reponse[4];
                document.getElementById("donne1").innerHTML = reponse[6];           
            }
            else if(reponse[1]=="3"){
                 animerEchec();
            }
            else if(reponse[1]=="4"){
                animerEchec();
                var reponses = reponse[5].split("xxxxx");
  
                for(var i=0; i < 5; i++){
                    var  check_box = document.getElementById("checkd"+i);
                    check_box.style.color = "red";
                      
                    if(reponses.inArray(check_box.getAttribute("value"))){
                        document.getElementById("label"+i).style.color = "blue";
                    }
                 }
            }
        }

        // La partie est finie
        if(reponse[1]==="2"){
            document.getElementById('jpa1').innerHTML = "Nouvelle partie";
            document.getElementById('match_fini').style.color = "red";
            document.getElementById('match_fini').style.fontWeight = "bold";
            document.getElementById('match_fini').style.paddingTop = "10px";                    
            document.getElementById('match_fini').style.paddingBottom = "10px";
            document.getElementById('match_fini').style.textAlign = "center";
            document.getElementById('titre_form_div').style.display = "none" ;                    
        }
        // Affichage de reponse apres 3 mauvaise reponse
        else if(reponse[1]==="4"){
            document.getElementById("jpa1").innerHTML = "Continuer";
        }
        else{
            document.getElementById('jpa1').innerHTML = "GO!" ;
        }
        
        document.getElementById("point1").innerHTML =  "Points: " +reponse[2];
        document.getElementById("nbr_question").innerHTML = "Question: "+ reponse[8]+"/5";
        document.getElementById("nbr_options").innerHTML = "Chances: "+reponse[7] ;  
        document.getElementById("nbr_partie").innerHTML = "Numéro de partie: "+reponse[3] ;                  

    }
}


/****** Creation d'une nouvelle partie ******/
function nouveau_jeu() {
    xhr = createXHR();
    document.getElementById('titre_form_div').style.display = "block" ;        
 
    var url="ajax-jeu-particularite.php?nocache="+Math.random();    
    xhr.onreadystatechange=stateChanged_nouveau_jeu;
    xhr.open("GET",url,true);
    xhr.send();
}


function enleveVide(chaine){
    var ch = '';
    for (i=0;i<chaine.length;i++){
        if (chaine.charAt(i)!=' '){
            ch+=chaine.charAt(i);
        }
    }
    return ch ;
}


function stateChanged_nouveau_jeu() {
    if ((xhr.readyState==4) && (xhr.status == 200)){  
        var reponse = xhr.responseText;
        reponse = reponse.split(" * "); 
        document.getElementById("jeu2").style.paddingLeft = "10px";

        // Reponse true

        if(reponse[0].length === 11){
//        if(enleveVide(reponse[0]) == "true"){
            document.getElementById("jeu2").innerHTML = reponse[4];
            document.getElementById("jeu2").charset="utf-8";
            document.getElementById("donne1").innerHTML = reponse[6];
            document.getElementById("point1").innerHTML =  "Points: " +reponse[2];
            document.getElementById("nbr_question").innerHTML = "Question: "+ reponse[8]+"/5";
            document.getElementById("nbr_options").innerHTML = "Chances: "+reponse[7] ;            
            document.getElementById("nbr_partie").innerHTML = "Numéro de partie: "+reponse[3] ;
            document.getElementById('jpa1').innerHTML = "GO!" ;

        }
    }
}


/****** Asignationt des listeners ******/
function eventsHandler(){
    var btn4 = document.getElementById('btn4'); 
    var jpa1 = document.getElementById('jpa1');
    jpa1.addEventListener("click",jouer,false);
    btn4.addEventListener("click", nouveau_jeu, false);
}


window.addEventListener("load",eventsHandler)