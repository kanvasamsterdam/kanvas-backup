<?

$activiteit = $_GET["activity"];
$OV = $_GET["ov"];
$MJK = $_GET["mjk"];
$ID = $_GET['id'];
$GEBOORTE = $_GET['geboorte'];
$GESLACHT = $_GET['geslacht'];

?>

<html>
<head>

<title>KANVAS - aktiviteiten formulier</title>
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
	
	function send_activity_form(){
			
		document.activityform.submit();
		
	}
	function sluit_formulier(){
		window.parent.sluit_form();
	}
	
	var ov;
	var geslacht;
	var idtype;
	var mjk;
	
	function tick( item , status ){
		
		document.getElementById(status).className = "book_vink on";
		
		if(item == "ov"){
			setStatusOV = status.replace("ov_","");
			if( ov == null ){
				ov = status;
				document.activityform.ov.value = setStatusOV; 
			}else{
				document.getElementById(ov).className = "book_vink off";
				ov = status;
				document.activityform.ov.value = setStatusOV; 
			}
		}
		else if(item == "geslacht"){
			setStatusMJK = status.replace("geslacht_","");
			if( geslacht == null ){
				geslacht = status;
				document.activityform.geslacht.value = setStatusMJK; 
			}else{
				document.getElementById(geslacht).className = "book_vink off";
				geslacht = status;
				document.activityform.geslacht.value = setStatusMJK; 
			}
		}
		else if(item == "idtype"){
			setStatusID = status.replace("idtype_","");
			if( idtype == null ){
				idtype = status;
				document.activityform.idtype.value = setStatusID; 
			}else{
				document.getElementById(idtype).className = "book_vink off";
				idtype = status;
				document.activityform.idtype.value = setStatusID; 
			}
		}
		else if(item == "mjk"){
			setStatusID = status.replace("mjk_","");
			if( mjk == null ){
				mjk = status;
				document.activityform.mjk.value = setStatusID; 
			}else{
				document.getElementById(mjk).className = "book_vink off";
				mjk = status;
				document.activityform.mjk.value = setStatusID; 
			}
		}
		
	}


	
</script>

<link rel="stylesheet" href="http://www.kanvasamsterdam.nl/assets/forms/css/forms.css" type="text/css" />

</head>
<body>
<div class="layout">
	<div class="head"></div>
	<h1 class="form_title">deelname formulier:<br><? echo $activiteit; ?></h1>
	<div class="form_inners">
		<div class="form_datasheet">
			<h2 class="datasheet_inleiding">
				Inschrijven voor Kassel.
			</h2>
			<p class="datasheet_inleiding">
				Je kunt je hier inschrijven voor het introductieweekend, je ontvangt van ons een e-mail als we je inschrijving hebben ontvangen.
				Let op, je bent pas echt ingeschreven als wij de betaling hebben ontvangen.
			</p>
			<div style="height:10px;"></div>
			<form name="activityform" action="http://www.kanvasamsterdam.nl/assets/forms/activity_handler.php" method="post">
			<input type="hidden" name="activiteit" value="<?php echo $activiteit; ?>"/>
			<table class="data" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Voornaam</td>
				<td class="input">
					<input type="text" name="voornaam" class="a"/>
				</td>
			</tr>
			</table>
			
			<table class="data snd" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Tussenvoegsel</td>
				<td class="input">
					<input type="text" name="tussenvoegsel" class="b"/>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Achternaam</td>
				<td class="input">
					<input type="text" name="achternaam" class="a"/>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">e-mailadr.</td>
				<td class="input">
					<input type="text" name="emailadres" class="a"/>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Tel. nummer</td>
				<td class="input">
					<input type="text" name="telnr" class="a"/>
				</td>
			</tr>
			</table>
<? if($GEBOORTE == "y"){ ?>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Geboortedatum </td>
				<td class="input">
					<input type="text" name="geboortedatum" class="a"/>
					<span style="font-size:11px;color:#999999;padding-top:3px;display:inline-block;margin-left:10px;">dd / mm / jjjj</span>
				</td>
			</tr>
		</table>
<? } ?>		
<? if ($ID == "y"){ ?>			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Soort Id</td>
				<td class="input">
					<input type="hidden" name="idtype" />
					<div class="book_vink off" id="idtype_id" onclick="javascript:tick('idtype',this.id);">id</div>
					<div class="book_vink off" id="idtype_paspoort" onclick="javascript:tick('idtype',this.id);">paspoort</div>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Documentnr.</td>
				<td class="input">
					<input type="text" name="documentnummer" class="a"/>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Verloopdatum</td>
				<td class="input">
					<input type="text" name="verloopdatum" class="a"/>
					<span style="font-size:11px;color:#999999;padding-top:3px;display:inline-block; margin-left:10px;">dd / mm / jjjj</span>
				</td>
			</tr>
			</table>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Nationaliteit</td>
				<td class="input">
					<input type="text" name="nationaliteit" class="a"/>
				</td>
			</tr>
			</table>
<? } ?>
<? if ($GESLACHT == "y"){ ?>
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Geslacht</td>
				<td class="input">
					<input type="hidden" name="geslacht" />
					<div class="book_vink off" id="geslacht_man" onclick="javascript:tick('geslacht',this.id);">man</div>
					<div class="book_vink off" id="geslacht_vrouw" onclick="javascript:tick('geslacht',this.id);">vrouw</div>
				</td>
			</tr>
			</table>
<? } ?>
<? if ($OV == "y"){ ?> 
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">Soort Ov,</td>
				<td class="input">
					<input type="hidden" name="ov" />
					<div class="book_vink off" id="ov_week" onclick="javascript:tick('ov',this.id);">week</div>
					<div class="book_vink off" id="ov_weekend" onclick="javascript:tick('ov',this.id);">weekend</div>
					<div class="book_vink off" id="ov_geen" onclick="javascript:tick('ov',this.id);">geen</div>
				</td>
			</tr>
			</table>
<? } ?>
<? if ($MJK == "y"){ ?>			
			<table class="data nwr" cellpadding="0" cellspacing="0">
			<tr>
				<td class="name">MJK? <sup style="color:#999999;">*</sup>,</td>
				<td class="input">
					<input type="hidden" name="mjk" />
					<div class="book_vink off" id="mjk_ja" onclick="javascript:tick('mjk',this.id);">ja</div>
					<div class="book_vink off" id="mjk_nee" onclick="javascript:tick('mjk',this.id);">nee</div>
					<span style="font-size:11px;color:#999999;padding-top:3px;display:inline-block;">* = Museum Jaar Kaart</span>
				</td>
			</tr>
			</table>
<? } ?>
			

			
			<div style="width:507px;border-top:1px solid #cccccc;height:10px;margin:30px 0px 0px 30px;clear:both;float:left;"></div>
		

			<h3 class="button" id="sendform" onmouseover="javascript:bh();" onmouseout="javascript:bho();" onmousedown="javascript:down();" onmouseup="javascript:up();" onclick="javascript:send_activity_form();">verstuur formulier</h3>
			</form>
			<div style="clear:both;height:30px;"></div>
		</div>
	</div>
	
	<h5 onclick="javascript:sluit_formulier();">sluit formulier</h5>
</div>
</body>