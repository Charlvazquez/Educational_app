<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistema de Escolar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

</head>


<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Registro de usuario</h4>
                                    <?php
                                        require './conexion/db.php';
                                        if($_POST)
                                        {
                                            $usuario = $_POST['usuario'];
                                            $contraseña = $_POST['contraseña'];

                                            $sql_query = "INSERT INTO login (usuario,password) VALUES (?,?)";
                                            $sentencia_agregar = $conexion->prepare($sql_query);
                                            $sentencia_agregar->execute(array($usuario,$contraseña));
                                            $sentencia_agregar = null;
                                            $conexion = null;
                                            echo'
                                            <script type="text/javascript"> 
                                                alert("¡Usuario Agregado Exitosamente!"); 
                                            </script> ';

                                        }
                                    ?>
                                    <form action="#" method="POST">
                                        <div class="form-group">
                                            <label><strong>Escribe tu usuario</strong></label>
                                            <input type="text"  name="usuario" class="form-control" placeholder="username">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Escribe una contraseña</strong></label>
                                            <input type="password"  name="contraseña" class="form-control" value="Password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>¿Ya tienes una cuenta creada? <a class="text-primary" href="login.php">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <!--endRemoveIf(production)-->
</body>

</html>