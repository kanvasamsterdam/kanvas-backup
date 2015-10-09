// JavaScript Document
function swp(id,state){
			
			var idn = "h_"+id;
			var c = "menu_item cold";
			var o = "menu_item over";
		
		if(state == 0){	document.getElementById(idn).className = c;}
		else{ document.getElementById(idn).className = o;}
	}

function sluit_form(){
	document.getElementById('form').className = "closed";
}
function open_form(thisForm,thisActivity,ov,mjk,id,geboorte,geslacht){
	document.getElementById('form').className = "open";
	
	var newLocation = 
	'./assets/forms/'+thisForm+'.php/'+
	'?activity='+thisActivity+
	'&ov='+ov+
	'&mjk='+mjk+
	'&id='+id+
	'&geboorte='+geboorte+
	'&geslacht='+geslacht;
	
	window.formulier.location.href= newLocation;
	window.scrollTo(0,0);
	
}
