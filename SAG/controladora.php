<?
session_start(); 
?>
<title>GISAGA</title>
<style type='text/css'>
            html, body {
            }
            body {
                background-repeat: no-repeat;
		background-position: center;
		background-color: #FFFFFF;
            }
        .Estilo1 {color: #999999}
.Estilo2 {color: #999999; font-style: italic; }
.Estilo3 {
	color: #666666;
	font-style: italic;
}
.Estilo31 {font-style: italic; color: #999999;}
</style>

   <?php
include_once("modelo.php");
if (existe($_POST['login'], $_POST['password']))
{
?>
   <div align="center">
     <h4><span></span>
       </h2>
       <span class="Estilo31">Sistema Automatizado</span> </h4>
   </div>
   <h4 align="center"><em><a href='menu.php' class="Estilo1"> Haga click para ir al Men&uacute;</a>
  <?
}
else
{
?>
 </em></h4>
   </div>
   <div align="center">
     <h4><span class="Estilo31">Sistema Automatizado</span></h4>
   </div>
   <div align="center">
     <h4 align="center"><span class="Estilo3"> Usuario o datos ingresados NO existentes </span><em>I</em>nv&aacute;lidos</h4>
   </div>
<div align="center">
  <h4 align="center"><a href='acceso.php' class="Estilo2">Volver </a></h4>
</div>
<?
}
?>