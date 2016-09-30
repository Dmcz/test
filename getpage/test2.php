<?php
	//$url = $_POST['url'];

	$url = 'https://item.taobao.com/item.htm?spm=a217m.1726276.1998739781.22.KR8EWR&id=524005745841&qq-pf-to=pcqq.c2c';
	$page_content = file_get_contents($url);
	echo $page_content;
	$d = '<em id="J_PromoPriceNum" class="tb-rmb-num">';
	$e = '</em>';
	$a = stripos($page_content,$d);
	echo $a;exit;
	$b = stripos($page_content,$e,$a+strlen($d));
	$c = substr($page_content, $a+strlen($d),$b-$a-strlen($d));
	//echo $a.'='.$b.'='.$c;
	echo json_encode($c);
?>