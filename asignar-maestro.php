<?php
require ('Usuario.php');
require ('header.php');
require ('db.php');
$usuario = new Usuario();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action']){
        case "Alta":
            echo "
            <div class='table-resposive'>
    <form action='asignar-maestro.php' method='post'  target='_self' >
        <table class='table table-bordered table table-striped'>

            <tr>
                <td>Nombre(s):</td><td><input type='text' name='nombre'></td>
            </tr>
            <tr>
                <td>Apellido Paterno:</td><td><input type='text' name='app'></td>
            </tr>
            <tr>
                <td>Apellido Materno:</td><td><input type='text' name='apm'><input type='hidden' name='nivel' value='2'><input type='hidden' name='action' value='Alta'></td>
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
    <form action='asignar-maestro.php' method='post'  target='_self' >
        <table class='table table-bordered table table-striped'>";
            echo "<tr><td>Buscar: <input type='text' name='buscar'></td><td><input type='submit' name='submit' value='Buscar'  class='btn btn-default' ></td>";
            echo "</tr>
            </table>
            </form>
            </div>";
            $usuario->readUsuarioG(2);

            break;
        case "Modificar":
            $id_a=$_REQUEST['modificar'];
            $sql="SELECT * FROM ejercicio1.usuario WHERE ID=$id_a";
            $consulta=mysql_query($sql) or die ("Errora en la consulta: $sql");
            $nombre=mysql_result($consulta,0,'Nombre');
            $app=mysql_result($consulta,0,'ApellidoPaterno');
            $apm=mysql_result($consulta,0,'ApellidoMaterno');
            $act=mysql_result($consulta,0,'Estatus');

            echo "
            <div class='table-resposive'>
            <form action='asignar-maestro.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>

            <tr>
                <td>Nombre(s):</td><td><input type='text' name='nombre' value='".utf8_decode($nombre)."'></td>
            </tr>
            <tr>
                <td>Apellido Paterno:</td><td><input type='text' name='app' value='".utf8_decode($app)."'></td>
            </tr>
            <tr>
                <td>Apellido Materno:</td><td><input type='text' name='apm' value='".utf8_decode($apm)."'><input type='hidden' name='nivel' value='2'><input type='hidden' name='modificar' value='$id_a'><input type='hidden' name='action' value='Modificar'></td>
            </tr>
             ";
            if($act==1){
                echo "<tr><td colspan='2' align='center'><input type='radio' name='estatus' value='1' checked>Activo <input type='radio' name='estatus' value='2'>Desactivado</td></tr>";
            }
            if($act==2){
                echo "<tr><td colspan='2' align='center'><input type='radio' name='estatus' value='1' >Activo <input type='radio' name='estatus' checked value='2'>Desactivado</td></tr>";
            }
            echo "
                <tr>
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
            echo "<div class=\"alert alert-danger\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            $usuario->createUsuario("$_REQUEST[nombre]", "$_REQUEST[app]", "$_REQUEST[apm]", $_REQUEST['nivel']);
            break;
        case "Modificar":
            echo "<div class=\"alert alert-success\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            $usuario->updateUsuario($_REQUEST['modificar'], "$_REQUEST[nombre]", "$_REQUEST[app]", "$_REQUEST[apm]", $_REQUEST['nivel'], $_REQUEST['estatus']);
            break;
        case "Borrar":
            echo "<div class=\"alert alert-info\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            $usuario->deleteUsuario($_REQUEST['borrar']);
            echo "<div class='table-resposive'>
            <form action='asignar-maestro.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>";
            echo "<tr><td>Buscar: <input type='text' name='buscar'></td><td><input type='submit' name='submit' value='Buscar'  class='btn btn-default' ></td>";
            echo "</tr>
            </table>
            </form>
            </div>";
            $usuario->readUsuarioG(2);
            break;
        case "Buscar":

            echo "<div class='table-resposive'>
            <form action='asignar-maestro.php' method='post'  target='_self' >
            <table class='table table-bordered table table-striped'>";
            echo "<tr><td>Buscar: <input type='text' name='buscar'></td><td><input type='submit' name='submit' value='Buscar'  class='btn btn-default' ></td>";
            echo "</tr>
            </table>
            </form>
            </div>";
            $usuario->readUsuarioS($_REQUEST['buscar'],2);
            echo "<br>";
            echo "<div class=\"alert alert-success\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_REQUEST['submit'];
            echo "</div>";
            break;
    }
}
?>

<?php
require ('footer.php');
?>