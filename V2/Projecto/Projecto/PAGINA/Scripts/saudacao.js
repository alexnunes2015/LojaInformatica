var d = new Date();
var agora=d.getHours();	

if(agora<11)
{
alert("Bom dia");
}

if(agora>=11 && agora<14)
{
alert("Olá");
}
						
if(agora>=14 && agora<=17)
{
alert("Bom Tarde");
}
						
if(agora>17)
{
alert("Bom Noite ");
}