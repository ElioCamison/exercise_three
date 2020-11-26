<?php
include_once '../header.php';
?>

<?php
require '../models/User.php';



$user = new User();

$name = "";
$username = "";
$pwd = "";
$email = "";

if(isset( $_POST) && !empty($_POST)) {

    foreach ($_POST as $key => $value){
        $$key = addslashes($value);
    }

    $test = $user->login($username,$email,$pwd);
    echo $test;
    echo"<p>aaaaaaaaaaaaaaaaa</p>";
}


?>

<section class="signup-form">
    <h2>Registrate</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group row">
            <input type="text" name="user_id" placeholder="Nombre de usuario / email...">
            <input type="password" name="pwd" placeholder="Contraseña...">
            <button type="submit">Iniciar sesión</button>
        </div>
    </form>
</section>



<?php
include_once '../footer.php';
?>
