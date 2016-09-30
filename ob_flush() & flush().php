<?php  
/*
 1.2015年11月5日16:01:47
 2.ob_flush() & flush()
 3.php.ini output_buffering默认是4069字符或者更大，即输出内容必须达到4069字符服务器才会flush刷新输出缓冲
 4.ob_flush()和flush()的区别。前者是把数据从PHP的缓冲中释放出来,后者是把不在缓冲中的或者说是被释放出来的数据发送到浏览器。所以当缓冲存在的时候，我们必须ob_flush()和flush()同时使用。
 5.example 1 :  好像并没啥卵用
 6.example 2 :	即时输出
 7.example 3 :	即时输出并替换掉（还有待研究他输出的东西）
*/

/*
// example 1
for($i = 1; $i <= 300; $i++ ) print(" ");  
// 这一句话非常关键，cache的结构使得它的内容只有达到一定的大小才能从浏览器里输出  
// 换言之，如果cache的内容不达到一定的大小，它是不会在程序执行完毕前输出的。经  
// 过测试，我发现这个大小的底限是256个字符长。这意味着cache以后接收的内容都会  
// 源源不断的被发送出去。  
for($j = 1; $j <= 20; $j++) {  
echo $j." ";  
flush(); //这一部会使cache新增的内容被挤出去，显示到浏览器上  
sleep(1); //让程序“睡”一秒钟，会让你把效果看得更清楚  
} 
 */
///*
// example 2 
print str_repeat(" ", 4096);//php.ini output_buffering默认是4069字符或者更大，即输出内容必须达到4069字符服务器才会flush刷新输出缓冲
for ($i=10; $i>0; $i--)
{	
	print str_repeat(" ", 4096);
    echo $i;
    ob_flush();
    flush();
    sleep(1);
}
//*/
/*
// example 3
header('Content-type: multipart/x-mixed-replace;boundary=endofsection');
  print "\n--endofsection\n";

  $pmt = array("-", "\\", "|", "/" );
  for( $i = 0; $i <10; $i ++ ){
     sleep(1);
     print "Content-type: text/plain\n\n";
     print "Part $i\t".$pmt[$i % 4];
     print "--endofsection\n";
     ob_flush();
     flush();
  }
  print "Content-type: text/plain\n\n";
  print "The end\n";
  print "--endofsection--\n";
  */
?> 