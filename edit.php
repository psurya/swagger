<!DOCTYPE HTML>
<?php
$f = $_REQUEST['f'];
if($f != 'api-docs'){
	$p = 'listings/'.$f;
}else {
	$p = $f;
}
 if(isset($_REQUEST['jsondata'])){
	$json = $_REQUEST['jsondata'];
	file_put_contents($p, $json);
 }
//Load the file
if(file_exists ( $p )){
	$contents = file_get_contents($p);
} else {
	$fh = fopen($p, 'w');
	// $txt = "{}\n";
	// fwrite($p, $txt);
	// fclose($p);
	$contents = "{}";
}


?>
<html>
<head>
  <title>edit json</title>
  <!-- json editor -->
  <link rel="stylesheet" type="text/css" href="jsoneditor.css">
  <script type="text/javascript" src="jsoneditor.js"></script>

  <!-- ace editor -->
  <script type="text/javascript" src="asset/ace/ace.js"></script>

  <!-- json lint -->
  <script type="text/javascript" src="asset/jsonlint/jsonlint.js"></script>

  <style type="text/css">
    body {
      font: 10.5pt arial;
      color: #4d4d4d;
      line-height: 150%;
    }

    code {
      background-color: #f5f5f5;
    }

    #jsoneditor {

      height: 500px;
    }
  </style>
</head>
<body>
<!--
<table style="width:100%">
<tr><td style="width:30%">
<?php
// if ($handle = opendir('listings')) {

    // while (false !== ($entry = readdir($handle))) {
        // echo "$entry<br>";
    // }
    // closedir($handle);
// }
?>
</td><td>
-->
<h2> JSON Editor for - <u><?php echo $f; ?></u></h2>
<form action="edit.php" method="POST">
<div id="jsoneditor"></div>
<input type="hidden" name="f" value="<?php echo $f; ?>">
<input type="submit" onclick="changetotext();" value="submit">
</form>
<!--
</td></tr>
</table>
-->
<script type="text/javascript" >

  var container = document.getElementById('jsoneditor');

  var options = {
    mode: 'text',
    modes: ['form', 'text', 'tree', 'view'], // allowed modes
    error: function (err) {
      alert(err.toString());
    }
  };

  var json = <?php echo $contents ?>;

  var editor = new JSONEditor(container, options, json);
  function changetotext(){
	var mode = 'text';
	editor.setMode(mode);
    var modeBox = editor.dom && editor.dom.modeBox;
    if (modeBox) {
        modeBox.focus();
    }
}
</script>
</body>
</html>
