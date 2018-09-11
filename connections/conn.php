<?php
//estabelecer ligação a BD cms com o user criado
//Dados de acesso a db
$user = "root";
$pass = "";
$servername = "localhost";

//Estabelecer ligação a db

$conn = mysqli_connect($servername, $user, $pass);

if(!$conn){
    die("Erro Ligação: " .mysqli_connect());
}
mysqli_select_db($conn, "corkexpress");
mysqli_set_charset($conn, 'utf8')
 ?>
