
<?php
    require '../models/User.php';


    $user = new User();
    $name = "";
    $username = "";
    $pwd = "";
    $email = "";


    // Verificamos el formulario, tanto si está instanciado como si contiene valores
    if(isset( $_POST) && !empty($_POST)) {

        // Recorremos los campos del form y los almacenamos
        foreach ($_POST as $key => $value){
            // Agregamos un poco de seguridad para evitar SqlInjection
            $$key = addslashes($value);
        }

        $user->setName($name);
        $user->setUsername($username);
        //
        $user->setPwd(password_hash($pwd, PASSWORD_DEFAULT));
        $user->setEmail($email);

        $user->insert($user);

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>DES | Ejercicio 3</title>
    <meta content="Elio Camisón Costa" name="author" />
    <meta content="Login" name="description" />

    <!-- favicon -->
    <link rel="icon" type="image/vnd.microsoft.icon" href="../assets/img/favicon/favicon.ico">

    <!-- jQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- FontAwesome   -->
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/custom_css/restyle.css" type="text/css" media="screen" />

</head>

<body>

<nav role="navigation" class="navbar custom-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">DevelopmentSite</a>
        </div>
        <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="#">Home</a></li>-->
            <li><a href="#">DES</a></li>
            <li><a href="#">DIS</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php"><i class="fa fa-sign-in"></i></span> Inicia sesión</a></li>
        </ul>
    </div>
</nav>
<!-- BEGIN SECTION -->
<section>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <h2 class="signup-title">Regístrate</h2>
                <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="text" name="name" placeholder="Nombre...">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="email" name="email" placeholder="Email...">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fa fa-id-card' aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="text" name="user_id" placeholder="Nombre de usuario...">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="password" name="pwd" placeholder="Contraseña...">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="password" name="pwd_repeat" placeholder="Repita la contraseña">
                    </div>
                    <button class="btn btn-primary custom_button" type="submit">Regístrarse</button>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- END SECTION -->

<footer class="fixed-bottom container">
    <div>
        <p><a href="mailto:eliocamison@gmail.com">eliocamison@gmail.com</a></p>
    </div>
</footer>

</body>
</html>
