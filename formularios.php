<?php

$usuario = new Usuario();

if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta":
            echo "<div class=\"alert alert-danger\" role=alert>>";
            echo "<br> Bot&oacute;n: " . $_POST['submit'];
            echo"</div>";
            $usuario->createUsuario("$_POST[nombre]","$_POST[app]","$_POST[apm]",$_POST[nivel]);
    }

}
?>

<div class='table-resposive'>
  <form action="formularios.php" method="post"  target="_self" >
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

