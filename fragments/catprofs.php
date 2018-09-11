<div class="card">
       <div class="card-body card-block">
           <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
             <div class="container">
               <div class="row">
                 <div class="col-6 col-md-4">
                   Departamento
                 </div>
                 <div class="col-6 col-md-4">
                   Nome Da Categoria
                 </div>
                 <div class="col-6 col-md-4">
                   Ação
                 </div>
               </div>
               <div class="row">
                 <div class="col-6 col-md-4">
                   <select name="id_departamento" id="select" class="form-control">
                     <?php
                     include 'connections/conn.php';
                       $opcoes = mysqli_query($conn, "SELECT id_depart, nome_depart from departamento");
                       while($eopcoes = mysqli_fetch_array($opcoes)){
                         echo'<option value="'.$eopcoes["id_depart"].'">'.$eopcoes["nome_depart"].'</option>';
                       }
                       include 'connections/dconn.php';
                     ?>
                   </select>
                 </div>
                 <div class="col-6 col-md-4">
                   <input type="text" id="text-input" name="nome_catprof" placeholder="Nome da categoria" class="form-control">
                 </div>
                 <div class="col-6 col-md-4">
                   <form method="post">
                     <button type="submit" class="btn btn-primary btn-sm" name="addInfo">Criar</button>
                   </form>
                 </div>
               </div>
             </div>
           </button>
       </div>
 </form>

<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Listagem de Categorias Profissionais</h3>
    <div class="table-responsive table-data">
        <table class="table">
            <thead>
                <tr>
                    <td>Departamento</td>
                    <td>Categoria profissional</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'connections/conn.php';
                $cats = mysqli_query($conn, "SELECT departamento.nome_depart, categprofissional.nome_catprof, categprofissional.id_catprof from categprofissional
                  left join departamento on categprofissional.id_departamento = departamento.id_depart");
                while($listc = mysqli_fetch_array($cats)){
                  /*echo'<option value="'.$eopcoes["id_catprof"].'">'.$eopcoes["nome_catprof"].'</option>';*/
                  echo
                  '<tr>
                      <td>
                          <div class="table-data__info">
                              <h6>'.$listc["nome_depart"].'</h6>
                          </div>
                      </td>
                      <td>
                          <div class="table-data__info">
                              <h6>'.$listc["nome_catprof"].'</h6>
                          </div>
                      </td>
                      <td>
                        <form method="post">
                          <button type="submit" class="btn btn-warning btn-sm" name="editInfo" value="'.$listc["id_catprof"].'">Editar</button>
                        </form>
                      </td>
                      <td>
                      <form method="post">
                      <button type="submit" class="btn btn-danger btn-sm" name="deleteInfo" value="'.$listc["id_catprof"].'">
                          Apagar
                      </button>
                      </form>
                      </td>
                  </tr>';
                }
                include 'connections/dconn.php';
                if (isset($_POST["editInfo"])){
                $_SESSION["editID"] = $_POST["editInfo"];
                /*echo 'Este if funca e o id do user é:'.$_SESSION["editID"];*/
                echo '<meta http-equiv="refresh" content="0;url=platform.php?an=5">';
                }
                if (isset($_POST["deleteInfo"])) {
                  include 'connections/conn.php';
                  mysqli_query($conn, "DELETE from categprofissional where id_catprof = '$_POST[deleteInfo]'");
                  echo '<meta http-equiv="refresh" content="0;url=platform.php?an=4">';
                  include 'connections/dconn.php';
                }
                if (isset($_POST["addInfo"])) {
                  include 'connections/conn.php';
                  mysqli_query($conn, "INSERT into categprofissional (nome_catprof, id_departamento) values ( '$_POST[nome_catprof]', '$_POST[id_departamento]')");
                  echo '<meta http-equiv="refresh" content="0;url=platform.php?an=4">';
                  include 'connections/dconn.php';
                }
              ?>
            </tbody>
        </table>
    </div>
</div>
