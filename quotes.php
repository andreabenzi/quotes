<!DOCTYPE html>
<html>
<body>
<h2>Save quotes in JSON file</h2>
<p>Insert quote to save:</p>
<form method="POST" action="quotes.php">
  <label for="nome">Name:</label><br>
  <input type="text" id="nome" name="nome" value=""><br>
  <label for="testo">Text:</label><br>
  <textarea id="testo" name="testo" value=""></textarea><br><br>
  <input type="submit" value="Submit">
</form> 
<br/>
<?php
$json = file_get_contents('quotes.json');
$json_data = json_decode($json,true);
if (($_POST["nome"]) && ($_POST["testo"])){
  $json_data[] = ['nome' => $_POST["nome"], 'testo' => $_POST["testo"]];
  $json = json_encode($json_data);
  if (file_put_contents("quotes.json", $json))
    echo "JSON file saved!";
  else 
    echo "Oops! Error save JSON file...";
}
echo "<pre>";
print_r(json_decode(nl2br($json,false),true));
echo "</pre>";
exit;
?>
</body>
</html>