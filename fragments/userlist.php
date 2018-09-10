<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Listagem de utilizadores</h3>
    <div class="table-responsive table-data">
        <table class="table">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Função</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'connections/conn.php';
                $users = mysqli_query($conn, "SELECT utilizador.id_users ,utilizador.nome_users, utilizador.email, categprofissional.id_departamento ,categprofissional.nome_catprof from utilizador
                left join categprofissional on categprofissional.id_catprof = utilizador.id_catprof");
                while($list = mysqli_fetch_array($users)){
                  /*echo'<option value="'.$eopcoes["id_catprof"].'">'.$eopcoes["nome_catprof"].'</option>';*/
                  echo
                  '<tr>
                      <td>
                          <div class="table-data__info">
                              <h6>'.$list["nome_users"].'</h6>
                              <span>
                                  <a href="#">'.$list["email"].'</a>
                              </span>
                          </div>
                      </td>
                      <td>
                          ';
                          if($list["id_departamento"]==1){
                            echo '<span class="role admin">'.$list["nome_catprof"].'</span>';
                          }
                          else{
                            echo '<span class="role user">'.$list["nome_catprof"].'</span>';
                          }
                          echo '
                      </td>
                      <td>
                      <button type="submit" class="btn btn-warning btn-sm" name="editInfo" value="'.$list["id_users"].'">
                          Editar
                      </button>
                      </td>
                      <td>
                      <button type="submit" class="btn btn-danger btn-sm" name="deleteInfo">
                          Apagar
                      </button>
                      </td>
                  </tr>';
                }
                include 'connections/dconn.php';
              ?>
            </tbody>
        </table>
    </div>
</div>
