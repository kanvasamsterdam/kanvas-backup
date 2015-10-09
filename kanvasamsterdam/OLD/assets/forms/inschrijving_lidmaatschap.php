<?

$voornaam = htmlspecialchars($_POST['voornaam']);
$tussenvoegsel = htmlspecialchars($_POST['tussenvoegsel'])." ";
$achternaam = htmlspecialchars($_POST['achternaam']);

$geboortedatum_dag = htmlspecialchars($_POST['geboortedatum_dag']);
$geboortedatum_maand = htmlspecialchars($_POST['geboortedatum_maand']);
$geboortedatum_jaar = htmlspecialchars($_POST['geboortedatum_jaar']);

$geslacht = htmlspecialchars($_POST['geslacht']);

$studentnummer = htmlspecialchars($_POST['studentnummer']);

$adres = htmlspecialchars($_POST['adres']);
$postcode = htmlspecialchars($_POST['postcode']);
$woonplaats = htmlspecialchars($_POST['woonplaats']);

$telefoonnummer = htmlspecialchars($_POST['tel']);
$emailadres = htmlspecialchars($_POST['email']);

// combine data.
$naam = $voornaam.' '.$tussenvoegsel.$achternaam;

$inschrijvings_data = 
'
<html>
<body>
<h4>een nieuwe inschrijving via<br>Kanvasamsterdam.nl</h4>
<p>
-----------------------------------------<br>
naam:<br>'.$naam.'<br><br>
geboortedatum:<br>'.$geboortedatum_dag.' / '.$geboortedatum_maand.' / '.$geboortedatum_jaar.'<br><br>
geslacht:<br>'.$geslacht.'<br><br>
studentnummer:<br>'.$studentnummer.'<br><br>
adres:<br>'.$adres.'<br>'.$postcode.', '.$woonplaats.'<br><br>
telefoonnummer:<br>'.$telefoonnummer.'<br><br>
email-adres:<br><a href="mailto:'.$emailadres.'">'.$emailadres.'</a>
</p>
</body>
</html>

';

$inschrijvingen_email = "lidmaatschap@kanvasamsterdam.nl";
$checkaccount = "mail.jeroenderooij@gmail.com";

$from = "From:".$emailadres."\n";


$subject = "Een nieuwe inschrijving voor Kanvas : ".$naam;
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
	
	function send(){
		
		document.lid_worden.submit();
		
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
				Bedankt voor je opgave !
			</h2>
			<p class="datasheet_inleiding" style="color:#000000;border-bottom:0px;"><br>
				Je zult zo snel mogelijk een e-mail ontvangen met alle details over betaling.<br>
				Vergeet ook niet lid te worden van Simulacrum.<br><br><br>
				Heb je nog vragen,<br> Schroom niet en mail ons:<br>
				<a href="mailto:info@kanvasamsterdam.nl">info@kanvasamsterdam.nl</a>
			</p>
		</div>
	</div>
	
	<h5 onclick="javascript:sluit_formulier();">sluit formulier</h5>
</div>
</body>