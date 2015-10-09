<?

$template = "
	$%s[] = array(
		\t\t\"contentLayout\" => \"3col\"\n,
		\t\t\"item_title\" => \"%s\"\n,
		\t\t\"subtitle\" => \"nulla\"\n,
		\t\t\"contentL_type\" => \"image\"\n,
		\t\t\"contentL\" => \"%s\"\n,
		\t\t\"contentM_type\" => \"text\"\n,
		\t\t\"contentM\" => \"%s\"\n,
		\t\t\"contentR_type\" => \"text\"\n,
		\t\t\"contentR\" => \"%s\"\n
	\t);\n
";

$LOCATION = './../../../assets/_content/nieuws/';

$FILES = scandir($LOCATION);
$NEWS_ITEMS = array();
foreach($FILES as $f){
	$fileDetails = explode('.',$f);
	if(count($fileDetails) > 1 && $fileDetails[1] == 'php'){
		$fileKind = explode('_',$fileDetails[0]);
		if(count($fileKind) > 1 && $fileKind[0] == 'nieuws'){
			$NEWS_ITEMS[] = $fileKind[1];
		}
	}
}
$LAST_ITEM = (int)max($NEWS_ITEMS);
$NEXT_ITEM = $LAST_ITEM + 1;
$NEXT_NEWS = 'nieuws_'.$NEXT_ITEM.'.php';

$ENT  = array('"',"'");
$WITH = array('\"',"\'");

session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
	include('./../../users.php');
	if($users[$_SESSION['user']] == $_SESSION['pass']){
		ob_start();
				echo "<?php\n\n";
				echo sprintf(
					$template,
					'content',
					$_POST['title'],
					$_POST['image'],
					str_replace($ENT,$WITH,$_POST['c1']),
					str_replace($ENT,$WITH,$_POST['c2'])
				);
				echo "\n?>";
		$FILE_CTNTS = ob_get_clean();
		ob_end_flush();
		$FILE = fopen($LOCATION.$NEXT_NEWS,'w');
				fwrite($FILE,$FILE_CTNTS);
				fclose($FILE);

		echo 'het schrijven is gelukt';
	}else{
	echo 'u heeft niet voldoende rechten';
	}
}
?>