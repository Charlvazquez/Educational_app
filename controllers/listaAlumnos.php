<?php
    require './conexion/db.php';
    $consulta = "SELECT CONCAT(Al.Nombre,' ',Al.Apellidos) AS alumno,Al.Tel,CONCAT(Doc.Nombre,' ',Doc.Apellidos) AS docente ,Gp.grupo,Gd.grado FROM alumnos Al 
    INNER JOIN docentes Doc ON Al.id_docente =  Doc.id_docente
    INNER JOIN grupo Gp ON Al.id_Grupo = Gp.id_grupo
    INNER JOIN grado Gd ON Al.id_Grado = Gd.id_grado";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $alumnos=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
