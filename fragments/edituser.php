<form method="post">
   <div class="card">
       <div class="card-body card-block">

           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
             <?php
              include 'connections/conn.php';
              $edit = mysqli_fetch_array(mysqli_query($conn, "SELECT * from utilizador where id_users = '$_SESSION[editID]'"));
              include 'connections/dconn.php';
             ?>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Nome</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="nome_users" placeholder="Nome do colaborador" class="form-control" value="<?php echo ''.$edit["nome_users"].''?>">
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
                       <input type="text" id="text-input" name="nif" placeholder="NIF do colaborador" class="form-control" value="<?php echo ''.$edit["nif"].''?>">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NISS</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="niss" placeholder="NISS do colaborador" class="form-control" value="<?php echo ''.$edit["niss"].''?>">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NIB</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="nib" placeholder="NIB do colaborador" class="form-control" value="<?php echo ''.$edit["nib"].''?>">
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
                       <input type="date" id="text-input" name="datanasc" placeholder="" class="form-control" value="<?php echo ''.$edit["datanasc"].''?>">
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
                       <input type="number" id="text-input" min="1" step="any" name="salario" placeholder="900000" class="form-control"value="<?php echo ''.$edit["salario"].''?>">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Palavra-chave</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="password" placeholder="Nome do colaborador" class="form-control" value="<?php echo ''.$edit["password"].''?>">
                   </div>
               </div>
           </form>
       </div>
       <div class="card-footer">
           <button type="submit" class="btn btn-primary btn-sm" name="submitInfo">
               <i class="fa fa-dot-circle-o"></i> Submit
           </button>
           <button type="reset" class="btn btn-danger btn-sm" name="resetInfo">
               <i class="fa fa-ban"></i> Reset
           </button>
       </div>
 </form>
 <?php
if(isset($_POST["submitInfo"])){
  include 'connections/conn.php';
  mysqli_query($conn, "UPDATE utilizador set nome_users = '$_POST[nome_users]',
    email ='$_POST[email]', morada = '$_POST[morada]', nif = '$_POST[nif]', niss = '$_POST[niss]', nib = '$_POST[nib]', telemovel = '$_POST[telemovel]', datanasc = '$_POST[datanasc]',
    salario = '$_POST[salario]', password = '$_POST[password]' WHERE id_users = '$_SESSION[editID]'");
  echo '<meta http-equiv="refresh" content="0;url=platform.php?an=2">';
  include 'connections/dconn.php';
}
 ?>
