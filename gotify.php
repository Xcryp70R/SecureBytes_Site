<?php
    $usuario = "";
    $llave1 = "";
    $llave2 = "";
    $errors = array();

    // connect to the database

    $db = mysqli_connect('localhost', 'root', '3hWgBDtSZZZ4zmqk', 'db_userinfo');
    //$db->set_charset("utf8");
    if (!$db->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $db->error);
    } else {
        printf("Current character set: %s\n", $db->character_set_name());
    }
    echo "database connected \n";

    // if the register button is clicked
    
    $usuario = htmlspecialchars($_POST['usuario']);
    $llave1=htmlspecialchars($_POST['llave1']);
    $llave2=htmlspecialchars($_POST['llave2']);

    //$usuario = $_POST['usuario'];
    //$llave1 = $_POST['llave1'];
    //$llave2 = $_POST['llave2'];

   $llave1 = $db->real_escape_string($llave1);
   $llave2 = $db->real_escape_string($llave2);
   echo "llave1 despues RralEScape es $llave1 \n";
   
    
    echo "Datos Recibidos \n";

    // if there are no errors, save user to database
    if($usuario != "" and $llave1!="" and $llave2!=""){

    $sql = "INSERT INTO datos(usuario,llave1,llave2) VALUES('$usuario','$llave1','$llave2')";
    
    
    mysqli_query($db, $sql);
    echo "Datos Agregados Exitosamente";
    }
    ?>