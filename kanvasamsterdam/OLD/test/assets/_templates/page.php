<?
//$current_page = $_ispage;
//$current_subpage = $_isactive;

$currentDir = './assets/_content/'.$current_page.'/'; 
$allItems = scandir($currentDir); 
$validItems = array();

if(file_exists($currentDir."menu.php")){
	include($currentDir."menu.php");
}

if($current_subpage == "0"){
	$current_subpage = $_submenu[0]["link"];
}

foreach($allItems as $i){
	
	$validate = explode('.',$i);
	if(!$validate[0]){}
	elseif($validate[1] == "php"){
		$validateItem = explode('_',$validate[0]);
		if($validateItem[0] == $current_subpage ){
			$validItems[] = $validateItem[1];
		}else{}
	}
}


sort($validItems);
if($current_subpage != 'agenda'){
	$validItems_NewestFirst = array_reverse($validItems);
			foreach($validItems_NewestFirst as $item){
			include($currentDir.'/'.$current_subpage.'_'.$item.'.php');}
	}else{
			foreach($validItems as $item){
			include($currentDir.'/'.$current_subpage.'_'.$item.'.php');}
}
?>



<div class="submenu">

<? 
	if($_submenu){
	foreach($_submenu as $s){ 
	
	$mi = $s["name"];
	$li = $s["link"];
	?>

	<h2><a href="<? echo "?".$_pid."=".$_ispage."&".$_subpid."=".$li;?>"><? echo $mi; ?></a></h2>

<? } } ?>

</div>

