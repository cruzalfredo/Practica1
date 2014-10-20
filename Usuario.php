<?php
class Usuario {
    private $Id;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contarsena;
    private $Nivel;
    private $Estatus;

    public function createUsuario($nombre,$apellidop,$apellidom,$nivel){
        //echo "<br>createUsuario";
        $bandera=0;
        if($nombre==""){
            $bandera=1;
            echo "<br>El campo Nombre se encuentra vacío";
        }
        if($apellidop==""){
            $bandera=1;
            echo "<br>El campo Apellido Paterno se encuentra vacío";
        }
        if($apellidom==""){
            $bandera=1;
            echo "<br>El campo Apellido Materno se encuentra vacío";
        }

        if($bandera==0) {
            $sql = "INSERT INTO ejercicio1.usuario(Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus) values('" . utf8_encode($nombre) . "','" . utf8_encode($apellidop) . "','" . utf8_encode($apellidom) . "','$nivel',1);";
            $consulta = mysql_query($sql) or die ("Error al insertar usuario <br>  $sql <br>");
            if ($nivel == 3) {
                echo "<br>Alumno Agregado";
            }
            if ($nivel == 2) {
                echo "<br>Maestro Agregado";
            }
        }

    }
    public function readUsuarioG($nivel){
        //echo "<br>readUsuarioG";
        $sql01="SELECT * FROM ejercicio1.usuario WHERE Nivel=$nivel AND Estatus=1 ORDER BY ApellidoPaterno ASC";

        $result01=mysql_query($sql01)or die ("Error en consulta readUsuarioG: $sql01");
        echo "<div class=table-resposive>";
        echo "<table class=\"table table-striped table-bordered table table-striped\">";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr>";
        while($field=mysql_fetch_array($result01))
        {
            $this->Id=$field['ID'];
            $this->Nombre=utf8_decode($field['Nombre']);
            $this->ApellidoPaterno=utf8_decode($field['ApellidoPaterno']);
            $this->ApellidoMaterno=utf8_decode($field['ApellidoMaterno']);
            $this->Telefono=$field['Telefono'];
            $this->Calle=$field['Calle'];
            $this->NumeroExterior=$field['NumeroExterior'];
            $this->NumeroInterior=$field['NumeroInterior'];
            $this->Colonia=$field['Colonia'];
            $this->Municipio=$field['Municipio'];
            $this->Estado=$field['Estado'];
            $this->CP=$field['CP'];
            $this->Correo=$field['Correo'];
            $this->Usuario=$field['Usuario'];
            $this->Contarsena=$field['Contrasena'];
            $this->Nivel=$field['Nivel'];
            $this->Estatus=$field['Estatus'];

            echo "<tr>";
            echo "<td> $this->Id</td>";
            echo "<td> $this->Nombre</td>";
            echo "<td> $this->ApellidoPaterno</td>";
            echo "<td> $this->ApellidoMaterno</td>";
            if($nivel==3){
                echo "<td><a href='asignar-alumnos.php?submit=Borrar&borrar=$this->Id'>Eliminar</a> |  <a href='asignar-alumnos.php?action=Modificar&modificar=$this->Id'>Modificar</a></td>";
            }
            if($nivel==2){
                echo "<td><a href='asignar-maestro.php?submit=Borrar&borrar=$this->Id'>Eliminar</a> |  <a href='asignar-maestro.php?action=Modificar&modificar=$this->Id'>Modificar</a></td>";
            }
            echo "</tr>";
        }
        echo"</table>";
        echo "</div>";

    }
    public function readUsuarioS($id_usuario,$nivel){
        //echo "<br>readUsuarioS";

        $sql01="SELECT * FROM ejercicio1.usuario WHERE ID=$id_usuario AND Nivel=$nivel  ORDER BY ApellidoPaterno ASC;";
        $result01=mysql_query($sql01)or die ("Error en consulta readUsuarioS");
        $cuantos=mysql_num_rows($result01);
        if($cuantos>0) {
            echo "<div class=table-resposive>";
            echo "<table class=\"table table-striped table-bordered table table-striped\">";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr>";
            while ($field = mysql_fetch_array($result01)) {
                $this->Id = $field['ID'];
                $this->Nombre = utf8_decode($field['Nombre']);
                $this->ApellidoPaterno = utf8_decode($field['ApellidoPaterno']);
                $this->ApellidoMaterno = utf8_decode($field['ApellidoMaterno']);
                $this->Telefono = $field['Telefono'];
                $this->Calle = $field['Calle'];
                $this->NumeroExterior = $field['NumeroExterior'];
                $this->NumeroInterior = $field['NumeroInterior'];
                $this->Colonia = $field['Colonia'];
                $this->Municipio = $field['Municipio'];
                $this->Estado = $field['Estado'];
                $this->CP = $field['CP'];
                $this->Correo = $field['Correo'];
                $this->Usuario = $field['Usuario'];
                $this->Contarsena = $field['Contrasena'];
                $this->Nivel = $field['Nivel'];
                $this->Estatus = $field['Estatus'];
                echo "<tr>";
                echo "<td> $this->Id</td>";
                echo "<td> $this->Nombre</td>";
                echo "<td> $this->ApellidoPaterno</td>";
                echo "<td> $this->ApellidoMaterno</td>";
                if ($nivel == 3) {
                    echo "<td><a href='asignar-alumnos.php?submit=Borrar&borrar=$this->Id'>Eliminar</a> |  <a href='asignar-alumnos.php?action=Modificar&modificar=$this->Id'>Modificar</a></td>";
                }
                if ($nivel == 2) {
                    echo "<td><a href='asignar-maestro.php?submit=Borrar&borrar=$this->Id'>Eliminar</a> |  <a href='asignar-maestro.php?action=Modificar&modificar=$this->Id'>Modificar</a></td>";
                }
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
        }
        else{
            echo"<br><strong>No se encuentran resultados.</strong><br>";
        }
    }
    public function updateUsuario($id,$nombre,$app,$apm,$nivel,$estatus){
        //echo "<br>updateUsuario";

        $sql="UPDATE ejercicio1.usuario SET  Nombre='".utf8_encode($nombre)."', ApellidoPaterno='".utf8_encode($app)."', ApellidoMaterno='".utf8_encode($apm)."', Nivel='$nivel', Estatus='$estatus' WHERE ID=$id;";
        $consulta=mysql_query($sql) or die ("Error al insertar usuario <br>  $sql <br>");
        if($nivel==3){
            echo "<br>Alumno Modificado";
        }
        if($nivel==2){
            echo "<br>Maestro Modificado";
        }


    }
    public function deleteUsuario($a){
        //echo "<br>deleteUsuario";
        $sql="DELETE FROM ejercicio1.Usuario where ejercicio1.Usuario.ID=$a";
        $consulta=mysql_query($sql) or die ("Error al eliminar usuario <br>  $sql <br>");
    }



}


?>