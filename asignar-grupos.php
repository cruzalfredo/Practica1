<?php
require ('Grupo.php');
require ('header.php');
require ('db.php');
$grupo = new Grupo();

if(isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "Alta":
            echo "
            <div class='table-resposive'>
            <form action='asignar-grupos.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>

            <tr>
                <td>Grupo:</td><td><input type='text' name='grupo'></td>
            </tr>
            <tr>
                <td colspan='2' align='center'><input type='submit' name='submit' value='Alta' align='center'  class='btn btn-default' ></td>
            </tr>
            </table>
            </form>
            </div>";

            break;
        case "Consulta":
            echo "<div class='table-resposive'>
            <form action='asignar-grupos.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>";
            echo "<tr><td>Buscar: <input type='text' name='buscar'></td><td><input type='submit' name='submit'value='Buscar'  class='btn btn-default' ></td>";
            echo "</tr>
            </table>
            </form>
            </div>";
            $grupo->readGrupoG();
            break;
        case "Modificar":
            $id_grupo=$_REQUEST['id'];
            $sql="SELECT * FROM ejercicio1.grupo WHERE ID=$id_grupo";
            $consulta=mysql_query($sql) or die ("Error cosntula modificacion : $sql");
            $gr=utf8_decode(mysql_result($consulta,0,'Nombre'));
            $estat=mysql_result($consulta,0,'Estatus');
            echo "<div class='table-resposive'>
            <form action='asignar-grupos.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>

            <tr>
                <td>Grupo:</td><td><input type='text' name='grupo' value='$gr'><input type='hidden' name='action' value='Alta'><input type='hidden' name='id' value='$id_grupo'><input type='hidden' name='action' value='Modificar'></td>
            </tr>";
            if($estat==1){
                echo "<tr><td colspan='2' align='center'><input type='radio' name='estatus' value='1' checked>Activo <input type='radio' name='estatus' value='2'>Desactivado</td></tr>";
            }
            if($estat==2){
                echo "<tr><td colspan='2' align='center'><input type='radio' name='estatus' value='1' >Activo <input type='radio' name='estatus' checked value='2'>Desactivado</td></tr> ";
            }
            echo " <tr>
               <td colspan='2' align='center'><input type='submit' name='submit' value='Modificar' align='center'  class='btn btn-default' ></td>
               </tr>
            </table>
            </form>
            </div>";
            break;

    }
}

if(isset($_REQUEST['submit'])) {
    switch ($_REQUEST['submit']) {
        case "Alta":
            echo "
            <div class='table-resposive'>
            <form action='asignar-grupos.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>

            <tr>
                <td>Grupo:</td><td><input type='text' name='grupo'></td>
            </tr>
            <tr>
                <td colspan='2' align='center'><input type='submit' name='submit' value='Alta' align='center'  class='btn btn-default' ></td>
            </tr>
            </table>
            </form>
            </div>";

            echo "<div class=\"alert alert-success\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            $gr=$_REQUEST['grupo'];
            $grupo->createGrupo($gr);

            break;
        case "Buscar":
            echo "<div class='table-resposive'>
            <form action='asignar-grupos.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>";
            echo "<tr><td>Buscar: <input type='text' name='buscar'></td><td><input type='submit' name='submit'value='Buscar'  class='btn btn-default' ></td>";
            echo "</tr>
            </table>
            </form>
            </div>";
            $id=$_REQUEST['buscar'];
            $grupo->readGrupoS($id);
            break;
        case "Modificar":
            echo "<div class=\"alert alert-success\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            $id_gp=$_REQUEST['id'];
            $gr=utf8_encode($_REQUEST['grupo']);
            $estatus=$_REQUEST['estatus'];
            $grupo->updateGrupo($id_gp,$gr,$estatus);
            break;
        case "Borrar":
            $id=$_REQUEST['id'];
            echo "<div class=\"alert alert-info\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            $grupo->deleteGrupo($id);
            echo "<div class='table-resposive'>
            <form action='asignar-grupos.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>";
            echo "<tr><td>Buscar: <input type='text' name='buscar'></td><td><input type='submit' name='submit'value='Buscar'  class='btn btn-default' ></td>";
            echo "</tr>
            </table>
            </form>
            </div>";
            $grupo->readGrupoG();
            break;



    }
}


require ('footer.php');
?>