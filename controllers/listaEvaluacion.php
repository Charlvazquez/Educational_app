<?php
    require './conexion/db.php';
    $consulta = "SELECT Ev.bimestre,Ev.tareas,Ev.examen,Ev.actividades_bimestre,Ma.materia AS materia ,CONCAT(Al.Nombre,' ',Al.Apellidos) AS alumno,CONCAT(Doc.Nombre,' ',Doc.Apellidos) AS docente, SUM(Ev.tareas + Ev.examen + Ev.actividades_bimestre) AS valor FROM evaluacion Ev 
    INNER JOIN docentes Doc ON Ev.id_docente =  Doc.id_docente
    INNER JOIN materias Ma ON Ev.id_materia = Ma.id_materia
    INNER JOIN alumnos Al ON Ev.id_alumno = Al.id_alumno";
    $stmt = $conexion->prepare($consulta);
    $result = $stmt->execute();
    $evaluaciones = $stmt->fetchAll(\PDO::FETCH_OBJ);
?>
