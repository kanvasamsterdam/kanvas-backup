<?
	if(isset($_POST['user']) && isset($_POST['pass'])){
		include('users.php');
		if($users[$_POST['user']] == $_POST['pass']){
			session_start();
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['pass'] = $_POST['pass'];
			header('location:index.php');
			exit;
		}
	}else{
?>
	<html>
		<head>
			<title>KANVAS | admin</title>
			<link rel="stylesheet" type="text/css" href="./assets/css/kanvas_admin.css"/>
		</head>
		<body>
			<form id="login" name="login" action="" method="post">
				<label for="user">Gebruikersnaam</label>
				<input type="text" name="user"/>
				<label for="pass">Wachtwoord</label>
				<input type="password" name="pass"/>
				<a href="javascript:document.login.submit();">
					inloggen
				</a>
			</form>
		</body>
	</html>
<?		
	}
	
?>