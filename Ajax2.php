<?php
require ('Materia.php');
require ('header.php');
require ('db.php');
$materia=new Materia();
$id_grupo=$_POST['idg'];
$materia->datosGrupos($id_grupo);
$materia->gruposAsignados($id_grupo);
$materia->asignarMateriaGrupo($id_grupo);
require ('footer.php');
