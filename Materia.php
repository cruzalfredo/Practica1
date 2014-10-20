<?php
class Materia {
    private $id;
    private $nombre;
    private $avatar;
    private $oden;
    private $estatus;
    public  $nivel;

    public function createMateria($materia,$descrip){
        $bandera=0;
        if($materia==""){
            $bandera=1;
            echo "<br>El campo Nombre de la materia se encuentra vacío";
        }

        if($bandera==0) {
            $sql = "INSERT INTO ejercicio1.materia(Materia, Estatus, Avatar) VALUES ('$materia',1,'$descrip')";
            mysql_query($sql) or die ("Error insertar materia: $sql");
            echo "<br>Materia agregada correctamente.";
        }

    }
    public function readMateriaG(){
        $sql="SELECT * FROM ejercicio1.materia WHERE Estatus=1 ORDER BY Materia  ASC ";
        echo "<div class=table-resposive>";
        echo "<form action='asignar-materias.php' method='post' name='maestro' id='maestro'>";
        $consulta=mysql_query($sql) or die ("Error en $sql");
            echo "<table class='table table-bordered table table-striped'>";
            echo "<tr><th>ID</th><th>Materia</th><th></th>";
            while ($b = mysql_fetch_array($consulta)) {
                $id2 = $b['ID'];
                $materia=$b['Materia'];
                echo "<tr><td>$id2</td><td>".utf8_decode($materia)."</td><td><a href='asignar-materias.php?submit=Borrar&id=$id2'>Elimininar</a> | <a href='asignar-materias.php?action=Modificar&id=$id2'>Modificar</a></td></tr>";
            }
            echo "</table>";
    }

    public function deleteMateria($id){
        $sql="UPDATE ejercicio1.materia SET Estatus=2 WHERE ID=$id;";
        mysql_query($sql) or die ("Error al eliminar: $sql");
        echo"<strong>Materia borrada correctamente.</strong>";

    }

    public function readMateriaS($id){
        $sql="SELECT * FROM ejercicio1.materia WHERE ID=$id ORDER BY Materia ASC ";
        echo "<div class=table-resposive>";
        echo "<form action='asignar-materias.php' method='post' name='maestro' id='maestro'>";
        $consulta=mysql_query($sql) or die ("Error en $sql");
        echo "<table class='table table-bordered table table-striped'>";
        echo "<tr><th>ID</th><th>Materia</th><th></th>";
        while ($b = mysql_fetch_array($consulta)) {
            $id2 = $b['ID'];
            $materia=$b['Materia'];
            echo "<tr><td>$id2</td><td>".utf8_decode($materia)."</td><td><a href='asignar-materias.php?submit=Borrar&id=$id2'>Elimininar</a> | <a href='asignar-materias.php?action=Modificar&id=$id2'>Modificar</a></td></tr>";
        }
        echo "</table>";
    }
    public function updateMateria($id,$materia,$descripcion,$estatus)
        {
            $band=0;
            if($materia==""){
                $band=1;
                echo "<br>El campo Nombre de la materia se encuentra vacío";
            }

            if($band==0){
                $sql="UPDATE ejercicio1.materia SET Materia='$materia', Avatar='$descripcion',Estatus=$estatus WHERE ID=$id";
                mysql_query($sql) or die ('Error en actualización de materia: $sql');
                echo "<br> Materia actualizada correctamente. ";
            }

        }

