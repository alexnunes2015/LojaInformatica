<?php
	session_start();
	$de=$_SESSION['LI_USERNAME'];
	$para=$_POST['To'];
	$mensagem=$_POST['Mensagem'];
	$con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");
	if(!$con)
	{
		echo "Erro no acesso a base de dados<br>Um bando de ratos estão a tentar resolver o problema!";
	}
	mysql_select_db('leja_informatica');
	$cmd="insert into mensagens values('".$mensagem."','".$de."','".$para."')";
	mysql_query($cmd);
	echo '<script>alert("Mensagem enviada com exito!");</script>';
	echo '<script type="text/javascript">self.location="gestao.php";</script>";';
?>