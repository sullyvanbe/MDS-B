alert('hello Mds');

function coucou(){
	var monPrenom= "Léa";
	alert("hello Mds "+ monPrenom +"!")
}

function majorite(){
var age=28;

	if(age <18){
		alert("mineur");
}
	else if (age>18){
		alert("majeur");
}
}

function envoie(){
	alert(document.forms["contact"]["message"].value);


	let message=document.forms["contact"]["message"].value;
	if(message==null || message==""){
	alert('merci de remplir le champ message');
	return false;
	}
}