    public function SeleccionaMaestro($a)
        {

            $sql="SELECT * FROM ejercicio1.Usuario WHERE Estatus=1 AND Nivel=$a ORDER BY ejercicio1.Usuario.ApellidoPaterno ASC;";
            $consulta=mysql_query($sql) or die ("Error al consultar maestro:  $sql");

            echo "<div class=table-resposive>";
            echo "<form action='Ajax.php' method='post' name='maestro' id='maestro'>";
            echo "<table class='table table-bordered table table-striped'>";
            if($a==2) {
                echo "<tr><td>Maestro:</td> <td><select name='idmae'>";
            }
            if($a==3) {
                echo "<tr><td>Alumno:</td> <td><select name='idmae'>";
            }
            while($resultado=mysql_fetch_array($consulta))
            {
                $id_maestro=$resultado['ID'];
                $nombre=$resultado['ID'].") ".$resultado['ApellidoPaterno']." ".$resultado['ApellidoMaterno']." ".$resultado['Nombre'];
                echo "<option value=$id_maestro>".utf8_decode($nombre)."</option>";
            }
            echo "</select><input type='hidden' name='nivel' value=".$a."></td></tr>";
            echo "<tr><td colspan='2' align='center'>
            <input type='submit' id=submit value='Seleccionar' class='btn btn-default' ></td></tr>";
            echo"</table>";
            echo"</form>";
            echo "</div>";
            


        }

        public function datosMaestro($id_maestros,$nivel){
            $sql="SELECT * FROM ejercicio1.Usuario WHERE ID=$id_maestros;";
            $consulta=mysql_query($sql) or die ("Error al consultar : $sql");
            $cuantos=mysql_num_rows($consulta);
            if($cuantos>0)
            {
                $nombre=$id_maestros.") ".mysql_result($consulta,0,'ApellidoPaterno')." ".mysql_result($consulta,0,'ApellidoMaterno')." ".mysql_result($consulta,0,'Nombre');
                if($nivel==2) {
                    echo "<br>Maestro Seleccionado:";
                }
                if($nivel==3) {
                    echo "<br>Alumno Seleccionado:";
                }
                echo" <strong>".utf8_decode($nombre)."</strong>";
            }

        }
    public function materiasAsignadas($a,$x){

        $sql="SELECT * from ejercicio1.MateriaMaestro WHERE Id_Maestro=$a";
        echo "<div class=table-resposive>";
        echo "<form action='TestMateria.php' method='post' name='maestro' id='maestro'>";
        $consulta=mysql_query($sql) or die ("Error en $sql");
        $cuantos=mysql_num_rows($consulta);
        if($cuantos>0) {
            echo "<table class='table table-bordered table table-striped'>";
            echo "<tr><th>ID</th><th>Materia</th><th></th>";
            while ($b = mysql_fetch_array($consulta)) {
                $id = $b["ID_Materia"];
                $sql02 = "SELECT * from ejercicio1.Materia WHERE ID=$id;";
                $consulta02 = mysql_query($sql02) or die ("Error en $sql02");
                $id2 = mysql_result($consulta02, 0, 'ID');
                $materia = mysql_result($consulta02, 0, 'Materia');
                echo "<tr><td>$id2</td><td>".utf8_decode($materia)."</td><td><a href='TestMateria.php?action=2&id=$id2&maestro=$a&nivel=$x'>Elimininar</a></td></tr>";
            }
            echo "</table>";
        }
        else {
            if($x==3) {
                echo "<br><br></ber> <strong> No hay  materias asignadas a esté Alumno.</strong>";
            }
            if($x==2) {
                echo "<br><br></ber> <strong> No hay  materias asignadas a esté Maestro.</strong>";
            }
        }
            echo "<br><br>";


    }
    public function asignarMateriaMaestro($b,$nivel){

        echo "<div class=table-resposive>";
        echo "<form action='TestMateria.php' method='post' name='maestro' id='maestro'>";
        $sql01="SELECT * FROM ejercicio1.Materia WHERE estatus=1 ORDER BY ejercicio1.Materia.Materia ASC ;";
        $consulta=mysql_query($sql01) or die ("Error $sql01");
        echo "<input type='hidden' name='maestro' value='$b'><input type='hidden' name='nivel' value='$nivel'>";
        echo "Selecionar Materia:<select name='Materias' >";
        while($a=mysql_fetch_array($consulta))
        {
            $id_m=$a['ID'];
            $materia=$a['Materia'];
            $sql02="SELECT * FROM ejercicio1.MateriaMaestro WHERE ID_Maestro=$b AND ID_Materia=$id_m;";
            $consulta02=mysql_query($sql02) or die ("Error en consulta 2 $sql02");
            $cuantos=mysql_num_rows($consulta02);
            if ($cuantos>0){
                echo "<option value='0'>No disponible</option>";
            }
            else{
                echo"<option value='$id_m'>".utf8_decode($materia)."</option>";
            }

        }
        echo "</select>";
        echo "<br><br>";
        echo "<input type='submit' name='action' id=submit value='Seleccionar' class='btn btn-default' ></td></tr>";
        echo" </form>
            </div>";
    }

