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
                                        <?php
                                            if($_POST){
                                            session_start();
                                            require './conexion/db.php';
                                            $usuario = $_POST['usuario'];
                                            $password = $_POST['password'];

                                            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            $query = $conexion->prepare("SELECT * FROM login WHERE usuario= :u AND password=:p");
                                            $query->bindParam(":u", $usuario);
                                            $query->bindParam(":p", $password);
                                            $query->execute();
                                            $usuario = $query->fetch(PDO::FETCH_ASSOC);
                                            if($usuario){
                                                $_SESSION['usuario'] = $usuario["usuario"];
                                                header("location:  index.php");
                                            }else{
                                                echo '<script language="javascript">alert("El usuario no existe.");</script>';
                                            }
                                            }

                                        ?>
                                    <h4 class="text-center mb-4">Login Administrativo</h4>
                                    <form action="#" method="POST">
                                        <div class="form-group">
                                            <label><strong>Ingresa tu usuario</strong></label>
                                            <input type="text" name="usuario" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Contraseña</strong></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                            </div>
                                        
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>¿No tienes una cuenta? <a class="text-primary" href="registroUsuario.php">Registro</a></p>
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
    <script src="./js/custom.min.js"></script>

</body>

</html>