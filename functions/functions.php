<?php
function login($username,$password){
  if(empty($username)  || empty($password)){
    echo 'Preenche os dados sff!';
  }else{
  include 'connections/conn.php';
  $q = mysqli_query($conn,
  "SELECT utilizador.id_users, utilizador.email, utilizador.password, utilizador.nome_users, departamento.id_depart FROM utilizador
  left join categprofissional on categprofissional.id_catprof = utilizador.id_catprof
  left join departamento on departamento.id_depart = categprofissional.id_departamento
  WHERE utilizador.email = '$username' AND utilizador.password = '$password'");
  $a = mysqli_fetch_array($q);
  if(!$a){
      echo 'Erro: Dados Errados';
  }else{
      session_start();
      $_SESSION["iduser"] = $a["id_users"];
      $_SESSION["nome"] = $a["nome_users"];
      $_SESSION["email"] = $a["email"];
      $_SESSION["departamento"] = $a["id_depart"];
      echo '<meta http-equiv="refresh" content="0;url=platform.php">';
  }
  include 'connections/dconn.php';
}
}

function validacao(){
    if(!$_SESSION["iduser"]){
      echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }
}
 ?>