    public function ingesarMaterias($maestro,$materia){
        if($materia!=0) {
            $sql = "INSERT INTO ejercicio1.MateriaMaestro(ID_Materia,ID_Maestro) VALUES ($materia,$maestro);";
            $ejec = mysql_query($sql) or die("Error al insertar Materia:$sql");
            echo "<br><br> <strong> Materia agregada correctamente.</strong><br>";
        }
        else{
            echo "<br><br> <strong> La materia ya esta agregada.</strong><br>";
        }

    }

    public function borrarMaterias($maestro,$materia){

        $sql1="DELETE  FROM ejercicio1.MateriaMaestro WHERE ID_Materia= $materia AND ID_Maestro=$maestro";
        $ejec=mysql_query($sql1) or die ("Error al borrar : $sql1");
        echo "<br><br> <strong> Materia borrada correctamente,</strong><br>";

    }

    public function seleccionarGrupo(){
        echo "<div class=table-resposive>";
        echo "<form action='Ajax2.php' method='post' name='maestro' id='maestro'>";
        echo "<table class='table table-bordered table table-striped'>";
        echo "<tr><td>Grupo: </td> <td><select name='idg'>";
        $sql="SELECT * FROM ejercicio1.grupo WHERE Estatus=1 ORDER BY Nombre ASC;";
        $consulta=mysql_query($sql) or die ("Error al consultar materias: $sql");
        while($f=mysql_fetch_array($consulta)){
            $id=$f['ID'];
            $nombre=$id.") ".$f['Nombre'];
            echo "<option value='$id' >$nombre</option>";

        }
        echo "</select></td></tr>";
        echo "<tr><td colspan='2' align='center'>
            <input type='submit' id=submit value='Seleccionar' class='btn btn-default' ></td></tr>";

        echo"</table>";
        echo"</form>";
        echo "</div>";

    }

    public function datosGrupos($id_grupo){
        $sql="SELECT * FROM ejercicio1.grupo WHERE ID=$id_grupo AND Estatus=1;";
        $consulta=mysql_query($sql) or die ("Error al consultar : $sql");
        $cuantos=mysql_num_rows($consulta);
        if($cuantos>0)
        {
            $nombre=$id_grupo.") ".mysql_result($consulta,0,'Nombre');
            echo "<br>Grupo Seleccionado: <strong>$nombre</strong>";
        }

    }


