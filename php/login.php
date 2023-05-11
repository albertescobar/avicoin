<?php
include('config.php');
session_start();



if (isset($_POST['login'])) {

$email = $_POST['email'];
$password_user = $_POST['password'];

$query = $connection->prepare("SELECT * FROM usuario WHERE email='$email' AND password=$password_user");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

$nombre_bbdd = $result['nombre'];
$email_bbdd = $result['email'];
$password_bbdd = $result["password"];

if($email_bbdd==$email && $password_user==$password_bbdd){
echo "hola ";
}else{
  echo "error login ";
}//end else

}//end if isset
?>
