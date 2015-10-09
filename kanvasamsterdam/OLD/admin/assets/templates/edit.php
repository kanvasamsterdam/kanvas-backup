<?
	session_start();
	if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
		include('users.php');
		if($users[$_SESSION['user']] == $_SESSION['pass']){
?>
	<html>
		<head>
			<title>
				KANVAS | Admin / edit
			</title>
			<link rel="stylesheet" type="text/css" href="./assets/css/kanvas_admin.css"/>
			<script type="text/javascript" src="./assets/js/moo_core.js"></script>
			<script type="text/javascript" src="./assets/js/moo_more.js"></script>
			<script type="text/javascript" src="./assets/js/kanvas_admin.js"></script>
		</head>
		<body>
			<div id="logoff">
				uitloggen
			</div>
			<div style="height:30px;width:100%;"></div>
				<div id="images">
					<div class="section_title">
						afbeeldingen
					</div>
<?	
	$LOCATION = './../assets/user_images/';
	$FILES = scandir($LOCATION);
	$IMAGE_PREVIEW = '<div class="image_preview" filename="%1$s"><img src="./../assets/user_images/%1$s"/></div>';
	$IMG_ITEMS = array();
	foreach($FILES as $f){
		$fileDetails = explode('.',$f);
		if(count($fileDetails) > 1 && (
			$fileDetails[1] == 'jpg' ||
			$fileDetails[1] == 'jpeg'||
			$fileDetails[1] == 'png' ||
			$fileDetails[1] == 'gif'
			)
		){
			$IMG_ITEMS[] = $fileDetails[0].'.'.$fileDetails[1];
		}
	}
	foreach($IMG_ITEMS as $image){
		echo sprintf($IMAGE_PREVIEW,$image);		
	}
?>				
				</div>
				
				<div id="tools">
					<div class="section_title">
						tools
					</div>
					<br>
					<div class="in">
						<label>link text</label>
						<input id="link_in_text" type="text"/><br>
						<label>link naar</label>
						<input id="link_in_link" type="text"/>
					</div>
					<a href="" id="make_link"> maak link </a>
					<a href="" id="make_biglink"> maak grote link </a>
					<textarea id="link_out"></textarea>
					<div class="clear"></div>
				</div>
				
				<div id="editor">
					<div class="section_title">
						editor
					</div>
					<input type="text" id="e_title"/>
					<div id="selected_image" class="left">
						<img src="" filename="" id="e_img"/>
						<span>geen afbeelding geselecteerd</span>
					</div>
					<textarea id="e_c1" class="center"></textarea>
					<textarea id="e_c2" class="right"></textarea>
					<div class="clear"></div>
					<a id="showpreview" href="">
						toon preview
					</a>
					<a id="save" href="">
						opslaan
					</a>
					<div class="clear"></div>
				</div>
				<div id="preview">
					<div class="section_title">
						preview
					</div>
					<!-- as is on website -->
					<div class="item_crate">
						<div class="item_name">
							<h1 id="p_title"></h1>
						</div>
						<div class="item_content">
							<div class="column left" id="_01">
								<img src="" id="p_img"/>	
							</div>
							<div class="column center" id="_02">
								<p id="p_c1"></p>
							</div>
							<div class="column right" id="_03">
								<p id="p_c2"></p>
							</div>
						</div>
					</div>
					<!-- end as is on website -->
					<div class="clear"></div>
				</div>
			<div style="height:100px;width:100%;"></div>
		</body>
	</html>
<?		
		}else{
			unset($_SESSION['user']);
			unset($_SESSION['pass']);
			header('location:index.php');
			exit;
		}
	}else{
		header('location:index.php');
		exit;
	}
?>