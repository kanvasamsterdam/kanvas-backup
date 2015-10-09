<?

		if(!isset($_REQUEST["view"])){
			header('location: http://www.kanvasamsterdam.nl/nieuwsbrief/?view=online');
			exit;
		}elseif(isset($_REQUEST["view"])){
		require_once('send-email.php');
		}
?>