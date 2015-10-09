<html>
<head>

<title>KANVAS - lidmaatschaps formulier</title>
<link rel="stylesheet" href="http://www.kanvasamsterdam.nl/assets/forms/css/forms.css" type="text/css" />
<style type="text/css">
	body{overflow:hidden;}
</style>
<script language="javascript">
	
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
		
		document.lid_worden.submit();
		
	}
	
	function cleardata(idname){
		var crt = document.lid_worden.adres.value;
		if(crt == "straatnaam, huisnr."){
			document.lid_worden.adres.value = "";
		}else{
			document.lid_worden.adres.value = crt;
		}
	}
	
	function sluit_formulier(){
		window.parent.sluit_form();
	}
</script>
</head>
<body>
<div class="layout">
	<div class="head"></div>
	<h1 class="form_title">lidmaatschaps formulier</h1>
	<div class="form_inners">
		<div class="form_datasheet">
			<h2 class="datasheet_inleiding">
				Leuk dat je lid wilt worden van Kanvas!
			</h2>
			<p class="datasheet_inleiding">
				Vul het onderstaande formulier zorgvuldig in, wij zullen je daarna een e-mail sturen met alle informatie die je verder nodig hebt.
 			
			</p>
			<div style="height:10px;"></div>
			<form name="lid_worden" action="http://www.kanvasamsterdam.nl/assets/forms/inschrijving_lidmaatschap.php" method="post">
			
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
			<table class="data nwr" cellpadding="0" cellspacing="0" >
			<tr>
				<td class="name">man / vrouw</td>
				<td class="input">
					<input type="text" name="geslacht" class="d"/>
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
			
			<table class="data nwr" cellpadding="0" cellspacing="0" >
			<tr>
				<td class="name">adres</td>
				<td class="input">
					<input type="text" name="adres" class="a" value="straatnaam, huisnr." onfocus="javascript:cleardata('adr');" id="adr"/>
				</td>
			</tr>
			</table>
			<table class="data snd" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">postcode</td>
				<td class="input">
					<input type="text" name="postcode" class="b"/>
				</td>
			</tr>
			</table>
			<table class="data" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">woonplaats</td>
				<td class="input">
					<input type="text" name="woonplaats" class="a"/>
				</td>
			</tr>
			</table>
			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Telefoon nr.</td>
				<td class="input">
					<input type="text" name="tel" class="a"/>
				</td>
			</tr>
			</table>
			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">e-mail adres</td>
				<td class="input">
					<input type="text" name="email" class="a"/>
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