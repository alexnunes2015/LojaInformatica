
<html>
<head>
<title>Loja de informatica 2014 - Gestão</title>
<!-- Created by Dynamic HTML Editor http://www.hexagora.com -->
<META NAME="GENERATOR" CONTENT="Dynamic HTML Editor v.1.9 - http://www.hexagora.com">
<SCRIPT LANGUAGE=javascript>
<!--
var isNS=document.layers?true:false;
var isIE=(document.all!=null)||(navigator.appName.toLowerCase().indexOf('microsoft internet explorer')!=-1);
var isDom2=document.getElementById;
var fVers=parseFloat(navigator.appVersion);
if ((isNS && fVers<4)||(isIE && fVers<4))
    alert('Your browser is very old. Please upgrade if you want to see this page correctly.');
//-->
</SCRIPT>
<SCRIPT LANGUAGE=javascript src='files/dhwe.js'></SCRIPT>
<link rel="shortcut icon" href="icon.ico"
<link rel='stylesheet' href="files/gestao.css"></link>
</head>
<body SCROLL='auto' TEXT='#000000' BGCOLOR='#FFFFFF' TOPMARGIN='0' LEFTMARGIN='0' LINK='#0000FF' VLINK='#800080' ALINK='#FF0000'>

<div id='ldhePicture2' name='ldhePicture2' style='position:absolute;left:0px;top:0px;width:1276px;height:106px;' align='left' valign='top'>
<img id='Picture2' name='Picture2' src='files/gestao_picture2.png' border='0' width='1276' height='106'></img></div>
<div id='ldheHtml1' name='ldheHtml1' style='position:absolute;left:935px;top:5px;width:326px;height:51px;' align='left' valign='top'>
<?php

session_start();
echo '<font color="white"><h1>Olá '.$_SESSION['LI_USERNAME'].'<h1></font>';

?>
</div>
<div id='ldhePicture1' name='ldhePicture1' style='position:absolute;left:445px;top:20px;width:126px;height:41px;' align='left' valign='top'>
<a href="vendas.php">
<img id='Picture1' name='Picture1' src='files/gestao_picture1.png' border='0' width='126' height='41'></img></a></div>
<div id='ldhePicture3' name='ldhePicture3' style='position:absolute;left:585px;top:20px;width:136px;height:41px;' align='left' valign='top'>
<a href="produtos.php">
<img id='Picture3' name='Picture3' src='files/gestao_picture3.png' border='0' width='136' height='41'></img></a></div>
<div id='ldhePicture4' name='ldhePicture4' style='position:absolute;left:730px;top:20px;width:126px;height:41px;' align='left' valign='top'>
<a href="gestao.php">
<img id='Picture4' name='Picture4' src='files/gestao_picture4.png' border='0' width='126' height='41'></img></a></div>
<div id='ldheHtml2' name='ldheHtml2' style='position:absolute;left:120px;top:170px;width:1041px;height:446px;' align='left' valign='top'>

<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='white'>

<?php
$con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");	
mysql_select_db('leja_informatica');

$result = mysql_query("SELECT * FROM notificacoes  order by id desc LIMIT 0, 5");

while ($row = mysql_fetch_array($result)) 
	{
		if($row[0]==0)
		{
			echo '<tr><td height="120" align="center" background="/images/notify_positivo.png"><font color="white"><h2>'.$row[1].'</font></h2></td></tr>';
		}
		if($row[0]==1)
		{
			echo '<tr><td height="120" align="center" background="/images/notify_neutro.png"><font color="white"><h2>'.$row[1].'</font></h2></td></tr>';
		}
		if($row[0]==2)
		{
			echo '<tr><td height="120" align="center" background="/images/notify_negativo.png"><font color="white"><h2>'.$row[1].'</font></h2></td></tr>';
		}
	}
?>

</table>
</div>
<div id='ldheHtml3' name='ldheHtml3' style='position:absolute;left:10px;top:110px;width:96px;height:21px;' align='left' valign='top'>
<SCRIPT LANGUAGE=javascript>

  <?php
  $con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");	
  mysql_select_db('leja_informatica');

  $result = mysql_query("SELECT TimeRefresh FROM Definicoes");
  $row = mysql_fetch_array($result);
  echo 'var myVar=setInterval(function(){myTimer()},'.$row[0].');';


  ?>

function myTimer()
{
location.reload();
}
</SCRIPT>



</div>
<div id='ldhePicture5' name='ldhePicture5' style='position:absolute;left:0px;top:850px;width:1276px;height:80px;' align='left' valign='top'>
<img id='Picture5' name='Picture5' src='files/gestao_picture5.png' border='0' width='1276' height='80'></img></div>
<div id='ldheHtml4' name='ldheHtml4' style='position:absolute;left:1125px;top:885px;width:131px;height:41px;' align='left' valign='top'>
<table width='100%' border='2' cellspacing='0' cellpadding='0' bgcolor='white'>
<tr>

<?php
$con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");	
mysql_select_db('leja_informatica');

$result = mysql_query("SELECT * FROM EmCaixa");

$row = mysql_fetch_array($result);

if($row[0]<=20)
{
	echo '<td width="50%" bgcolor="red"><font color="white"><center>'.$row[0].'€</center></font>';
}
else
{
	echo '<td width="50%" bgcolor="black"><font color="white"><center>'.$row[0].'€</center></font>';
}

?>



</td>
</tr>
</table>

</div>
<div id='ldhePicture6' name='ldhePicture6' style='position:absolute;left:15px;top:880px;width:56px;height:37px;' align='left' valign='top'>
<a href="settings.php">
<img id='Picture6' name='Picture6' src='files/gestao_picture6.png' border='0' width='56' height='37'></img></a></div>
<div id='ldhePicture7' name='ldhePicture7' style='position:absolute;left:90px;top:880px;width:51px;height:37px;' align='left' valign='top'>
<a href="logoff.php">
<img id='Picture7' name='Picture7' src='files/gestao_picture7.png' border='0' width='51' height='37'></img></a></div>
<div id='ldheHtml5' name='ldheHtml5' style='position:absolute;left:705px;top:870px;width:141px;height:46px;' align='left' valign='top'>
<?php

$con=mysql_connect("sispicserver.no-ip.org","Grupo_2","7846");	
mysql_select_db('leja_informatica');

$result = mysql_query("SELECT * FROM mensagens");

while ($row = mysql_fetch_array($result)) 
	{
	     if($row[2]==$_SESSION['LI_USERNAME'])
             {
		$msg="De:'".$row[1]." ---- '".$row[0]."'";
             	echo '<script>alert("'.$msg.'");</script>';
             }
	}
mysql_query("delete FROM mensagens where para='".$_SESSION['LI_USERNAME']."'");

  

?>
</div>
<div id='ldhePicture9' name='ldhePicture9' style='position:absolute;left:630px;top:870px;width:75px;height:52px;' align='left' valign='top'>
<a href="New_email.php">
<img id='Picture9' name='Picture9' src='files/gestao_picture9.png' border='0' width='75' height='52'></img></a></div>
</body>

</html>


