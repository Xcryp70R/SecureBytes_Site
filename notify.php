<?php

   
     
//$mailfrom=$_POST['email'];
//$name=$_POST['name'];
$rcpto="ceo@securebytes.co";
//$message=$_POST['message'];

$DataToSend="Datos: perrillo de rio" ;
//$DataToSend->CharSet = 'UTF-8';
mail($rcpto,"Nuevo Host",$DataToSend);

?>