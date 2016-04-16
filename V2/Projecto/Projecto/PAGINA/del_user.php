<?php
		if($_POST['ToRemove']!="Administrador")
		{
		$con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");	
		mysql_select_db('leja_informatica');

		$cmd="DELETE FROM utilizadores WHERE Name='".$_POST['ToRemove']."'";
		mysql_query($cmd);
		
		echo '<script>alert("O Utilizador foi removido com exito!");</script>';
		echo '<script type="text/javascript">self.location="settings.php";</script>";';
		}
		else
		{
			echo '<script>alert("Não pode remover este utilizador pois ele é o utilizador principal!");</script>';
			echo '<script type="text/javascript">self.location="settings.php";</script>";';
		}
?>