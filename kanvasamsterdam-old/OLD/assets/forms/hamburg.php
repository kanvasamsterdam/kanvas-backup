<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<title>KANVAS - Inschrijving Hamburg</title>
	<link rel="stylesheet" href="http://www.kanvasamsterdam.nl/assets/forms/css/forms.css" type="text/css" />
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
			document.hamburg.submit();

		}
		function sluit_formulier(){
			window.parent.sluit_form();
		}
	</script>
</head>
<body>
<div class="layout">
	<div class="head"></div>
	<h1 class="form_title">Inschrijven voor Hamburg</h1>
	<div class="form_inners">
		<div class="form_datasheet">
			<h2 class="datasheet_inleiding">
				Leuk dat je mee wil met deze reis!
			</h2>
			<p class="datasheet_inleiding">
				Vul het onderstaande formulier zorgvuldig in, deze persoonlijke informatie hebben wij van je nodig omdat wij reserveringen moeten plaatsen.
			</p>
			<div style="height:10px;"></div>
			<form name="hamburg" action="http://www.kanvasamsterdam.nl/assets/forms/inschrijving_hamburg.php" method="post">
			
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
			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Geslacht : M/V</td>
				<td class="input">
					<input type="text" name="geslacht" class="a"/>
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
			
			
			<table class="data" cellpadding="0" cellspacing="0" >
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
			
			
			<div style="width:507px;border-top:1px solid #cccccc;height:10px;margin:30px 0px 0px 30px;clear:both;float:left;"></div>
			
			
			<h3 class="button" id="sendform" onmouseover="javascript:bh();" onmouseout="javascript:bho();" onmousedown="javascript:down();" onmouseup="javascript:up();" onclick="javascript:send();">verstuur formulier</h3>
			</form>
			<div style="clear:both;height:30px;"></div>
		</div>
	</div>
	
	<h5 onclick="javascript:sluit_formulier();">sluit formulier</h5>
</div>
</body>
