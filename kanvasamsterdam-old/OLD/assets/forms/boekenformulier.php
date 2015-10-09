<html>
<head>

<title>KANVAS - boeken bestel formulier</title>
<script language="javascript" type="text/javascript">
	
	function bh(){
		
		document.getElementById('sendform').className = "button active";
	}
	function bho(){
		
			document.getElementById('sendform').className = "button";
	}
	function down(){
			
			document.getElementById('sendform').className = "button click";
	
	}
	
	function up(){
			
			document.getElementById('sendform').className = "button active";
	}
	
	function send(){
		
		document.bestelboeken.submit();
		
	}
	function sluit_formulier(){
		window.parent.sluit_form();
	}
	
	var isEU = 0;
	var isAW = 0;
	var isSC = 0;
	var isWF = 0;
	var isIC = 0;
	var isIK = 0;
	
	function select_books(selectedbooks){
		if(document.getElementById(selectedbooks).className != "book_vink on"){
			document.getElementById(selectedbooks).className = "book_vink on";
			
			if(selectedbooks == "europa"){
					isEU = 1;
			}
			else if(selectedbooks == "aworldhistory"){
					isAW = 1;
			}
			else if(selectedbooks == "schrijven"){
				 	isSC = 1;
			}
			else if(selectedbooks == "wetenschapsfilosofie"){
					isWF = 1;
			}
			else if(selectedbooks == "iconografie"){
					isIC = 1;
			}
			else if(selectedbooks == "Kunsttechnieken"){
					isIK = 1;
			}
			
		}
		else if(document.getElementById(selectedbooks).className == "book_vink on"){
			document.getElementById(selectedbooks).className = "book_vink off";
			
			if(selectedbooks == "europa"){
					isEU = 0;
			}
			else if(selectedbooks == "aworldhistory"){
					isAW = 0;
			}
			else if(selectedbooks == "schrijven"){
				 	isSC = 0;
			}
			else if(selectedbooks == "wetenschapsfilosofie"){
					isWF = 0;
			}
			else if(selectedbooks == "iconografie"){
					isIC = 0;
			}
			else if(selectedbooks == "Kunsttechnieken"){
					isIK = 0;
			}
		}
		//alert(isEU+" "+isAW+" "+isSC+" "+isWF);
		doSUM();
	}
	
	function doSUM(){
		var sum = 0;
		var besteldeboeken = "";
		
		if(isEU == 1){
			sum += 25.16;
			besteldeboeken = besteldeboeken+"europa: de geschiedenis van een idee, ";
			}
		if(isAW == 1){
			sum += 38.93;
			besteldeboeken = besteldeboeken+"A World History of Art, ";
			}
		if(isSC == 1){
			sum += 26.01;
			besteldeboeken = besteldeboeken+"Overtuigend schrijven, ";
			}
		if(isWF == 1){
			sum += 19.49;
			besteldeboeken = besteldeboeken+"Wetenschapsfilosofie voor Geesteswetenschappen ";
			}
		if(isIC == 1){
			sum += 17.55;
			besteldeboeken = besteldeboeken+"Hall's Iconografisch Handboek"
			}
		if(isIK == 1){
			sum += 49.50;
			besteldeboeken = besteldeboeken+"Kunsttechnieken"
			}
		
		var totalsum = (Math.round(sum*100)/100);
		if(totalsum == 0){var displayamount = "0.00"}
		else if(totalsum == 49.5){var displayamount = "49.50"}
		else{displayamount = totalsum;}
		
		document.getElementById('totaalprijs').innerHTML = "&euro;"+displayamount;
		
		
		document.bestelboeken.totalamm.value = displayamount;
		document.bestelboeken.boeken.value = besteldeboeken;
		
		//alert(document.bestelboeken.totalamm.value);
		//alert(document.bestelboeken.boeken.value);
	}
	
</script>

<link rel="stylesheet" href="http://www.kanvasamsterdam.nl/assets/forms/css/forms.css" type="text/css" />

</head>
<body>
<div class="layout">
	<div class="head"></div>
	<h1 class="form_title">boeken bestel formulier</h1>
	<div class="form_inners">
		<div class="form_datasheet">
			<h2 class="datasheet_inleiding">
				Boeken bestellen via KANVAS.
			</h2>
			<p class="datasheet_inleiding">
				Het boek 'Kunsttechnieken in Historisch Perspectief' dat eerstejaarsstudenten nodig hebben voor het vak Visuele Analyse en Kunsttechnieken is binnen. Bestel het boek hier op de website (Nota bene! Als je dat niet doet dan hebben we het niet voor je gereserveerd en kunnen we niet garanderen dat we het op voorraad hebben!). Wij leggen het boek dan klaar en je kunt het op de volgende dagen ophalen:
				<br><br>
				dinsdag 20 &amp; donderdag 22 september tussen 12.00 en 17.00
				Locatie: Kunsthistorisch Instituut, Herengracht 286, in de kantine
<br><br>
				