<div class="body">
	<? if($content){ 
	   if($content && $current_subpage != 'agenda'){
	   foreach($content as $thisItem){
	   $iLayout = $thisItem["contentLayout"];	
	   
	   $iTitle = $thisItem["item_title"];
	   $iSubtitle = $thisItem["subtitle"];
	
	   $iLeftType = $thisItem["contentL_type"];
	   $iLeftContent = $thisItem["contentL"];
	
	   $iMidType = $thisItem["contentM_type"];
	   $iMidContent = $thisItem["contentM"];
		
	   $iRightType = $thisItem["contentR_type"];	
	   $iRightContent = $thisItem["contentR"];
	   	
	?>
	<div class="item_crate">
		
		<? if($iLayout != "agenda" ){?>
			<? if($iTitle != "nulla"){ ?>
		<div class="item_name">
			
			<h1><a name="<? echo $iTitle; ?>">
				<? echo $iTitle; ?>
				</a>
			</h1>
			
		</div>
		<? } ?>
		
		<div class="item_content">
		<? if($iLayout == "3col"){ ?>
		    <div class="column left" id="_01">
				<? if ($iLeftType == "image"){ ?><img src="./assets/user_images/<? echo $iLeftContent; ?>" /><? }else{ 
				if($iSubtitle != "nulla"){ echo '<h1>'.$iSubtitle.'</h1>';$titleDisplay = 1;}	
				?>
				<p><? echo $iLeftContent; ?></p>
				<? } ?>	
			</div>

		    <div class="column center" id="_02">
				<? if ($iMidType == "image"){ ?><img src="./assets/user_images/<? echo $iMidContent; ?>" /><? }else{ 
				if($iSubtitle != "nulla" && $titleDisplay == 0){ echo '<h1>'.$iSubtitle.'</h1>';$titleDisplay = 1; }	
				?>
				<p><? echo $iMidContent; ?></p>
				<? } ?>
			</div>
			
		    <div class="column right" id="_03">
				<? if ($iRightType == "image"){ ?><img src="./assets/user_images/<? echo $iRightContent; ?>" /><? }else{ 
				if($iSubtitle != "nulla" && $titleDisplay == 0){ echo '<h1>'.$iSubtitle.'</h1>';$titleDisplay = 1; }	
				?>
				<p><? echo $iRightContent; ?></p>
				<? } ?>
			</div>
			<? $titleDisplay = 0; ?>
		<? }elseif($iLayout == "files"){ 
				
				$samenvattingenDir = './assets/user_files/'; 
				$samenvattingen = scandir($samenvattingenDir); 
				$samenvattingInleiding=$thisItem["item_tekst"];
				$samenvattingItems = array();
				$samenvattingTypes = array();
				
				foreach($samenvattingen as $sv){

					$validate_sv = explode('.',$sv);
					if(!$validate_sv[0]){}
					elseif($validate_sv[1]){
							$samenvattingItems[] = $validate_sv[0];
							$samenvattingTypes[$validate_sv[0]] = $validate_sv[1];
						}else{}
				}
				
				echo "<div class=\"columnfull\" style=\"margin-left:0px;margin-bottom:20px;float:left;border-bottom:1px solid #666666;width:560px;\"><p style=\"padding-left:0px;margin-left:0px;\">".$samenvattingInleiding."</p></div><div style=\"clear:both;\"></div>";
				foreach($samenvattingItems as $svI){
			?>
			<div class="file" onclick="window.location.href='./assets/user_files/<? echo $svI.".".$samenvattingTypes[$svI]; ?>'">
				<div class="filetype <? echo $samenvattingTypes[$svI]; ?>"></div>
				<table class="filename" cellpadding="0" cellspacing="0" valign="middle">
					<tr>
						<td valign="middle">
							<? 
							$svNM = $svI;
							echo str_replace("_", "&nbsp;",$svNM); 
							?>
						</td>
					</tr>
				</table>
			</div>
			<? } }elseif($iLayout == "loopbaan"){ 
				
				$LOB_ctnt = $thisItem["loopbaan_ctnt"];
				
				
				?>
				<div class="column left" id="_01">
					<? if ($iLeftType == "image"){ ?><img src="./assets/user_images/<? echo $iLeftContent; ?>" /><? }else{ 
					if($iSubtitle != "nulla"){ echo '<h1>'.$iSubtitle.'</h1>';$titleDisplay = 1;}	
					?>
					<p><? echo $iLeftContent; ?></p>
					<? } ?>	
				</div>
				<div class="columnfull">
					<? echo $LOB_ctnt; ?>
				</div>
				
		<?	}elseif($iLayout == "other"){ ?>
			<? $otherContent = $thisItem["otherContent"]; 
				echo $otherContent; ?>
			
		<? } ?>
		</div>
		
		
<?	} ?>

</div>
	
<? } }else{
	$rowNr = 0;
	?>
	<div class="item_crate">
	 <? foreach($content as $aItem){
		
		$itemType = $aItem["itemType"];
		$startdatum = $aItem["startdatum"];
		$itemLink = $aItem["itemLink"];
		$einddatum = $aItem["einddatum"];
		$starttijd = $aItem["starttijd"];
		$eindtijd = $aItem["eindtijd"];
		$naam = $aItem["itemnaam"];
		$omschrijving = $aItem["itemomschrijving"];
		$locatie_naam = $aItem["item_location_naam"];
		$locatie_straat = $aItem["item_location_straat"];
		$locatie_huisnr = $aItem["item_location_huisnr"];
		$locatie = $locatie_naam.",<br>".$locatie_straat." ".$locatie_huisnr;
		$rowNr+=1;
	?>
	
	<div class="agendaItem <? echo $itemType; ?> <? if($rowNr == 4){echo "last";$rowNr = 0;}else{} ?>"
	<? if($itemLink != "nulla"){ ?>onclick="window.location.href='?page=nieuws&sub=nieuws#<? echo $itemLink; ?>'" <? } ?> >
		<h1><? echo $naam; ?></h1>
		<p class="datum"><? echo $startdatum; if($einddatum != "nulla"){echo " - ".$einddatum; }?> </p>
		<p class="tijd"><? echo $starttijd; if($eindtijd != "nulla"){echo " - ".$eindtijd; }?> </p>
		<p class="omschrijving"><? echo $omschrijving; ?></p>
		<p class="locatie"><? echo $locatie; ?></p>
	</div>

	<?	} ?>
	
	
	</div>
<? } } ?>
    
</div>