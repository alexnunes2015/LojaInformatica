<?php
	$NovoTempo=$_POST['NovoTempo'];
	$con=mysql_connect("localhost","root","");
	if(!$con)
	{
		echo "Erro no acesso a base de dados<br>Um bando de ratos estão a tentar resolver o problema!";
	}
	mysql_select_db('leja_informatica');
	$result = mysql_query("UPDATE definicoes SET TimeRefresh ='.$NovoTempo.';");
	echo '<script type="text/javascript">alert("As Definições de auto-actualização foram salvas com sucesso!");</script>";';
	echo '<script type="text/javascript">self.location="settings.php";</script>";';
?>