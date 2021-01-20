
<?php
session_start();
require '../connection/Dbh.php';

$conn = Dbh::getConnection();

echo "<pre style='color: white'>";
print_r($_SESSION['user']);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>DES | Ejercicio 3</title>
    <meta content="Elio Camisón Costa" name="author" />
    <meta content="Login" name="description" />

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
                    <li><a href="./signup.php"><i class="fa fa-user"></i> Registrate</a></li>
                </ul>
            </div>
        </nav>
        <!-- END NAV -->

        <!-- BEGIN SECTION -->
        <section>s
            <h3 class="registered-title">¡Enhorabuena te has registrado con éxito!!</h3>
            <div class="row justify-content-center h-90">
                <!-- BEGIN TABLE -->
                <table class="table" ">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nobre de usuario</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM user");
                            $stmt->execute();
                            while ($row = $stmt->fetch()){
                                echo "<tr>";
                                echo "<td>".$row['userName']."</td>";
                                echo "<td>".$row['userUid']."</td>";
                                echo "<td>".$row['userEmail']."</td>";
                                echo "<td>";
                                echo "<button class='btn btn-primary btn-sm button-edit' onclick=''>Editar</button>";
                                echo "<button class='btn btn-danger btn-sm button-delete' onclick=''>Eliminar</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <!-- END TABLE -->
            </div>
        </section>
        <!-- END SECTION -->

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