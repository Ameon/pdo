<?
	function test($a =[]){
		if(is_array($a) && !empty($a)){
			echo $a;
		}else{
			echo "массив пустой";
		}
	}
	
?>
<?
	test();
?>