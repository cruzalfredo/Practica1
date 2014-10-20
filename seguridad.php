<?php
require('db.php');
$idu=$_COOKIE['idu'];
$acceso=$_COOKIE['acceso'];
if ($idu=="" or $acceso=="")
{
    $msg="";
    Print"<meta http-equiv='refresh' content='0;
url=index.php?msg=$msg'>";
}
$sql="SELECT ejercicio1.Usuario.Nivel FROM ejercicio1.usuario WHERE ID=$idu;";
$consulta=mysql_query($sql) or die ("Error al consulta nivel del usuario: $sql");
$cuantos=mysql_num_rows($consulta);

?>