<br><br>
				<a href="info@kanvasamsterdam.nl">info@kanvasamsterdam.nl</a>
				<br><br>
				Let op: je kan alleen pinnen, contant afrekenen is niet mogelijk!
			</p>
			<div style="height:10px;"></div>
			<form name="bestelboeken" action="http://www.kanvasamsterdam.nl/assets/forms/boeken_bestelling.php" method="post">
			
			<table class="data" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">voornaam</td>
				<td class="input">
					<input type="text" name="voornaam" class="a"/>
				</td>
			</tr>
			</table>
			
			<table class="data snd" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">tussenvoegsel</td>
				<td class="input">
					<input type="text" name="tussenvoegsel" class="b"/>
				</td>
			</tr>
			</table>
			<table class="data" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Achternaam</td>
				<td class="input">
					<input type="text" name="achternaam" class="a"/>
				</td>
			</tr>
			</table>
			<table class="data" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Geboortedatum</td>
				<td class="input">
					<input type="text" name="geboortedatum_dag" class="c"/>&nbsp;/&nbsp;
				</td>
				<td class="input">
					<input type="text" name="geboortedatum_maand" class="c"/>&nbsp;/&nbsp;
				</td>
				<td class="input">
					<input type="text" name="geboortedatum_jaar" class="d"/>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">studentnummer</td>
				<td class="input">
					<input type="text" name="studentnummer" class="b"/>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">e-mailadres</td>
				<td class="input">
					<input type="text" name="emailadres" class="a"/>
				</td>
			</tr>
			</table>
			
			
			<div style="width:507px;border-top:1px solid #cccccc;height:10px;margin:30px 0px 0px 30px;clear:both;float:left;"></div>
			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">1<sup>e</sup> jaar</td>
				<td class="input">
				</td>
			</tr>
			</table>
			<table class="bookorder" cellpadding="0" cellspacing="0" onclick="javascript:select_books('Kunsttechnieken');">
				<tr>
					<td class="book_vink off" id="Kunsttechnieken"></td>
					<td class="book_description">
						<h3>Kunsttechnieken in Historisch Perspectief</h3>
						<p>Helen Westgeest</p>
						<h4>&euro;49,50</h4>
					</td>
				</tr>
			</tr><!--
			</table>
			<table class="bookorder" cellpadding="0" cellspacing="0" onclick="javascript:select_books('europa');">
				<tr>
					<td class="book_vink off" id="europa"></td>
					<td class="book_description">
						<h3>Europa: de geschiedenis van een idee</h3>
						<p>P.den Boer</p>
						<h4>&euro;25,16</h4>
					</td>
				</tr>
			</table>
			
			<table class="bookorder" cellpadding="0" cellspacing="0" onclick="javascript:select_books('aworldhistory');">
				<tr>
					<td class="book_vink off" id="aworldhistory"></td>
					<td class="book_description">
						<h3>A World History of Art</h3>
						<p>H. Honour wn J. Fleming</p>
						<h4>&euro;38,93</h4>
					</td>
				</tr>
			</table>
			
			<table class="bookorder" cellpadding="0" cellspacing="0" onclick="javascript:select_books('schrijven');">
				<tr>
					<td class="book_vink off" id="schrijven"></td>
					<td class="book_description">
						<h3>Overtuigend Schrijven</h3>
						<p>Van Eemeren, Garssen en Rietstap</p>
						<h4>&euro;26,01</h4>
					</td>
				</tr>
			</table>
			
			<table class="bookorder" cellpadding="0" cellspacing="0" onclick="javascript:select_books('iconografie');">
				<tr>
					<td class="book_vink off" id="iconografie"></td>
					<td class="book_description">
						<h3>Hall's Iconografisch Handboek</h3>
						<p>James Hall</p>
						<h4>&euro;17,55</h4>
					</td>
				</tr>
			</table>
		
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">2<sup>e</sup> jaar</td>
				<td class="input">
					
				</td>
			</tr>
			</table>
			<table class="bookorder" cellpadding="0" cellspacing="0" onclick="javascript:select_books('wetenschapsfilosofie');">
				<tr>
					<td class="book_vink off" id="wetenschapsfilosofie"></td>
					<td class="book_description">
						<h3>Wetenschapsfilosofie voor geesteswetenschappen</h3>
						<p>Leezenberg en de Vries</p>
						<h4>&euro;19,49</h4>
					</td>
				</tr>
			</table>
			//-->
			<!-- LET OP DIT HIERONDER NOOOOOOOOOIT WEGHALEN -->
			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">totaal prijs boekenpakket</td>
				<td class="input">
					
				</td>
			</tr>
			</table>
			
			<table class="bookorder" cellpadding="0" cellspacing="0" onclick="javascript:select_books('schrijven');">
				<tr>
					<td class="book_vink">
						<input type="hidden" name="boeken" value=""/>
						<input type="hidden" name="totalamm" value=""/>
					</td>
					<td class="book_description" style="border-left:0px;">
						<h4 id="totaalprijs">&euro;0.00</h4>
					</td>
				</tr>
			</table>
			
			<div style="width:507px;border-top:1px solid #cccccc;height:10px;margin:30px 0px 0px 30px;clear:both;float:left;"></div>
			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">ander boek:</td>
				<td class="input">
					<input type="text" class="e" name="anderboek" value="titel, auteur, ISBN-nummer" />
					
				</td>
			</tr>
			</table>
			
			
			
			<div style="width:507px;border-top:1px solid #cccccc;height:10px;margin:30px 0px 0px 30px;clear:both;float:left;"></div>
			
			
			<h3 class="button" id="sendform" onmouseover="javascript:bh();" onmouseout="javascript:bho();" onmousedown="javascript:down();" onmouseup="javascript:up();" onclick="javascript:send();">verstuur formulier</h3>
			</form>
			<div style="clear:both;height:30px;"></div>
		</div>
	</div>
	
	<h5 onclick="javascript:sluit_formulier();">sluit formulier</h5>
</div>
</body>