<?php
require ('Grupo.php');
require ('header.php');
require ('db.php');
$grupo = new Grupo();
if(isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "Alta";
            $grupo->grupoAlumno();
            break;
        case "Borrar":
            $id=$_REQUEST['id'];
            $grupo->borrarGrupoAlumno($id);
            echo "<div class=\"alert alert-info\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['action'];
            echo "</div>";
            $grupo->grupoAlumno();
            break;
        case "Buscar":
            $id=$_REQUEST['id'];
            $grupo->verGrupoAlumno($id);

            break;
        }
}

if(isset($_REQUEST['submit'])) {
    switch ($_REQUEST['submit']) {

        case "Agregar":
            $grp=$_REQUEST['grupo'];
            $cantos=$_REQUEST['cuantos'];
            for($y=0;$y<$cantos;$y++){
                $a=$y+1;
                $a="al".$a;
                @$alumno=$_REQUEST[$a];
                if($alumno!="")
                {
                    $grupo->asignarAlumno($grp,$alumno);
                }

            }
            echo "<div class=\"alert alert-success\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            $grupo->grupoAlumno();
            break;

    }
}

require ('footer.php');
?>
