<?php 
	$max_size=2.00;
	?>
<html>
	<body>
		<h2>Upload de arquivo XMind para conversão em AIML</h2>
		<form action="importer.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo ($max_size*1048576.00); ?>" />
			<input type="hidden" name="post" value="1" />
				Arquivo: <input name="userfile" type="file" />
			<input type="submit" value="Send File" />
			<br />
			O arquivo não pode ultrapassar o tamanho de <?php echo "$max_size"; ?> MB (<?php echo ($max_size*1048576.00); ?> bytes).
		</form>
		<p>
			<ul>Lembre-se de que é necessário que o diagrama esteja no formato adequado:</ul>
			<img width="1200" height="600" src="/master/admin/images/diagrama.svg" alt="" />
		</p>
	</body>
</html>