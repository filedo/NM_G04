<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>集合写真検索システム - 検索結果</title>
    <script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/lightbox.js">
	</script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
	$(function(){
    	$(".popup a").hover(function() {
        	$(this).next("span").animate({opacity: "show", top: "-10"}, "slow");}, function() {
            	$(this).next("span").animate({opacity: "hide", top: "-10"}, "fast");
     	});
	});
	$(function(){
    	$(".open").click(function(){
    		$("#slideBox").slideToggle("slow");
    	});
  	});
	</script>
    <link href="css/test.css" rel="stylesheet" />
	<link href="css/lightbox.css" rel="stylesheet" />
	<link href="css/popup.css" rel="stylesheet" />
  </head>
  <body>
<?php

// tfファイルの読み込み　１行ずつ　最後まで
$tf_data = array( array());
$tffile = "tfimg.all";
$f1 = fopen($tffile, "r");
while (! feof ($f1)) {
  $line = fgets($f1);
  $tf_line = preg_split( "/\t/" , $line );
  @$tf_line[2] = preg_replace("/\r|\n/","",$tf_line[2]);
  @$tf_data[$tf_line[0]][$tf_line[2]] = $tf_line[1]; 
}
fclose($f1);
// tfファイルの読み込み　ここまで


// fcファイルの読み込み　１行ずつ　最後まで
$fc_data = array();
$fcfile = "fcimg.all";
$f2 = fopen($fcfile, "r");
while (! feof ($f2)) {
  $line = fgets($f2);
  $fc_line = preg_split( "/\t/" , $line );
  @$fc_line[1] = preg_replace("/\r|\n/","",$fc_line[1]);
  $fc_data[$fc_line[1]] = $fc_line[0]; 
}
fclose($f2);
// fcファイルの読み込み　ここまで


// 以下、検索処理
$result_num = 0;


$_POST["number"]=mb_convert_kana($_POST["number"],"n","utf-8");//全角を半角に変換
if (isset($_POST["keyword"]) && isset($_POST["number"])) {  
  if(array_key_exists($_POST["keyword"], $tf_data) && $_POST["keyword"] <>null ){
    
	if ($_POST["number"]==null || !preg_match("/^[0-9]+$/", $_POST["number"])) {
		echo "人数を正しく入力して下さい。";
	} else {
    	echo "キーワード「".$_POST["keyword"]."」　人数「";
    	echo $_POST["number"]."人」での検索結果<br>\n";
    }
    echo "<hr><br>\n";
    echo "<ul class=\"popup\"\n>";
    arsort($tf_data[@$_POST["keyword"]]);//キーワードの出現回数を降順にソート
    foreach($tf_data[@$_POST["keyword"]] as $key => $val ) {
      if (@$_POST["number"] == @$fc_data[$key] && @$_POST["number"]<>null){
		echo "<li><a href=\"$key\" rel=\"lightbox[search]\" class=\"popup\"><img src='$key' height=\"300\" id=\"$key\"></a><span>キーワード出現回数＝".$val."回<br>\n写真中の人の数＝".@$fc_data[$key]."人<br>$key</span></li>\n";
		/*
		echo "キーワード出現回数＝".$val."回<br>\n";
		echo "写真中の人の数＝".@$fc_data[$key]."人<br>\n";
		echo "$key<br><br><br>\n";
		*/
		$result_num++;
      }
    }
    echo "</ul>";    
  } elseif (@$_POST["keyword"]==null) {
    echo '検索キーワードを入力して下さい。';
  } else {
    echo '検索キーワードに合致する写真はありません。';
  }
  echo "<p class=\"open\">合計</p><div id=\"slideBox\">検索結果は".$result_num."件でした。</div>";
}
else {
  echo "左、検索フレームより条件を入力してください。";
}

?>
</body>
</html>
