<form>
   <div class="card">
       <div class="card-body card-block">
           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Nome</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="nome_users" placeholder="Nome do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="email-input" class=" form-control-label">E-mail</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="email" id="email-input" name="email" placeholder="nomedocolaborador.numerodocolaborador@empresa.pt" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Morada</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="morada" placeholder="Morada do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NIF</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" name="nif" placeholder="NIF do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NISS</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" name="niss" placeholder="NISS do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NIB</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" name="nib" placeholder="NIB do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Telemóvel</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="tel" id="text-input" name="telemovel" placeholder="900000" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Data de nascimento</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="date" id="text-input" name="datanasc" placeholder="" class="form-control">
                   </div>
               </div>
               <!--É A MERDA DE UM WHILE-->
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="select" class=" form-control-label">Categoria profissional</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <select name="id_catprof" id="select" class="form-control">
                         <?php
                         include 'connections/conn.php';
                           $opcoes = mysqli_query($conn, "SELECT id_catprof, nome_catprof from categprofissional");
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
                       <input type="number" id="text-input" min="1" step="any" name="salario" placeholder="900000" class="form-control">
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
  mysqli_query($conn, "INSERT INTO utilizador (nome_users, email, morada, nif, niss, nib, telemovel, datanasc, id_catprof, salario, password)
  VALUES ('$_POST[nome_users]','$_POST[email]','$_POST[morada]','$_POST[nif]','$_POST[niss]','$_POST[nib]','$_POST[telemovel]',$_POST[datanasc],$_POST[id_catprof],$_POST[salario],'$_POST[nif]')");
  echo '<meta http-equiv="refresh" content"=0;url=platform.php?an=1">';
  include 'connections/dconn.php';
}
 ?>
