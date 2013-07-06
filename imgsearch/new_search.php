<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>集合写真検索システム - 検索</title>
 <link href="css/test.css" rel="stylesheet" />
  </head>
  <body class="search">
  	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
   		<input type="submit" name="num" value="数値指定">
    	<input type="submit" name="area" value="範囲指定">
	</form>
	<br>
	<hr>
<?php
	if(@$_POST["num"] || @$_POST["area"]){
		echo "<form target=\"result\" action=\"./result.php\" method=\"post\">\n";
   		echo "<p>\n";
		echo "検索キーワード：<br><input type=\"text\" name=\"keyword\" size=20/><br><hr>\n";
		if(@$_POST["num"]) {
			echo "写真中の人の数：<br><input type=\"text\" name=\"number\" size=20 /><br>\n";
		}
		if(@$_POST["area"]) {
			echo "人の数範囲指定：<br><input type=\"text\" name=\"number\" size=10/>～<input type=\"text\" name=\"for\" size=10/><br>\n";
		}
		echo "<hr>\n";
    	echo "<input type=\"radio\" name=\"sort\" value=\"upsort\" checked>昇順";
    	echo "<input type=\"radio\" name=\"sort\" value=\"downsort\">降順</p>\n";
		echo "<input type=\"submit\" value=\"Search!\" />\n";
   		echo "</p>\n";
		echo "</form>\n";
	}
?>
</body>
</html>
