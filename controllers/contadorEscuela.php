<?php
    require './conexion/db.php';
    $consulta = "SELECT COUNT(*) AS alumnos FROM alumnos";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $alumnos=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    require './conexion/db.php';
    $consulta = "SELECT COUNT(*) AS maestros FROM docentes";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $maestros=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>