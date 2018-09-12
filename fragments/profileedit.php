   <div class="card">
       <div class="card-body card-block">

           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
             <?php
              $erro="";
              include 'connections/conn.php';
              $edit = mysqli_fetch_array(mysqli_query($conn, "SELECT * from utilizador where id_users = '$_SESSION[iduser]'"));
              include 'connections/dconn.php';
             ?>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Nome</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="nome_users" placeholder="Nome do colaborador" class="form-control" value="<?php echo ''.$edit["nome_users"].''?>"disabled>
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="email-input" class=" form-control-label">E-mail</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="email" id="email-input" name="email" placeholder="nomedocolaborador.numerodocolaborador@empresa.pt" class="form-control" value="<?php echo ''.$edit["email"].''?>">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Morada</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="morada" placeholder="Morada do colaborador" class="form-control"value="<?php echo ''.$edit["morada"].''?>">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NIF</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="nif" placeholder="NIF do colaborador" class="form-control" value="<?php echo ''.$edit["nif"].''?>"disabled>
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NISS</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="niss" placeholder="NISS do colaborador" class="form-control" value="<?php echo ''.$edit["niss"].''?>"disabled>
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NIB Atual</label>
                   </div>
                   <div class="col col-md-3">
                       <input type="text" id="text-input" name="nibCurrente" placeholder="NIB do colaborador" class="form-control" value="<?php echo ''.$edit["nib"].''?>"disabled>
                   </div>
                   <div class="col col-md-1">
                       <label for="text-input" class=" form-control-label">NIB Novo</label>
                   </div>
                   <div class="col col-md-3">
                       <input type="text" id="text-input" name="nibNovo" placeholder="Preencha caso deseja alterar o seu NIB" class="form-control" >
                   </div>
                   <div class="col col-md-2">
                     <button type="submit" class="btn btn-warning btn-sm" name="nibChange" value="<?php echo ''.$edit["nib"].''?>">
                         <i class="fa fa-dot-circle-o"></i> Submeter
                     </button>
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Telemóvel</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="tel" id="text-input" name="telemovel" placeholder="900000" class="form-control" value="<?php echo ''.$edit["telemovel"].''?>">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Data de nascimento</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="date" id="text-input" name="datanasc" placeholder="" class="form-control" value="<?php echo ''.$edit["datanasc"].''?>" disabled>
                   </div>
               </div>
               <!--É A MERDA DE UM WHILE-->
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="select" class=" form-control-label">Categoria profissional</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <select name="id_catprof" id="select" class="form-control" value="<?php echo ''.$edit["id_catprof"].''?>" disabled>
                         <?php
                         include 'connections/conn.php';
                           $opcoes = mysqli_query($conn, "SELECT id_catprof, nome_catprof from categprofissional where id_catprof = '$edit[id_catprof]'");
                           while($eopcoes = mysqli_fetch_array($opcoes)){
                             echo'<option value="'.$eopcoes["id_catprof"].'">'.$eopcoes["nome_catprof"].'</option>';
                           }
                           include 'connections/dconn.php';
                         ?>
                       </select>
                   </div>
               </div>
               <!--FIM:É A MERDA DE UM WHILE-->
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Salário</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" min="1" step="any" name="salario" placeholder="900000" class="form-control"value="<?php echo ''.$edit["salario"].''?>"disabled>
                   </div>
               </div>
       </div>
       <div class="card-footer">
           <button type="submit" class="btn btn-success btn-sm" name="submitInfo">
               <i class="fa fa-dot-circle-o"></i> Submeter edição
           </button>
       </div>
 </form>
 <div class="card">
     <div class="card-body card-block">

         <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
           <?php
            include 'connections/conn.php';
            $edit = mysqli_fetch_array(mysqli_query($conn, "SELECT * from utilizador where id_users = '$_SESSION[iduser]'"));
            include 'connections/dconn.php';
           ?>
             <div class="row form-group">
                 <div class="col col-md-3">
                     <label for="text-input" class=" form-control-label">Palavra-chave Atual</label>
                 </div>
                 <div class="col-12 col-md-9">
                     <input type="password" id="text-input" name="passAtual" placeholder="*********" class="form-control">
                 </div>
             </div>
             <div class="row form-group">
                 <div class="col col-md-3">
                     <label for="text-input" class=" form-control-label">Palavra-chave Nova</label>
                 </div>
                 <div class="col-12 col-md-9">
                     <input type="password" id="text-input" name="passNova" placeholder="*********" class="form-control">
                 </div>
             </div>
             <div class="row form-group">
                 <div class="col col-md-3">
                     <label for="text-input" class=" form-control-label">Palavra-chave Nova (confirmação)</label>
                 </div>
                 <div class="col-12 col-md-9">
                     <input type="password" id="text-input" name="passNovaC" placeholder="*********" class="form-control">
                 </div>
             </div>
           </div>
     <div class="card-footer">
         <button type="submit" class="btn btn-success btn-sm" name="submitChange">
             <i class="fa fa-dot-circle-o"></i> Submeter edição
         </button>
     </div>
</form>

 <?php
if(isset($_POST["submitInfo"])){
  include 'connections/conn.php';
  mysqli_query($conn, "UPDATE utilizador set email ='$_POST[email]', morada = '$_POST[morada]', telemovel = '$_POST[telemovel]' WHERE id_users = '$_SESSION[iduser]'");
  echo '<meta http-equiv="refresh" content="0;url=platform.php">';
  include 'connections/dconn.php';
}
if(isset($_POST["submitChange"])){
  if(($_POST["passAtual"]==$edit["password"]) && ($_POST["passAtual"] != $_POST["passNova"]) && ($_POST["passNova"]==$_POST["passNovaC"])){
    include 'connections/conn.php';
    mysqli_query($conn, "UPDATE utilizador set password = '$_POST[passNova]' WHERE id_users = '$_SESSION[iduser]'");
    echo '<meta http-equiv="refresh" content="0;url=platform.php">';
    include 'connections/dconn.php';
  }elseif ($_POST["passAtual"] == $_POST["passNova"]) {
    echo 'A Palavra-chave atual e a Palavra-chave que tentou submeter são indênticas, tente outra!';
  }elseif ($_POST["passNova"]!=$_POST["passNovaC"]) {
    echo 'Por favor confirme a Palavra-chave';
  }elseif ($_POST["passAtual"]!=$edit["password"]) {
  echo 'Por favor coloque Palavra-chave atual correct';
  }
}
if(isset($_POST["nibChange"])){
  include 'connections/conn.php';
  mysqli_query($conn, "INSERT INTO pedidos(id_user, nib_atual, nib_novo, estado) VALUES ('$edit[id_users]','$_POST[nibChange]','$_POST[nibNovo]', 0)");
  include 'connections/dconn.php';
  echo '<meta http-equiv="refresh" content="0;url=platform.php">';
}
 ?>
