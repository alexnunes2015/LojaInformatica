<?php
session_start();
$con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");	
		mysql_select_db('leja_informatica');

		$cmd="CREATE TABLE vendas_tmp_".$_SESSION['LI_USERNAME']." (";
		$cmd=$cmd . "ID integer,";
		$cmd=$cmd . "Nome  char (50),";
		$cmd=$cmd . "Preco real,";
		$cmd=$cmd . "quantidade byte,";
		mysql_query($cmd);
		$con.close();
		echo '<script type="text/javascript">self.location="vendas.php";</script>";';
		
		
?>		
