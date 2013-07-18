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
        <input type="submit" name="word" value="キーワードのみ">
	</form>
	<br>
	<hr>
<?php
	if(@$_POST["num"] || @$_POST["area"] || @$_POST["word"]){
		echo "<form target=\"result\" action=\"./result.php\" method=\"post\">\n";
   		echo "<p>\n";
		echo "検索キーワード：<br><input type=\"text\" name=\"keyword\" size=20/><br><hr>\n";
		if(@$_POST["num"]) {
			echo "写真中の人の数：<br><input type=\"text\" name=\"number\" size=20 /><br>\n<hr>\n";
		}
		if(@$_POST["area"]) {
			echo "人の数範囲指定：<br><input type=\"text\" name=\"number\" size=10/>～<input type=\"text\" name=\"for\" size=10/><br>\n<hr>\n";
        }
        if(@$_POST["word"]) {
            echo "\n";
        }
        echo "<input type=\"radio\" name=\"sort\" value=\"upsort\" checked>昇順";
    	echo "<input type=\"radio\" name=\"sort\" value=\"downsort\">降順</p>\n";
		echo "<input type=\"submit\" name=\"search\" value=\"Search!\" />\n";
		echo "<input type=\"submit\" name=\"debug\" value=\"Debug...\" />\n";
   		echo "</p>\n";
		echo "</form>\n";
	}
?>
    <div style="border:dotted 2px #FFDAB9; margin:20px;">
        <p style="font-size: 10px;">
        [数値指定] - [範囲指定] - [キーワードのみ]<br>
        の、検索設定ボタンをひとつ選択<br>
        次いで出てくるフォームへ、条件を入力<br>
        画像周辺にキーワードが出現回数した回数<br>
        に対して昇順か降順を指定し<br>
        Search!で検索結果を表示します。<br>
        またDebug...で輪郭抽出結果を出力します
        </p>
    </div>
    </body>
</html>
