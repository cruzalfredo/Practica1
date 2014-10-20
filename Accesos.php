<?php
$idu=$_REQUEST['idu'];
if ($idu=="")
{
    $msg="Iniciar Sesión";
    Print"<meta http-equiv='refresh' content='0;
url=index1.php?msg=$msg'>";
}
else
{
    setCookie('idu',$idu);
    setCookie('acceso',1);
    Print"<meta http-equiv='refresh' content='0;
url=index3.php'>";
}
?>