<?php
    include_once '../header.php';
?>

<?php
require '../models/User.php';



$user = new User();

$user->getUsers();

$name = "";
$username = "";
$pwd = "";
$email = "";



if(isset( $_POST) && !empty($_POST)) {

    foreach ($_POST as $key => $value){
        $$key = addslashes($value);
    }

    $user->setName($name);
    $user->setUsername($username);
    $user->setPwd(md5($pwd));
    $user->setEmail($email);

    $user->insertUser($user->getName(),$user->getPwd(),$user->getUsername(),$user->getEmail());

}


?>

    <section class="signup-form">
        <h2>Registrate</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group row">
                <input type="text" name="name" placeholder="Nombre...">
                <input type="email" name="email" placeholder="Email...">
                <input type="text" name="user_id" placeholder="Nombre de usuario...">
                <input type="password" name="pwd" placeholder="Contraseña...">
                <input type="password" name="pwd_repeat" placeholder="Repita la contraseña">
                <button type="submit">Registrarse</button>
            </div>

        </form>

    </section>



<?php
    include_once '../footer.php';
?>
