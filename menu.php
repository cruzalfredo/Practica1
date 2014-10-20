<?php
require('seguridad.php');
?>

<div class='navbar navbar-default navbar-fixed-top'>
    <div class='container'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.navbar-collapse'>
                <span class='sr-only'>Toggle navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='#'>Practica 1</a>
        </div>

        <?php
        $idu=$_COOKIE['idu'];
        $sql01="SELECT Nombre,ApellidoMaterno,ApellidoPaterno,Nivel FROM usuario WHERE ID=$idu;";
        $consulta=mysql_query($sql01) or die ("error en consulta: $sql01");
        $nombre= utf8_decode(mysql_result($consulta,0,'Nombre')." ".mysql_result($consulta,0,'ApellidoPaterno')." ".mysql_result($consulta,0,'ApellidoMaterno'));
        $nivel=mysql_result($consulta,0,'Nivel');

if($nivel==1) {
    echo "
        <div class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
                <li class='active'><a href='index3.php'>Inicio</a></li>
                <li class='dropdown'>
                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>Alumnos <span class='caret'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li><a href='asignar-alumnos.php?action=Alta'>Nuevo</a></li>
                        <li><a href='asignar-alumnos.php?action=Consulta'>Consulta</a></li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>Maestros <span class='caret'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li><a href='asignar-maestro.php?action=Alta'>Nuevo</a></li>
                        <li><a href='asignar-maestro.php?action=Consulta'>Consulta</a></li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>Materia <span class='caret'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li><a href='asignar-materias.php?action=Alta'>Nuevo</a></li>
                        <li><a href='asignar-materias.php?action=Consulta'>Consulta</a></li>
                        <li><a href='TestMateria.php?action=0&nivel=2'>Asignar Materia a Maestro</a></li>
                        <li><a href='TestMateria.php?action=0&nivel=3'>Asignar Materia a Alumno</a></li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Grupos <span class='caret'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li><a href='asignar-grupos.php?action=Alta'>Nuevo</a></li>
                        <li><a href='asignar-grupos.php?action=Consulta'>Consulta General</a></li>
                        <li><a href='TestGrupo.php?action=Alta'>Alumnos por Grupo</a></li>
                    </ul>
                </li>
                <li class='active'><a href='CerrarSesion.php'>Cerrar Sesión</a></li>
            </ul>

            <p></p>
<p align='right'>$nombre</p>


        </div><!--/.nav-collapse -->";
}
        if($nivel==2){
            echo "
        <div class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
                <li class='active'><a href='index3.php'>Inicio</a></li>


                <li class='dropdown'>
                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>Materia <span class='caret'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li><a href='Ajax.php?idmae=$idu&nivel=$nivel'>Materias</a></li>

                    </ul>
                </li>
<li class='active'><a href='CerrarSesion.php'>Cerrar Sesión</a></li>
            </ul>

            <p></p>
<p align='right'>$nombre</p>

        </div><!--/.nav-collapse -->";

        }

        if($nivel==3) {
            echo "
        <div class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
                <li class='active'><a href='index3.php'>Inicio</a></li>

                <li class='dropdown'>
                    <a href='' class='dropdown-toggle' data-toggle='dropdown'>Materia <span class='caret'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li><a href='Ajax.php?action=1&idmae=$idu&nivel=$nivel'>Materias</a></li>

                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Grupos <span class='caret'></span></a>
                    <ul class='dropdown-menu' role='menu'>
                        <li><a href='TestGrupo.php?action=Buscar&id=$idu'>Grupo</a></li>
                    </ul>
                </li>

                 <li class='active'><a href='CerrarSesion.php'>Cerrar Sesión</a></li>
            </ul>

            <p></p>
<p align='right'>$nombre</p>

        </div><!--/.nav-collapse -->";
        }

        ?>


    </div>

</div>

