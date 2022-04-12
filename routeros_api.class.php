# mk api conection class
<?php require_once("routeros_api.class.php");
include_once("uno.html"); ?>

<?php

  $API = new RouterosAPI();
  $API->debug = true;
  $ipMK='10.100.160.2'; 
  $userMK= "developerapi";
  $passwordMK = "123456789";
 
 if ($API->connect($ipMK, $userMK, $passwordMK)) { #Conection API
  echo "Conexion establecida";
}else{
  echo "Conexion no establecida";
}