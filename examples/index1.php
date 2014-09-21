<!DOCTYPE HTML>
<?php
 if(isset($_REQUEST['jsondata'])){
	$json = $_REQUEST['jsondata'];
	file_put_contents('example.json', $json);
 }
//Load the file
$contents = file_get_contents('example.json');
 
//Decode the JSON data into a PHP array.
//$contentsDecoded = json_decode($contents, true);
 
//Modify the counter variable.
//$contentsDecoded['counter']++;
 
//Encode the array back into a JSON string.
//$json = json_encode($contentsDecoded);
 
//Save the file.
//file_put_contents('example.json', $json);

?>
<html>
<head>
  <title>JSONEditor | Switch mode</title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

  <!-- json editor -->
  <link rel="stylesheet" type="text/css" href="../jsoneditor.css">
  <script type="text/javascript" src="../jsoneditor.js"></script>

  <!-- ace editor -->
  <script type="text/javascript" src="../asset/ace/ace.js"></script>

  <!-- json lint -->
  <script type="text/javascript" src="../asset/jsonlint/jsonlint.js"></script>

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
<form action="index1.php" method="POST">
<div id="jsoneditor"></div>
<input type="submit" onclick="changetotext();" value="submit">
</form>

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
