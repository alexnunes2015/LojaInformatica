<?php

	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$con=mysql_connect("localhost","root","");
	if(!$con)
	{
		echo "Erro no acesso a base de dados<br>Um bando de ratos estão a tentar resolver o problema!";
	}
	mysql_select_db('leja_informatica');
	$result = mysql_query("SELECT Name, password,type FROM utilizadores");
	
	$passou=false;
	
	while ($row = mysql_fetch_array($result)) 
	{
		if($row[0]==$username && $row[1]==$password)
		{			
			session_start();
			$_SESSION['LI_USERNAME'] = $username;
			$_SESSION['LI_USER_TYPE'] = $row[2];
			$passou=true;
			break;
		}
	}
	if($passou==false)
	{
		echo '<script type="text/javascript">';
		echo 'alert("Senha ou nome de utilizador invalidos");';
		echo 'self.location="index.htm";';
		echo '</script>';
		
	}
	else
	{
		echo '<script type="text/javascript">self.location="gestao.php";</script>";';
	}
	
?>