<?


/* hierarchie */

$_pid = "page";
$_subpid= "sub" ;

/* check if some part of the hierarchie is set, else value = 0 */
if(!isset($_REQUEST[$_pid])){$_ispage = "nieuws";}else{$_ispage = $_REQUEST[$_pid];}
if(!isset($_REQUEST[$_subpid])){$_isactive = 0;}else{$_isactive = $_REQUEST[$_subpid];}

$current_page = $_ispage;
$current_subpage = $_isactive;

?>

<?

function Get_currentPAGE() {
 $current_p = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $current_p .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $current_p .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $current_p .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ;
 }
 return $current_p;
}


function trim_adr($str, $remove=null) 
{ 
    $str    = (string)$str; 
    $remove = (string)$remove;    
    
    if(empty($remove)) 
    { 
        return rtrim($str); 
    } 
    
    $len = strlen($remove); 
    $offset = strlen($str)-$len; 
    while($offset > 0 && $offset == strpos($str, $remove, $offset)) 
    { 
        $str = substr($str, 0, $offset); 
        $offset = strlen($str)-$len; 
    } 
    
    return rtrim($str);    
}

/* home dir */
$homedir = trim_adr( Get_currentPAGE() , "?".$_SERVER['QUERY_STRING'] );

$self = "parent.location.href=";

?>


<? 

$_menu[] = array( 
		
		"name" => "nieuws", 
		"link" => "nieuws" );
		
$_menu[] = array( 

		"name" => "de vereniging", 
		"link" => "vereniging");

$_menu[] = array( 

		"name" => "onderwijs", 
		"link" => "onderwijs");

$_menu[] = array( 
		
		"name" => "loopbaan", 
		"link" => "loopbaan");


$_menu[] = array( 
		
		"name" => "media", 
		"link" => "links" );

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index,follow">
<meta name="description" lang="nl" content="Nieuws,de Vereniging, onderwijs, loopbaan, links">
<meta name="keywords" content="Nieuws,Vereniging,Onderwijs,Loopbaan,Algemene Cultuur Wetenschappen, Master, N.A.G.K.S., NAGKS">

<title>KANVAS - Studievereniging voor de Kunstgeschiedenis Amsterdam<? if($_ispage !== 0){echo " | ".$_ispage; }else{echo " |  home";} ?></title>
<link rel="shortcut icon" href="./assets/images/favicon_kanvas.png" />
<link rel="stylesheet" href="./assets/css/styles.css" type="text/css" />
<script language="javascript" type="text/javascript" src="./assets/js/nomoo.js"></script>


</head>
<body>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-16661092-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	<a name="top"></a>
	<div id="form" class="closed">
		<div class="form_top"></div>
		<div class="form_left"></div>
		<div class="form_content">
			<iframe class="kanvas_forms" name="formulier" scrolling="auto">

			</iframe>
		</div>
		<div class="form_right"></div>
		<div class="form_bottom"></div>
	</div>
	<div class="head">
    	<div class="homelink" onclick="<? echo $self;?>'<? echo $homedir; ?>'" alt="home">
        	
        </div>
    </div>
    <div class="menu">
    <? foreach($_menu as $m){	
			
			$mi = $m["name"];
			$li = $m["link"];
			
			?>
    
        <div class="menu_item <? if($li == $current_page ){echo "active";}else{echo "cold";} ?>"
	 	
       		 onclick="<? echo $self;?>'?page=<? echo $li; ?>'"
			<? if($li == $current_page ){}else{ ?>
             onmouseover="javascript:swp('<? echo $li ?>',1);"
             onmouseout="javascript:swp('<? echo $li ?>',0);"
         <? } ?>
             id="h_<? echo $li; ?>">
        
        	<h1><? echo $mi; ?></h1>
        	<div class="bottom_bar"></div>
        
        </div>
    
	<? } ?>
    
    </div>
<?

include('./assets/_templates/page.php');

?>
   	<div class="page_closing">
    	<div class="fsp"></div>
    	<div class="footer"><a href="<? echo $homedir; ?>" class="copyright"><img src="./assets/images/kanvas_copylogo.gif" align="top"/> &copy 2009 </a>/<a href="http://www.drga.nl" class="copyright" target="_blank"> design &amp; realisatie, DRGA </a>/<a href="#top" class="copyright"> top of page</a></div>
    </div>



</body>
</html>
