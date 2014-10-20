<?php
require ('Materia.php');
require ('header.php');
require ('db.php');
$materia=new Materia();

if(isset($_REQUEST['action']))
{
    $action=$_REQUEST['action'];
}
else
{
    $action="3";
}

switch($action) {

    case "0":
        $materia->nivel=$_REQUEST['nivel'];
        $niv=$materia->nivel;
        $materia->SeleccionaMaestro($niv);
        break;

    case "Seleccionar":
        $id_mtro=$_REQUEST['maestro'];
        $id_mat=$_REQUEST['Materias'];
        $nivel=$_REQUEST['nivel'];
        $materia->ingesarMaterias($id_mtro,$id_mat);
        $materia->datosMaestro($id_mtro,$nivel);
        $materia->materiasAsignadas($id_mtro,$nivel);
        $materia->asignarMateriaMaestro($id_mtro,$nivel);

        break;
    case "2":
        $materia1=$_REQUEST['id'];
        $maestro=$_REQUEST['maestro'];
        $nivel=$_REQUEST['nivel'];
        $materia->borrarMaterias($maestro,$materia1);
        $materia->datosMaestro($maestro,$nivel);
        $materia->materiasAsignadas($maestro,$nivel);
        $materia->asignarMateriaMaestro($maestro,$nivel);
        break;
    case "3":
        $materia->seleccionarGrupo();
        break;
    case "Agregar":
        $id_grupo=$_REQUEST['grupo'];
        $id_mat=$_REQUEST['Materias'];
        $materia->asignarGrupo($id_mat,$id_grupo);
        $materia->datosGrupos($id_grupo);
        $materia->gruposAsignados($id_grupo);
        $materia->asignarMateriaGrupo($id_grupo);
        $materia->regresar();

        break;

    case "4":
        $id_grupo=$_REQUEST['grupo'];
        $id_mat=$_REQUEST['id'];
        $materia->borrarGrupoMateria($id_mat,$id_grupo);
        $materia->datosGrupos($id_grupo);
        $materia->gruposAsignados($id_grupo);
        $materia->asignarMateriaGrupo($id_grupo);
        $materia->regresar();
        break;
}


require ('footer.php');
?>