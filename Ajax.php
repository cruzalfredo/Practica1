<?php
require ('Materia.php');
require ('header.php');
require ('db.php');
$materia=new Materia();
$id_maestro=$_REQUEST['idmae'];
$nivel=$_REQUEST['nivel'];

if(isset($_REQUEST['action']))
{
    $action=$_REQUEST['action'];
}
else
{
    $action="0";
}
switch($action) {
    case "0":
$materia->datosMaestro($id_maestro, $nivel);
$materia->materiasAsignadas($id_maestro, $nivel);
$materia->asignarMateriaMaestro($id_maestro, $nivel);
        break;
    case"1":
        $materia->datosMaestro($id_maestro, $nivel);
        $materia->materiasAsignadas1($id_maestro, $nivel);
        break;


}
require ('footer.php');

?>