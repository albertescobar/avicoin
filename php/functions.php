<?php

  //per eliminar la cookie inici sessió i tornar al login
  //per desencriptar
  $ciphering = "AES-128-CTR";
  $option = 0;
  $dencryption_key= "avicoin";
  $dencryption_iv= '1234567890168597';

  if(!empty($_COOKIE["usuari"]))
  {

  //per obrir array cookie
  $usuari_decrypt = json_decode($_COOKIE['usuari'], true);


  $dencryption_nombre_bbdd = openssl_decrypt($usuari_decrypt['nombre_array'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_email_bbdd = openssl_decrypt($usuari_decrypt['email_array'],$ciphering,$dencryption_key,$option,$dencryption_iv);
  $dencryption_password_bbdd = openssl_decrypt($usuari_decrypt["password_array"],$ciphering,$dencryption_key,$option,$dencryption_iv);

}
?>