    public function gruposAsignados($grupo){

        $sql="SELECT * from ejercicio1.materiagrupo WHERE ID_Grupo=$grupo";
        echo "<div class=table-resposive>";
        echo "<form action='TestMateria.php' method='post' name='maestro' id='maestro'>";
        $consulta=mysql_query($sql) or die ("Error en $sql");
        $cuantos=mysql_num_rows($consulta);
        if($cuantos>0) {
            echo "<table class='table table-bordered table table-striped'>";
            echo "<tr><th>ID</th><th colspan='2'>Materias</th></tr>";
            while ($b = mysql_fetch_array($consulta)) {
                $id = $b["ID_Materia"];
                $sql02 = "SELECT * from ejercicio1.Materia WHERE ID=$id;";
                $consulta02 = mysql_query($sql02) or die ("Error en $sql02");
                $id2 = mysql_result($consulta02, 0, 'ID');
                $materia = mysql_result($consulta02, 0, 'Materia');
                echo "<tr><td>$id2</td><td>$materia<td><td><a href='TestMateria.php?action=4&id=$id2&grupo=$grupo'>Elimininar</a></td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "<br><br></ber> <strong> No hay  materias asignadas a éste grupo.</strong>";
        }
        echo "<br><br>";


    }

    public function asignarMateriaGrupo($id_grupo){

        echo "<div class=table-resposive>";
        echo "<form action='TestMateria.php' method='post' name='maestro' id='maestro'>";
        $sql01="SELECT * FROM ejercicio1.Materia WHERE Estatus=1 ORDER BY ejercicio1.materia.Materia ASC ;";
        $consulta=mysql_query($sql01) or die ("Error $sql01");
        echo "<input type='hidden' name='grupo' value='$id_grupo'>";
        echo "Selecionar Materia:<select name='Materias' >";
        while($a=mysql_fetch_array($consulta))
        {
            $id_m=$a['ID'];
            $materia=$a['Materia'];
            $sql02="SELECT * FROM ejercicio1.materiagrupo WHERE ID_Grupo=$id_grupo AND ID_Materia=$id_m";
            $consulta02=mysql_query($sql02) or die ("Error en consulta 2 $sql02");
            $cuantos=mysql_num_rows($consulta02);
            if ($cuantos>0){
                echo "<option value='0'>No disponible</option>";
            }
            else{
                echo"<option value='$id_m'>$materia</option>";
            }

        }
        echo "</select>";
        echo "<br><br>";
        echo "<input type='submit' name='action' id=submit value='Agregar' class='btn btn-default' ></td></tr>";
        echo" </form>
            </div>";
    }

    public function asignarGrupo($materia,$grupo){
        if($materia!=0) {
            $sql = "INSERT INTO ejercicio1.materiagrupo(ID_Grupo,ID_Materia) VALUES ($grupo,$materia)";
            mysql_query($sql) or die ("Error al insertar :$sql");
            echo "<br><br> <strong>Materia agregada correctamente al grupo.</strong><br>";
        }else{
            echo "<br><br> <strong>No se puede agregar esta materia ya que ya se encuentra agregada.</strong><br>";
        }

    }
    public function borrarGrupoMateria($materia,$grupo){
        $sql="DELETE FROM ejercicio1.materiagrupo WHERE ID_Grupo=$grupo and ID_Materia=$materia;";
        mysql_query($sql) or die ('Error en borrado :$sql');
        echo "<br><br> <strong> Materia borrada correctamente del grupo,</strong><br>";

    }
    public function regresar(){
        echo "<div class=table-resposive>";
        echo "<form action='TestMateria.php' method='post' name='maestro' id='maestro'>";
        echo "<br><br>";
        echo "<table>
                <tr><td align='center'>";
        echo "<input type='submit' name='falso' id=submit value='Regresar' class='btn btn-default' ></td></tr></table>";
        echo" </form>
            </div>";
    }

    public function materiasAsignadas1($a,$x){

        $sql="SELECT * from ejercicio1.MateriaMaestro WHERE Id_Maestro=$a";
        echo "<div class=table-resposive>";
        echo "<form action='TestMateria.php' method='post' name='maestro' id='maestro'>";
        $consulta=mysql_query($sql) or die ("Error en $sql");
        $cuantos=mysql_num_rows($consulta);
        if($cuantos>0) {
            echo "<table class='table table-bordered table table-striped'>";
            echo "<tr><th>ID</th><th>Materia</th></tr>";
            while ($b = mysql_fetch_array($consulta)) {
                $id = $b["ID_Materia"];
                $sql02 = "SELECT * from ejercicio1.Materia WHERE ID=$id;";
                $consulta02 = mysql_query($sql02) or die ("Error en $sql02");
                $id2 = mysql_result($consulta02, 0, 'ID');
                $materia = mysql_result($consulta02, 0, 'Materia');
                echo "<tr><td>$id2</td><td>".utf8_decode($materia)."</td></tr>";
            }
            echo "</table>";
        }
        else {
            if($x==3) {
                echo "<br><br></ber> <strong> No hay  materias asignadas a esté Alumno.<br>Favor de consultar con el Administrador.</strong>";
            }
            if($x==2) {
                echo "<br><br></ber> <strong> No hay  materias asignadas a esté Maestro.<br>Favor de consultar con el Administrador. </strong>";
            }
        }
        echo "<br><br>";


    }

}

?>