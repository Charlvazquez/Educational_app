<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistema de Escolar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
        <?php require 'components/navbar.php' ?>
        

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require 'components/menu.php' ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Datatable</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Bimestre</th>
                                                <th>tareas</th>
                                                <th>examen</th>
                                                <th>actividades</th>
                                                <th>materia</th>
                                                <th>Nombre Alumno</th>
                                                <th>Nombre Docente</th>
                                                <th>Calificacion</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $totalTareas = 20;
                                                $calificacionAprobatoria = 10;
                                                $totalExamen = 20;
                                                $totalActividades = 30;
                                                require 'controllers/listaEvaluacion.php';
                                                foreach ($evaluaciones as $evaluacion) {
                                                ?>
                                                <tr>
                                                    <td><?php print($evaluacion->bimestre)?> </td>
                                                    <td><?php print($evaluacion->tareas)?> </td>
                                                    <td><?php print($evaluacion->examen)?> </td>
                                                    <td><?php print($evaluacion->actividades_bimestre)?> </td>
                                                    <td><?php print($evaluacion->materia)?> </td>
                                                    <td><?php print($evaluacion->alumno)?> </td>
                                                    <td><?php print($evaluacion->docente)?> </td>
                                                    <td><?php echo(($evaluacion->valor) * ($calificacionAprobatoria) / ($totalExamen + $totalTareas + $totalActividades))?> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
        <?php require 'components/footer.php' ?>

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    


    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

</body>

</html>