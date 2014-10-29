<!--
function inicializar(){
	 document.getElementById("formularioOpinion").style.display="none";
}

function esEntero(numero){  
 	if (isNaN(numero)){
        return false;
    } 
    else{
        if (numero % 1 == 0) {
        	if (0 < numero){
            	if (11 > numero){
            		return true;
            	}
        	}
        }
        else{
            return false;
        }
    }
}

function opinar(){
	document.getElementById("formularioOpinion").style.display="block";
}

function validarDatos(){
	var nombreOpinion = document.getElementById("nombreOpinion").value;
	var preferOpinion = document.getElementById("preferOpinion").value;
	var puntOpinion = document.getElementById("puntOpinion").value;
	var AutosOpinion = document.getElementById("AutosOpinion").value;
	var PrecioOpinion = document.getElementById("PrecioOpinion").value;
	var leyOpinion = document.getElementById("leyOpinion").value;
	var opinionOpinion = document.getElementById("opinionOpinion").value;
	if ((nombreOpinion != "") && (opinionOpinion =! "") && (preferOpinion != "") && (puntOpinion != "") && (AutosOpinion != "") && (preferOpinion != "")
		&& (leyOpinion != "")){
		if ((esEntero(preferOpinion)) && (esEntero(puntOpinion)) && (esEntero(AutosOpinion)) && (esEntero(PrecioOpinion)) && (esEntero(leyOpinion))) {
			document.getElementById("formularioOpinion").submit();
		} else {
			alert("Por favor complete con datos correctos");
		}
	} else {
		alert("Por favor complete todos los campos");
	}	
}
--> 
