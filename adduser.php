# mk api conection class
<?php require_once("routeros_api.class.php");?>

<?php

  $API = new RouterosAPI();
  $API->debug = true;
  $ipMK='0.0.0.0'; 
  $userMK= "demouser";
  $passwordMK = "demoapi";
 
 if ($API->connect($ipMK, $userMK, $passwordMK)) { #Conection API
        #Add user in hotspot
        $ARRAY2 = $API->comm("/ip/hotspot/user/add", array(
        "name" => $_POST["name"],
        "password" => $_POST["password"],
        "profile" => "3megas",
        "comment" => "Prueba de usuario HOTSPOT",
        "server" => "hotspot1",
    ));
    
    #this check if user name already exists
   if(isset($ARRAY2['!trap'][0]['message']) == "failure: already have user with this name for this server"){
        echo "<br/>";
        echo "<br><br>Fallo en el registro: Usuario ya existe<br>";
    }else{
      header("Location: http://hotspot/login");
    }
}