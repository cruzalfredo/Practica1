<?php
require ('Usuario.php');
require ('header.php');
require ('db.php');

$usuario = new Usuario();
//$usuario->createUsuario('Victor Massiel','Juarez','Marinez', 'Alumno');

//$usuario->readUsuarioS(1);
//$usuario->updateUsuario(5,'Pedro', 'magos','hsh','Alumno','Activo');
//$usuario->deleteUsuario();


if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta":
            echo "<div class=\"alert alert-danger\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_POST['submit'];
            echo"</div>";
            $usuario->createUsuario("$_POST[nombre]","$_POST[app]","$_POST[apm]",$_POST['nivel']);
            break;
        case "Modificar":
            echo "<div class=\"alert alert-success\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_POST['submit'];
            echo"</div>";
            $usuario->updateUsuario($_POST['modificar'],"$_POST[nombre]","$_POST[app]","$_POST[apm]",$_POST['nivel'],"activo");
            break;
        case "Borrar":
            echo "<div class=\"alert alert-info\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_POST['submit'];
            echo"</div>";
            $usuario->deleteUsuario($_POST['borrar']);
            break;
        case "Buscar":

            $usuario->readUsuarioS($_POST['buscar']);
            echo "<br>";
            echo "<div class=\"alert alert-success\" role=alert>";
            echo "<br> Bot&oacute;n: " . $_POST['submit'];
            echo"</div>";
            break;
    }

}
?>

<div class='table-resposive'>
    <form action=TestUsuario.php method="post"  target="_self" >
        <table class="table table-bordered table table-striped">

            <tr>
                <td>Nombre(s):</td><td><input type="text" name="nombre"></td>
            </tr>
            <tr>
                <td>Apellido Paterno:</td><td><input type="text" name="app"></td>
            </tr>
            <tr>
                <td>Apellido Materno:</td><td><input type="text" name="apm"></td>
            </tr>
            <tr>
                <td>Nivel:</td>
                <td>
                    <select name="nivel">
                        <option value="1">Administrador</option>
                        <option value="2">Maestro</option>
                        <option value="3">Alumno</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Alta" align="center"  class="btn btn-default" ></td>
            </tr>
            <tr>
                <td>ID: <input type="text" name="modificar"></td><td><input type="submit" name="submit" value="Modificar"  class="btn btn-default" ></td>
            </tr>
            <tr>
                <td>ID: <input type="text" name="borrar"></td><td><input type="submit" name="submit" value="Borrar"  class="btn btn-default" ></td>
            </tr>
            <tr>
                <td>Buscar: <input type="text" name="buscar"></td><td><input type="submit" name="submit" value="Buscar"  class="btn btn-default" ></td>
            </tr>
        </table>
    </form>
</div>


<?PHP
$usuario->readUsuarioG();
require ('footer.php');
?>