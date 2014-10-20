<?php
class Grupo{
public function createGrupo($grupo){
    $sql="INSERT INTO ejercicio1.grupo(Nombre,Estatus) VALUES ('".$grupo."',1)";
    mysql_query($sql) or die("Error al ingresar el grupo : $sql");
    Echo "<br><strong> Grupo guardado correctamente.</strong>";

}
    public function readGrupoG(){
        $sql="SELECT * FROM ejercicio1.grupo WHERE Estatus=1 ORDER BY Nombre  ASC ";
        echo "<div class=table-resposive>";
        echo "<form action='asignar-materias.php' method='post' name='maestro' id='maestro'>";
        $consulta=mysql_query($sql) or die ("Error en $sql");
        echo "<table class='table table-bordered table table-striped'>";
        echo "<tr><th>ID</th><th>Gupo</th><th></th>";
        while ($b = mysql_fetch_array($consulta)) {
            $id2 = $b['ID'];
            $grupo=$b['Nombre'];
            echo "<tr><td>$id2</td><td>".utf8_decode($grupo)."</td><td><a href='asignar-grupos.php?submit=Borrar&id=$id2'>Elimininar</a> | <a href='asignar-grupos.php?action=Modificar&id=$id2'>Modificar</a></td></tr>";
        }
        echo "</table>";
    }
    public function readGrupoS($id){
        $sql="SELECT * FROM ejercicio1.grupo WHERE ID=$id ORDER BY Nombre  ASC ";
        echo "<div class=table-resposive>";
        echo "<form action='asignar-materias.php' method='post' name='maestro' id='maestro'>";
        $consulta=mysql_query($sql) or die ("Error en $sql");
        echo "<table class='table table-bordered table table-striped'>";
        echo "<tr><th>ID</th><th>Gupo</th><th></th>";
        while ($b = mysql_fetch_array($consulta)) {
            $id2 = $b['ID'];
            $grupo=$b['Nombre'];
            echo "<tr><td>$id2</td><td>".utf8_decode($grupo)."</td><td><a href='asignar-grupos.php?submit=Borrar&id=$id2'>Elimininar</a> | <a href='asignar-grupos.php?action=Modificar&id=$id2'>Modificar</a></td></tr>";
        }
        echo "</table>";
    }
    public function updateGrupo($id,$grupo,$est){
        $band=0;
        if($grupo=="")
        {
            $band=1;
            echo "<br>El campo Grupo se encuentra vacío.";
        }
        if($band==0) {
            $sql = "UPDATE ejercicio1.grupo SET Nombre='$grupo',Estatus=$est WHERE ID=$id;";
            mysql_query($sql) or die ("Error de actualizacion de grupo: $sql");
            Echo "<br><strong> Grupo Actualizado correctamente.</strong>";
        }

    }
    public function deleteGrupo($id){
        $sql="UPDATE ejercicio1.grupo SET Estatus=2 WHERE ID=$id;";
        mysql_query($sql) or die ("Error al eliminar: $sql");
        echo"<strong>Grupo borrado correctamente.</strong>";
    }

