<?php
include('config.php');
include('functions.php');
session_start();

if(empty($_COOKIE["usuari"]))
{

echo "no hi ha cookie";
}
else{
  loggin();
  $nom_cookie = $dencryption_nombre_bbdd;
  $email_cookie = $dencryption_email_bbdd;
  $passwordcookie = $dencryption_password_bbdd;
  echo "hi ha cookie ".$nom_cookie.$email_cookie.$passwordcookie;
}

if (isset($_POST['login'])) {

$email = $_POST['email'];
$password_user = $_POST['password'];

$query = $connection->prepare("SELECT * FROM usuario WHERE email='$email' AND password=$password_user");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

$nombre_bbdd = $result['nombre'];
$email_bbdd = $result['email'];
$password_bbdd = $result["password"];

//per encriptar les dades recueprades i guardar-les a les cookies
$ciphering = "AES-128-CTR";
$option = 0;
$encryption_key= "avicoin";
$encryption_iv= '1234567890168597';

$encryption_nombre_bbdd = openssl_encrypt($nombre_bbdd,$ciphering,$encryption_key,$option,$encryption_iv);
$encryption_email_bbdd = openssl_encrypt($email_bbdd,$ciphering,$encryption_key,$option,$encryption_iv);
$encryption_password_bbdd = openssl_encrypt($password_bbdd,$ciphering,$encryption_key,$option,$encryption_iv);

if($email_bbdd==$email && $password_user==$password_bbdd){
echo "hola ";
$usuari = array(
  "nombre_array" => $encryption_nombre_bbdd,
  "email_array" => $encryption_email_bbdd,
  "password_array" => $encryption_password_bbdd,

);//end if

//cookie amb array
setcookie ("usuari",json_encode($usuari),time()+ (60*60*24*365),"/");
}else{
  echo "error login ";
}//end else

}//end if isset

function loggin(){
  echo "loggin";
}
?>
