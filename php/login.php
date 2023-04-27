<?php
include('config.php');
session_start();



if (isset($_POST['login'])) {

$email = $_POST['email'];
$password_user = $_POST['password'];

$query = $connection->prepare("SELECT * FROM usuario WHERE email='$email' /*AND contraseña='$password_user'*/");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

$nombre = $result['nombre'];

echo "hola ".$nombre . " " . $email . " " . $password;



}
?>
