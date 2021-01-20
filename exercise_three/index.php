<?php
    require './connection/Dbh.php';
    //Creamos una connexión con la base de datos
    $conn = Dbh::getConnection();

    if(isset( $_POST) && !empty($_POST)) {

        $stmt = $conn->prepare("SELECT * FROM user WHERE userEmail = ? AND userPwd = ?");
        $stmt->execute([addslashes($_POST['email']), addslashes($_POST['pwd']) ]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        // En el login no se puede construir el obj, se debe devolver
        // el objeto usuario en caso de que exista o en caso contrario
        // se debe de enviar al formulario de registro
        if($user){
            session_start();
            $_SESSION['user']=$user;
            //Cerramos la sesión de la base de datos
            Dbh::closeConnection($conn);

            header("Location:http://localhost/practicas/des/exercise_three/includes/registered.php");
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>DES | Ejercicio 3</title>
        <meta content="Elio Camisón Costa" name="author" />
        <meta content="Login" name="description" />

        <!-- jQuery  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- FontAwesome   -->
        <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="./assets/custom_css/restyle.css" type="text/css" media="screen" />

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body>
        <!-- BEGIN NAV -->
        <nav role="navigation" class="navbar custom-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">DevelopmentSite</a>
                </div>
                <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="#">Home</a></li>-->
                    <li><a href="#">DES</a></li>
                    <li><a href="#">DIS</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./includes/signup.php"><i class="fa fa-user"></i> Registrate</a></li>
                </ul>
            </div>
        </nav>
        <!-- END NAV -->

        <!-- BEGIN CONTAINER -->
        <div class="container-fluid h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- BEGIN FORM -->
                    <form id="login-form" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input class="form-control" maxlength="150" type="text" name="email" autocomplete="email" placeholder="Email..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input class="form-control" type="password" name="pwd" autocomplete="current-password" placeholder="Contraseña..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <button class="btn btn-primary custom_button" type="submit">Iniciar sesión</button>
                    </form>
                    <!-- END FORM -->
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <footer>
            <div>
                <p><a class="custom-footer" href="mailto:eliocamison@gmail.com">eliocamison@gmail.com</a></p>
            </div>
        </footer>
        <!-- END FOOTER -->
    </body>
    <!-- END BODY -->
</html>
<script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('login-form');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>