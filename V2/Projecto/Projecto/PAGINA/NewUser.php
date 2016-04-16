<?php

	$novo_user=$_POST['NovoUtilizador'];
	$nova_senha=$_POST['NovaSenha'];
	$novo_tipo=$_POST['Tipo_Conta'];
	if($novo_user=="" or $nova_senha=="")
		{
		echo '<script type="text/javascript">alert("Os campos da criação de utilizador estao vazios");</script>";';
		echo '<script type="text/javascript">self.location="settings.php";</script>";';	
	}
	else
	{
		$con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");
		if(!$con)
		{
			echo "Erro no acesso a base de dados<br>Um bando de ratos estão a tentar resolver o problema!";
		}
		mysql_select_db('leja_informatica');
		if($novo_tipo=="Administrador")
		{
			$result = mysql_query("insert into utilizadores values('".$novo_user."','".$nova_senha."',0)");
		}
		else
		{
			$result = mysql_query("insert into utilizadores values('".$novo_user."','".$nova_senha."',1)");
		}
		echo '<script type="text/javascript">alert("O novo utilizador foi criado com exito!");</script>";';
		echo '<script type="text/javascript">self.location="settings.php";</script>";';
	}

?>