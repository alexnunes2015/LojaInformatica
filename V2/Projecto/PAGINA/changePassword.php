<?php
	$SenhaActual=$_POST['SenhaActual'];
	$Senha1=$_POST['SenhaA'];
	$Senha2=$_POST['SenhaB'];
	if($Senha1!=$Senha2)
	{
		echo '<script>alert("As senhas introduzidas não correspondem");</script>';
		echo '<script type="text/javascript">self.location="alterarsenha.php";</script>";';
	}
	else
	{
		session_start();
		
		$con=mysql_connect("localhost","root","");	
		mysql_select_db('leja_informatica');

		$passou=false;
		
		$con=mysql_connect("localhost","root","");
		if(!$con)
		{
			echo "Erro no acesso a base de dados<br>Um bando de ratos estão a tentar resolver o problema!";
		}
		mysql_select_db('leja_informatica');
		$result = mysql_query("SELECT Name, password FROM utilizadores");
		
		$passou=false;
		
		while ($row = mysql_fetch_array($result)) 
		{
			if($row[0]==$_SESSION['LI_USERNAME'] && $row[1]==$SenhaActual)
			{			
				$passou=true;
				break;
			}
		}
		
		if($passou)
		{
			$cmd="UPDATE Utilizadores SET password='".$Senha1."' WHERE Name='".$_SESSION['LI_USERNAME']."'";
			mysql_query($cmd);
			
			echo '<script>alert("A senha foi alterada com exito!");</script>';
			echo '<script type="text/javascript">self.location="settings.php";</script>";';
		}
		else
		{
			echo '<script>alert("A senha actual esta errada!");</script>';
			echo '<script type="text/javascript">self.location="settings.php";</script>";';
		}
	}

?>