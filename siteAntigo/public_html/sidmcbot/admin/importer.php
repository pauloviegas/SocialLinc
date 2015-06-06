<html>
<head>
<title>Conversão XMind - AIML</title>
</head>

<body>

<?php
	if (defined($_POST['userfile'])) {
		$arquivo = file($_POST["userfile"]);
		$zip = new ZipArchive();
		if( $zip->open(  )  === true){
			$conteudo = $zip->getFromName('content.xml');
			echo $conteudo;
			echo "<br />==============================<br />";
			$conteudo = $zip->getFromIndex(0);
		}
	} else {
		echo "Upload falhou";
	}
?>

</body>

</html>