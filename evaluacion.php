<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistema de Escolar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
     <!-- Toastr -->
     <link rel="stylesheet" href="./vendor/toastr/css/toastr.min.css">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php require 'components/navbar.php'?>
       
        <?php require "components/menu.php"?>
       
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
                        </ol>
                    </div>
                </div>
                <?php
                    require './conexion/db.php';
                    if($_POST)
                    {
                        $bimestre = $_POST['bimestre'];
                        $tareas = $_POST['tareas'];
                        $cal = $_POST['calificacion'];
                        $actividades = $_POST['actividades'];
                        $docente = $_POST['docente'];
                        $alumno = $_POST['alumno'];
                        $materias = $_POST['materia'];

                        $sql_query = "INSERT INTO evaluacion (bimestre,tareas,examen,actividades_bimestre,id_materia,id_docente,id_alumno) VALUES (?,?,?,?,?,?,?)";
                        $sentencia_agregar = $conexion->prepare($sql_query);
                        $sentencia_agregar->execute(array($bimestre,$tareas,$cal,$actividades,$materias,$docente,$alumno));
                        $sentencia_agregar = null;
                        $conexion = null;
                        echo'
                        <script type="text/javascript"> 
                            alert("Registro exitoso"); 
                        </script> ';

                    }
                ?>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Registro de Evaluaciones</h4>
                            </div>
                            <div class="card-body">

                            <form action="#" id="step-form-horizontal" class="step-form-horizontal" method="POST">
                                    <div>
                                        <h4>Personal Info</h4>
                                            <div class="row">
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Seleccione Bimestre</label>
                                                        <input type="text" name="bimestre" class="form-control" placeholder="Parsley" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Agregue cantidad de tareas</label>
                                                        <input type="text" name="tareas" class="form-control" placeholder="Montana" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Agregue de cantidad de calificaciones</label>
                                                        <div class="input-group">
                                                            <input type="text" name="calificacion" class="form-control" placeholder="(+1)408-657-9007" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Agregue cantidad de actividades</label>
                                                        <div class="input-group">
                                                            <input type="text" name="actividades" class="form-control" placeholder="(+1)408-657-9007" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Seleccione materia</label>
                                                        <select name="materia" id="CATEGORIAPA" class="form-select" aria-label="Default select example">
                                                            <option selected>Selecione una materia:</option>
                                                            <?php
                                                            require './conexion/db.php';
                                                            $consulta = "SELECT * FROM materias";
                                                            $resultado = $conexion->prepare($consulta);
                                                            $resultado->execute();
                                                            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                                                                ?>
                                                            
                                                            <option value="<?php echo $row['materia']?>"><?php echo $row['materia']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Seleccione docente</label>
                                                        <div class="input-group">
                                                            <input type="text" name="docente" class="form-control" placeholder="(+1)408-657-9007" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Seleccione alumno</label>
                                                        <div class="input-group">
                                                            <input type="text" name="alumno" class="form-control" placeholder="(+1)408-657-9007" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="d-flex justify-content-center ">  
                                        <button type="submit" class="btn btn-success mt-3" style="font-family: 'Mukta', sans-serif;" >Enviar</button>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    


    <!-- Toastr -->
    <script src="./vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="./js/plugins-init/toastr-init.js"></script>
    

    <script src="./vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="./js/plugins-init/jquery.validate-init.js"></script>


</body>

</html>