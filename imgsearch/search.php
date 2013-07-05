<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>集合写真検索システム - 検索</title>
 <link href="css/test.css" rel="stylesheet" />
  </head>
  <body class="search">
<form target="result" action="./result.php" method="post">  
   <p>    
   検索キーワード：<input type="text" name="keyword" size=20/><br>
    写真中の人の数：<input type="text" name="number" size=20 /><br>
    <input type="radio" name = "check" value="0" checked>範囲なし<br><hr>
    範囲指定:<br>
    <input type="text" name="number1" size=10/>~
    <input type="text" name="number2" size=10/>
    <input type="radio" name="check" value="1">範囲あり<br>
    <input type="radio" name="sort" value="upsort" checked>昇順
    <input type="radio" name="sort" value="downsort">降順</p>
<hr><input type="submit" value="Search!" />
   </p>
</form>
</body>
</html>
