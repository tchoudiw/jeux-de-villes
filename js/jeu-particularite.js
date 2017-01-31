function init(elt){
    elt.style.display = 'none' ;     
  }
  
function eventsHandler(){
    
    var btn4 = document.getElementById('btn4'); 
    var div4 = document.getElementById('jdepartement');
 
    init(div4); 

    btn4.addEventListener("click", function(){
       div4.style.display = 'inline';
    });

}

window.addEventListener("load",eventsHandler)