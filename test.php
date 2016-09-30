<?php
	$a = "/^\d+(\.{0,1}\d+){0,1}$/";	//非负数
	$b = preg_match($a,'-2');
	echo $b;
?>