    public function grupoAlumno(){
        $a=0;
        echo "<div class=table-resposive>";
        echo "<form action='TestGrupo.php' method='get' name='maestro' id='maestro'>";
        echo "<table class='table table-bordered table table-striped'>";
        echo "<tr><th colspan='2'>Alumnos</th></tr>";
        $sql="SELECT * FROM ejercicio1.usuario WHERE Nivel=3";
        $consulta=mysql_query($sql) or die ("Errr en constulta alumnos: $sql");
        while($F=mysql_fetch_array($consulta)) {
            $alumno = $F['ID'];
            $sql2 = "SELECT * FROM ejercicio1.alumnogrupo WHERE ID_Alumno=$alumno";
            $consulta2 = mysql_query($sql2) or die ("Errr en constulta relacion: $sql2");
            $cuantos = mysql_num_rows($consulta2);
            if ($cuantos == 1) {

                $grupo = mysql_result($consulta2, 0, 'ID_Grupo');
                $sql3 = "SELECT * FROM ejercicio1.grupo WHERE ID=$grupo;";
                $consulta3 = mysql_query($sql3) or die ("Error en consulta 3: $sql3 ");
                $grp = mysql_result($consulta3, 0, 'Nombre');
                echo "<tr><td align='center'>Alumno:" . utf8_decode($F['Nombre']). " ".utf8_decode($F['ApellidoPaterno'])." ".utf8_decode($F['ApellidoMaterno'])." <br>se encuentra en el grupo:<u><strong>$grp</strong></u></td><td><a href='TestGrupo.php?action=Borrar&id=".$F['ID']."'><input type='button' value='Eliminar'></button></a></td></tr>";


            }
            if ($cuantos == 0) {
                $a = $a + 1;
                echo "<tr><td align='center' colspan='2'> <input type='checkbox' name='al$a' value='" . $F['ID'] . "'> " . utf8_decode($F['Nombre']) . " ".utf8_decode($F['ApellidoPaterno'])." ".utf8_decode($F['ApellidoMaterno'])."</td></tr>";

            }
        }
            $sql4="SELECT * FROM ejercicio1.grupo";
            $consulta4=mysql_query($sql4) or die ("error en consulta grupo: $sql4");
            echo "<tr><td colspan='2' align='center'>Materia:<select name='grupo'>";
            while($b=mysql_fetch_array($consulta4))
            {
                $id_g=$b['ID'];
                $n_g=$b['Nombre'];
                echo "<option value='$id_g'>".$n_g."</option> ";
            }

            echo "</select><input type='hidden' value='$a' name='cuantos'></td></tr>";

            echo"
            <tr><td colspan='2' align='center'><input type='submit' name='submit'value='Agregar'  class='btn btn-default' ></td></tr>
            </table>
            </form>
            </div>";
        }



        public function asignarAlumno($grupo,$alumno){
            $sql="INSERT INTO ejercicio1.alumnogrupo(ID_Alumno,ID_Grupo) VALUES($alumno,$grupo);";
                mysql_query($sql) or die ("Error en insertar alumno grupo");
        }
    public function borrarGrupoAlumno($alumno){
        $sql="DELETE FROM ejercicio1.alumnogrupo WHERE ID_Alumno=$alumno;";
        mysql_query($sql) or die ("Error en borrado de alumno");
    }
    public function verGrupoAlumno($alumno){

        $sql1="SELECT * FROM usuario WHERE ID=$alumno";
        $consulta=mysql_query($sql1) or die ("Error en constulta alumno: $sql1");
        $sql2 = "SELECT * FROM ejercicio1.alumnogrupo WHERE ID_Alumno=$alumno";
        $consulta2 = mysql_query($sql2) or die ("Error en constulta relacion: $sql2");
        $cuantos = mysql_num_rows($consulta2);
        if ($cuantos == 1) {
            echo "<div class=table-resposive>";
            echo "<form action='TestGrupo.php' method='get' name='maestro' id='maestro'>";
            echo "<table class='table table-bordered table table-striped'>";
            echo "<tr align='center'><th  colspan='2'>Alumno</th></tr>";
            $grupo = mysql_result($consulta2, 0, 'ID_Grupo');
            $sql3 = "SELECT * FROM ejercicio1.grupo WHERE ID=$grupo;";
            $consulta3 = mysql_query($sql3) or die ("Error en consulta 3: $sql3 ");
            $grp = mysql_result($consulta3, 0, 'Nombre');
            echo "<tr><td align='center'>Alumno:<strong><u>" . utf8_decode(mysql_result($consulta,0,'Nombre')). " ".utf8_decode(mysql_result($consulta,0,'ApellidoPaterno'))." ".utf8_decode(mysql_result($consulta,0,'ApellidoMaterno'))."</u></strong> <br>se encuentra en el grupo:<u><strong>$grp</strong></u></td></tr>";
            echo "</table>
            </form>
            </div>";

        }
        else{
            echo "
            <br>
            <br>
            <p><strong>Aun no tienes grupo, favor de checarlo con el administrador.</strong></p>

            ";
        }

    }


}
?>