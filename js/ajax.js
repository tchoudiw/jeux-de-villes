// ouvrir un objet XHR selon les plateformes
// (plus facile en prototype)

// return l'objet xhr ou false
function createXHR()  {
 	
    var xhr = false;

    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');  }
    catch (err1) {
        try { xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (err2) {
	    try { xhr = new XMLHttpRequest(); }
	    catch (err3) {
		request = false;
	    }
        }
    }

    return xhr;
}