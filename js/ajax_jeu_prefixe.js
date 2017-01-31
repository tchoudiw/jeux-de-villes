/*
 * Script des fonctions Ajax de la logique du jeu prefixe 
 * (trouver un ville contenat une chaine de caracter donnee )  
 */
var xhr,xhr1
var url;
var content;
var rep;
var tmp,tmp1;
var btn_jpr = document.getElementById('btn_jpr');
//var btn2 = document.getElementById('btn2');
var textArea = document.getElementsByTagName("textarea").item(0);
 var hint = document.getElementById("failtext");
 var hint1 = document.getElementById("sucesstext");
 

function animerReusi(){
 $("div#success1").show("slow").delay(1000).hide("slow");
}

function animerEchec(){
 $("div#fail1").show("slow").delay(1000).hide("slow");
}

 
 /*
  * fonction de la au server pour la demande de la syllabe aléatoire 
  */
 function connectServer1(){
    xhr = createXHR();    
    url = "donne-syllabe.php";					
	xhr.open("POST", url, true);		
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(null);  
     
 }
/*
 *  affiche la syllabe  par appel AJax et le traitement 
 */
function displaySyllabe() { 
	if(btn_jpr.innerHTML == "Nouvelle question" || btn_jpr.innerHTML == "Jouer!"){
	    btn_jpr.innerHTML = "GO!";
	    btn_jpr.removeEventListener("click", displaySyllabe);
        btn_jpr.addEventListener("click",displayResultat);
	}
	connectServer1();
	xhr.onreadystatechange = afficheSyllabe ;
}

 function afficheSyllabe(){
        var syllabe1 = document.getElementById('syllabe1') ;
        if (xhr.readyState==4){

            tmp = xhr.responseText;
//            document.getElementById("reponseAjaxAffiche").innerHTML="affiche: "+tmp;      
            tmp = tmp.split("*");
         	    if(tmp != ""){
         	       syllabe1.innerHTML = tmp[0];
         	       document.getElementById("point1").innerHTML = "Points: "+tmp[1];
         	       document.getElementById("nbr_options").innerHTML = "Chances: "+tmp[3];
         	       document.getElementById("nbr_partie").innerHTML = "Nombre de partie: "+tmp[2];         	       
     	          }
               document.getElementById("info1_div").style.display = 'inline';         	  
	          
     	}
   }
/*
 * connection au serveur pour obtenir la réponse du jeu 
 */
  function connectServer2(){
       rep = document.getElementById('rep1').value;
       xhr1 = createXHR();    
       url = "ajax-jeu-prefixe.php";
	   content = "reponse1="+rep +"&syllabe1="+tmp;   					
	   xhr1.open("POST", url, true);		
       xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   xhr1.send(content);  
     
 }
 function displayResultat() { 

	connectServer2() ;
	xhr1.onreadystatechange = jouer ;
}

/*
 * Logique de jeu 
 */
function jouer() {			    

	    if (xhr1.readyState==4){
            tmp1 = xhr1.responseText;
//    	    document.getElementById("reponseAjaxJouer").innerHTML="jouer: "+tmp1;            
            textArea.value = "";
            var reponse = tmp1.split("*");
            var tp0 = enleveVide(reponse[0]);
            var tp1 = reponse[1];

//            if(reponse[4]> 0)
//            {

         	   if(tp0 === "true")
         	   {
         	      animerReusi();
         	       hint1.style.display = 'inline';
     	           hint1.innerHTML="BRAVO!"; 
     	           hint.style.display = 'none';
     	           if(reponse[4]<= 0)
     	           {
             	      btn_jpr.innerHTML = "Nouvelle question";
     	              btn_jpr.removeEventListener("click", displayResultat);
     	              btn_jpr.addEventListener("click",displaySyllabe);
     	           }
     	      }
     	      else
     	      {
         	          animerEchec();
     	            hint.style.display = 'inline';
     	            hint.innerHTML="FAIL! une bonne réponse est : " + tp1;
                    hint1.style.display = 'none';
                    document.getElementById("nbr_options").innerHTML = "Chances: "+reponse[4];

                    if(reponse[4]<= 0)
     	            {
             	      btn_jpr.innerHTML = "Nouvelle question";
     	              btn_jpr.removeEventListener("click", displayResultat);
     	              btn_jpr.addEventListener("click",displaySyllabe);
     	           }

     	      }
     	      document.getElementById("point1").innerHTML = "Points: "+reponse[2];
         	  document.getElementById("nbr_partie").innerHTML = "Nombre de partie: "+reponse[3];
	   }
	}
   
function enleveVide(chaine){
    var ch = "";
    var ens ="falsetrue"
    for(var i = 0 ; i<ens.length ;i++)
    if(  ens.indexOf(chaine[i]) != -1){
        ch +=chaine[i]; 
    }
    return ch ;
}
 
 /*
  * Fonction qui initialise l'affichage de la page HTML 
  */
function initialise(){ 
    document.getElementById("info1_div").style.display = 'none';
   textArea.style.resize = 'none';
    hint.style.display = 'inline' ;
    hint1.style.display = 'inline' ;
 //   btn2.addEventListener("click", displaySyllabe);
    btn_jpr.addEventListener("click", displaySyllabe);
}

/*$(function(){
    $("#fail1").on("submit", function() {
      if($("input").val().length < 4) {
        $("#fail1").addClass("has-error");
        $("div.alert").show("slow").delay(4000).hide("slow");
        return false;
      }
    });
  });*/

window.addEventListener("load",initialise);
//window.addEventListener("load", displaySyllabe);
