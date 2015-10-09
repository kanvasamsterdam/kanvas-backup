<?
	session_start();
	if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
		include('users.php');
		if(isset($users[$_SESSION['user']]) && $users[$_SESSION['user']] == $_SESSION['pass']){
			ob_start();
			include('./assets/templates/edit.php');
			$OUT = sprintf('%s',ob_get_clean());
		}else{
			ob_start();
			include('./assets/templates/login.php');
			$OUT = sprintf('%s',ob_get_clean());
			unset($_SESSION['user']);
			unset($_SESSION['pass']);
		}
	}else{
		ob_start();
		include('./assets/templates/login.php');
		$OUT = sprintf('%s',ob_get_clean());
	}
	
	echo $OUT;
?>