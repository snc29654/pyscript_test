<?php
    $mode = $_REQUEST['mode'];
    if (!$mode) {
?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
  <html lang="ja">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Cache-Control" content="no-cache">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>テスト</title>
  </head>
  <frameset cols="1000">
  <frame name="main" src="form_echo_test.php?mode=main">
  </frameset>
  </html>
  
<?php
  exit();
}
switch ($_REQUEST['mode']) {
case 'main':
  $fname = "outfile.py";
  if (file_exists($fname)) $contents = file_get_contents($fname);



  print "<h3>ソース書き込み</h3>\n";
  print "<a href =http://snc29654.php.xdomain.jp/pyscript/pyscript.html>python実行</a>";
  print "<form method='post' action='form_echo_test.php'>\n";
  print "<textarea name='contents' cols='100' rows='30'>$contents</textarea>\n";
  print "<br><br>\n";
  print "<input type='submit' value='保存'>\n";
  print "<input type='hidden' name='mode' value='submit'>\n";
  print "</form>\n";
  break;
case 'submit':

  $contents = $_POST['contents'];
  $contents = str_replace("\r\n", "\n", $contents);
  $contents = str_replace("\r", "\n", $contents);
  $fp = fopen("outfile.py", "w");
  if ($fp) {
    fwrite($fp, $contents);
    fclose($fp);

    print"<script>";
    print"document.write(\"書き込みました\");";
    print"</script>";


  } else {
    print"<script>";
    print"document.write(\"保存に失敗しました\");";
    print"</script>";
  }
  print "</p>\n";
  
  
  break;
}
?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
  <html lang="ja">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Cache-Control" content="no-cache">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>テスト</title>
  </head>
  <frameset cols="1000">
  <frame name="main" src="form_echo_test.php?mode=main">
  </frameset>
  </body>
</html>