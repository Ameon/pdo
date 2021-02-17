<?
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
?>
<? require_once($_SERVER['DOCUMENT_ROOT']."/class/db.php");?>
<? require_once($_SERVER['DOCUMENT_ROOT']."/class/func.php");?>
<?
	$db = new DB();
	
	
	$sql = "SELECT * FROM test";
	
	$r = $db->getRows($sql);
	
	debug($r);
	
?>