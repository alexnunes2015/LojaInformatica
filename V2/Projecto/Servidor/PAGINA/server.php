
<html>
<head>
<title>Loja de infromatica - Servidor</title>
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
<SCRIPT LANGUAGE=javascript src='files_server/dhwe.js'></SCRIPT>

<link rel='stylesheet' href="files_server/server.css"></link>
</head>
<body SCROLL='auto' TEXT='#000000' BGCOLOR='#808080' TOPMARGIN='0' LEFTMARGIN='0' LINK='#0000FF' VLINK='#800080' ALINK='#FF0000'>

<div id='ldhePicture1' name='ldhePicture1' style='position:absolute;left:0px;top:0px;width:1281px;height:129px;' align='left' valign='top'>
<img id='Picture1' name='Picture1' src='files_server/server_picture1.png' border='0' width='1281' height='129'></img></div>
<div id='ldheLabel1' name='ldheLabel1' style='position:absolute;left:440px;top:30px;width:286px;height:29px;text-align:left;' align='left' valign='top'>
<font class='verdana1880FFFFFFtib'>Servidor</font><br>
</div>
<div id='ldheshRect2' name='ldheshRect2' style='position:absolute;left:220px;top:320px;width:901px;height:106px;' align='left' valign='top'>
<table width='901' border='0' cellspacing='0' cellpadding='0'>
<tr><td height='106' width='901' bgcolor='#C0C0C0'><img src='files_server/blank.gif' border='0'></td></tr>
</table></div>
<div id='ldheRect2' name='ldheRect2' style='position:absolute;left:215px;top:315px;width:901px;height:106px;'>
<table width='901' border='0' cellspacing='0' cellpadding='0'>
<tr><td height='106' width='901' bgcolor='#FF0000'><img src='files_server/blank.gif' border='0'></td></tr>
</table></div>
<div id='ldheiRect2' name='ldheiRect2'  style='position:absolute;left:222px;top:322px;width:887px;height:92px;'>
<table width='887' border='0' cellspacing='0' cellpadding='0'>
<tr><td height='92' width='887' bgcolor='#C0C0C0'><img src='files_server/blank.gif' border='0'></td></tr>
</table></div>
<div id='ldheRect1' name='ldheRect1' style='position:absolute;left:245px;top:340px;width:61px;height:46px;'>
<table width='61' border='0' cellspacing='0' cellpadding='0'>
<tr><td height='46' width='61' bgcolor='#000000'><img src='files_server/blank.gif' border='0'></td></tr>
</table></div>
<div id='ldheiRect1' name='ldheiRect1'  style='position:absolute;left:246px;top:341px;width:59px;height:44px;'>
<table width='59' border='0' cellspacing='0' cellpadding='0'>
<tr><td height='44' width='59' bgcolor='#FFFF00'><img src='files_server/blank.gif' border='0'></td></tr>
</table></div>
<div id='ldheLabel2' name='ldheLabel2' style='position:absolute;left:265px;top:345px;width:21px;height:38px;text-align:left;' align='left' valign='top'>
<font class='verdana24C0FFFFFFti'>!</font><br>
</div>
<div id='ldheLabel3' name='ldheLabel3' style='position:absolute;left:320px;top:335px;width:763px;height:50px;text-align:left;' align='left' valign='top'>
<font class='verdana16FFFFFFFFFFFFtbu'>Aviso:</font><font class='verdana16FFFFFFFFFFFFt'> Esta Pagina ter&#225; de estar sempre aberta, &#233; ela a pagina que faz a gestao e o funcionamento de todo o sistema</font><br>
</div>
<div id='ldheHtml1' name='ldheHtml1' style='position:absolute;left:720px;top:145px;width:106px;height:51px;' align='left' valign='top'>
<?php
	
	function ExecutarSQL($CMD)
	{

		$con=mysql_connect("localhost","root","");
		mysql_select_db('leja_informatica');
		mysql_query($CMD);
	}


	if(date('H:i')=="12:00")
	{
		$result=mysql_query("select Mensagem from notificacoes where Mensagem='Está na hora de almoço, bom Almoço e bom apetite! :D' order by id desc LIMIT 0, 5");
		if(mysql_num_rows($result) == 0) {
    				ExecutarSQL("Insert into notificacoes values(0,'Está na hora de almoço, bom Almoço e bom apetite! :D',0)");
		}
	}
	if(date('H:i')=="9:00")
	{
		$result=mysql_query("select Mensagem from notificacoes where Mensagem='Muito bom dia a todos' order by id desc LIMIT 0, 5");
		if(mysql_num_rows($result) == 0) {
    			ExecutarSQL("Insert into notificacoes values(0,'Muito bom dia a todos',0)");
		}
		
	}
	if(date('H:i')=="24:59" and date("j/n")=="31/12")
	{
		ExecutarSQL("Insert into notificacoes values(0,'Feliz ano novo! e muita sorte para o negocio para o novo ano',0)");
	}
		
	$con=mysql_connect("localhost","root","");
	if(!$con)
	{
		echo '<script>alert("A base de dados esta indesponivel!");';
	}
	mysql_select_db('leja_informatica');
	
	
	$result = mysql_query("SELECT * FROM EmCaixa");
	$row = mysql_fetch_array($result);
	
	if($row[0]<=20)
	{	
		$result=mysql_query("select Mensagem from notificacoes where Mensagem='A Caixa esta em baixo! :(' order by id desc LIMIT 0, 5");
		if(mysql_num_rows($result) == 0) {
    				ExecutarSQL("insert into notificacoes values(2,'A Caixa esta em baixo! :(',0)");
		}
	}
	if($row[0]>20 and $row[0]<100)
	{	
		$result=mysql_query("select Mensagem from notificacoes where Mensagem='A Caixa recuperou o seu valor minimo :)' order by id desc LIMIT 0, 5");
		if(mysql_num_rows($result) == 0) {
    				ExecutarSQL("insert into notificacoes values(0,'A Caixa recuperou o seu valor minimo :)',0)");
		}
	}
?>

</div>
<div id='ldheHtml3' name='ldheHtml3' style='position:absolute;left:595px;top:150px;width:96px;height:21px;' align='left' valign='top'>
<SCRIPT LANGUAGE=javascript>

var myVar=setInterval(function(){myTimer()},1500);

function myTimer()
{
location.reload();
}
</SCRIPT>



</div>
</body>

</html>




