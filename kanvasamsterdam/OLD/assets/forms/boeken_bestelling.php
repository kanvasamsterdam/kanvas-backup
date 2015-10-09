<?

$voornaam = htmlspecialchars($_POST['voornaam']);
$tussenvoegsel = htmlspecialchars($_POST['tussenvoegsel'])." ";
$achternaam = htmlspecialchars($_POST['achternaam']);

$geboortedatum_dag = htmlspecialchars($_POST['geboortedatum_dag']);
$geboortedatum_maand = htmlspecialchars($_POST['geboortedatum_maand']);
$geboortedatum_jaar = htmlspecialchars($_POST['geboortedatum_jaar']);

$studentnummer = htmlspecialchars($_POST['studentnummer']);

$emailadres = htmlspecialchars($_POST['emailadres']);

$besteldeboeken = htmlspecialchars($_POST['boeken']);
$totaalbedrag = htmlspecialchars($_POST['totalamm']);

$anders = htmlspecialchars($_POST['anderboek']);

// combine data.
$naam = $voornaam.' '.$tussenvoegsel.$achternaam;

$boekenbestellen_data = 
'
<html>
<body>
<h4>Een boekenbestelling van:'.$naam.'</h4>
<p>
-----------------------------------------<br>
naam:<br>'.$naam.'<br><br>
geboortedatum:<br>'.$geboortedatum_dag.' / '.$geboortedatum_maand.' / '.$geboortedatum_jaar.'<br><br>
studentnummer:<br>'.$studentnummer.'<br><br>
e-mailadres:<br>'.$emailadres.'<br><br>
bestelde de volgende boeken:
-----------------------------------------<br>
'.$besteldeboeken.'<br>
ter waarde van: '.$totaalbedrag.'<br><br>
tevens bestelde hij het volgende, niet in de lijst staande boek:<br>
'.$anders.'
</p>
</body>
</html>

';

$boekenbestellen_email = "boeken@kanvasamsterdam.nl";
$check_email = "mail.jeroenderooij@gmail.com";

$from = "From:".$emailadres."\n";


$subject = "Een boekenbestelling van : ".$naam;
$headers = 	$from;
$headers .= "X-Mailer: PHP4\n"; //mailer
$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: text/html; charset=iso-8859-1\n";




mail(
	$boekenbestellen_email,
	$subject,
	$boekenbestellen_data,
	$headers);

mail(
	$check_email,
	$subject,
	$boekenbestellen_data,
	$headers);


?>


<html>
<head>

<title>KANVAS - boeken bestel formulier</title>
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
	<h1 class="form_title">boeken bestel formulier</h1>
	<div class="form_inners">
		<div class="form_datasheet">
			<h2 class="datasheet_inleiding">
				Je bestelling is geplaatst !
			</h2>
			<p class="datasheet_inleiding" style="color:#000000;border-bottom:0px;"><br>
				De boeken zijn af te halen op het:
				<br>Kunsthistorisch instituut,
				<br>Herengracht 286, in de kantine
				
				<br><br>we berichten je zo snel mogelijk over de data van de boekverkoop.<br>
 				Let op: Je kunt alleen pinnen!
			</p>
		</div>
	</div>
	
	<h5 onclick="javascript:sluit_formulier();">sluit formulier</h5>
</div>
</body>