<?php
$user=$_REQUEST['user'];
$psw=$_REQUEST['psw'];
if ($user == "" or $psw == "")
{
    $msg="Iniciar Sesión";
    Print"<meta http-equiv='refresh' content='0;
url=index1.php?msg=$msg'>";
}
require("db.php");
$sql="SELECT * from ejercicio1.usuario where Usuario=\"" . mysql_real_escape_string($user) . "\" AND Contrasena= \"" . mysql_real_escape_string($psw) . "\"";
$consulta=mysql_query($sql) or die ("Error de consulta de host");
$cuantos=mysql_num_rows($consulta);
if($cuantos>0) {

    $idu = mysql_result($consulta, 0, 'ID');
    $activo = mysql_result($consulta, 0, 'Estatus');
    if ($activo == '2') {
        $msg = "El usuario no está activo, consulte al administrador";
        Print"<meta http-equiv='refresh' content='0;
url=index1.php?msg=$msg'>";
    } else {
        echo "<br> si vale<br>";
        Print"<meta http-equiv='refresh' content='0;
url=Accesos.php?idu=$idu'>";
    }

}
else{
    $msg="El usuario o password son incorrectos";
    Print"<meta http-equiv='refresh' content='0;
url=index1.php?msg=$msg'>";
}
?>