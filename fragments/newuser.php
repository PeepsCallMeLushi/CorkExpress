<form>
   <div class="card">
       <div class="card-body card-block">
           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Nome</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="text-input" placeholder="Nome do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="email-input" class=" form-control-label">E-mail</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="email" id="email-input" name="email-input" placeholder="nomedocolaborador.numerodocolaborador@empresa.pt" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Morada</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="text" id="text-input" name="text-input" placeholder="Morada do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NIF</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" name="text-input" placeholder="NIF do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NISS</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" name="text-input" placeholder="NISS do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">NIB</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" name="text-input" placeholder="NIB do colaborador" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Telemóvel</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="tel" id="text-input" name="text-input" placeholder="900000" class="form-control">
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Data de nascimento</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="date" id="text-input" name="text-input" placeholder="" class="form-control">
                   </div>
               </div>
               <!--É A MERDA DE UM WHILE-->
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="select" class=" form-control-label">Categoria profissional</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <select name="select" id="select" class="form-control">
                         <?php
                           $opcoes = mysqli_query($conn, "SELECT id, nome from categprofissional");
                           while($eopcoes = mysqli_fetch_array($opcoes)){
                             echo'<option value="'.$eopcoes["id"].'">'.$eopcoes["nome"].'</option>';
                           }
                         ?>
                         <!--
                           <option value="0">Escritório</option>
                           <option value="1">Operacional - Manhã</option>
                           <option value="2">Operacional - Tarde</option>
                           <option value="3">Operacional - Noite</option>
                         -->
                       </select>
                   </div>
               </div>
               <!--FIM:É A MERDA DE UM WHILE-->
               <div class="row form-group">
                   <div class="col col-md-3">
                       <label for="text-input" class=" form-control-label">Salário</label>
                   </div>
                   <div class="col-12 col-md-9">
                       <input type="number" id="text-input" min="1" step="any" name="text-input" placeholder="900000" class="form-control">
                   </div>
               </div>
           </form>
       </div>
       <div class="card-footer">
           <button type="submit" class="btn btn-primary btn-sm">
               <i class="fa fa-dot-circle-o"></i> Submit
           </button>
           <button type="reset" class="btn btn-danger btn-sm">
               <i class="fa fa-ban"></i> Reset
           </button>
       </div>
 </form>
