<?
$activiteit = htmlspecialchars($_POST['Introductieweekend']);

$voornaam = htmlspecialchars($_POST['voornaam']);
$tussenvoegsel = htmlspecialchars($_POST['tussenvoegsel'])." ";
$achternaam = htmlspecialchars($_POST['achternaam']);

$telefoonnummer = htmlspecialchars($_POST['telnr']);
$emailadres = htmlspecialchars($_POST['emailadres']);

$idtype = htmlspecialchars($_POST['idtype']);
$documentnummer = htmlspecialchars($_POST['documentnummer']);
$verloopdatum = htmlspecialchars($_POST['verloopdatum']);
$geboortedatum = htmlspecialchars($_POST['geboortedatum']);
$nationaliteit = htmlspecialchars($_POST['nationaliteit']);
$geslacht = htmlspecialchars($_POST['geslacht']);

$ov = htmlspecialchars($_POST['ov']);
$mjk = htmlspecialchars($_POST['mjk']);


// combine data.
$naam = $voornaam.' '.$tussenvoegsel.$achternaam;

$inschrijvings_data = 
'
<html>
<body>
<h4>een nieuwe inschrijving voor '.$activiteit.'<br>via Kanvasamsterdam.nl</h4>
<p>
-----------------------------------------<br>
naam:<br>'.$naam.'<br>
telefoonnummer:<br>'.$telefoonnummer.'<br>
email-adres:<br><a href="mailto:'.$emailadres.'">'.$emailadres.'</a><br>
ov:<br>'.$ov.'<br>
mjk:<br>'.$mjk.'<br>
documenttype:<br>'.$idtype.'<br>
documentnummer:<br>'.$documentnummer.'<br>
verloopdatum:<br>'.$verloopdatum.'<br>
geboortedatum:<br>'.$geboortedatum.'<br>
nationaliteit:<br>'.$nationaliteit.'<br>
geslacht:<br>'.$geslacht.'<br><br>

</p>
</body>
</html>

';

$inschrijvingen_email = "buitenland@kanvasamsterdam.nl";
$checkaccount = "mail.jeroenderooij@gmail.com";

$from = "From:".$emailadres."\n";


$subject = "Een nieuwe inschrijving voor: ".$activiteit." van: ".$naam;
$headers = $from;
$headers .= "X-Mailer: PHP4\n"; //mailer
$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: text/html; charset=iso-8859-1\n";




mail(
	$inschrijvingen_email,
	$subject,
	$inschrijvings_data,
	$headers);
	
mail(
	$checkaccount,
	$subject,
	$inschrijvings_data,
	$headers);


?>


<html>
<head>

<title>KANVAS - lidmaatschaps formulier</title>
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
	
	function sluit_formulier(){
		window.parent.sluit_form();
	}
</script>
<style type="text/css">
	div.form_inners{
		width:578px;
		height:410px;
		border:1px solid #cccccc;
		margin:20px 0px 0px 0px;
	}
	div.form_datasheet{
		width:560px;
		height:390px;
		background-color:#f6f6f6;
		margin:9px 9px 9px 9px;
	}
	
</style>
</head>
<body>
<div class="layout">
	<div class="head"></div>
	<h1 class="form_title">deelname formulier:<br><? echo $activiteit; ?></h1>
	<div class="form_inners">
		<div class="form_datasheet">
			<h2 class="datasheet_inleiding">
				Bedankt voor je opgave !
			</h2>
			<p class="datasheet_inleiding" style="color:#000000;border-bottom:0px;"><br>
				Je zult zo snel mogelijk een e-mail ontvangen met alle details over betaling.<br><br><br>
				Heb je nog vragen,<br> Schroom niet en mail ons:<br>
				<a href="mailto:buitenland@kanvasamsterdam.nl">buitenland@kanvasamsterdam.nl</a>
			</p>
		</div>
	</div>
	
	<h5 onclick="javascript:sluit_formulier();">sluit formulier</h5>
</div>
</body>