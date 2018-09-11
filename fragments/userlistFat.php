<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Listagem de utilizadores</h3>
    <div class="table-responsive table-data">
        <table class="table">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Função</td>
                    <td>Faturar</td>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'connections/conn.php';
                $users =mysqli_query($conn, "SELECT utilizador.id_users ,utilizador.nome_users, utilizador.email, categprofissional.id_departamento ,categprofissional.nome_catprof from utilizador
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
                      </td>';
                      $fatMes=mysqli_fetch_array(mysqli_query($conn,
                      "SELECT (MONTH(CURRENT_DATE)-MONTH(data)) as diff from recibos where id_trabalhador = '$list[id_users]' order by data desc limit 1"));
                      if ($fatMes["diff"] == 0){
                        echo '<td>Mês Faturado</td>';

                      }else {
                        echo'
                        <td>
                          <form method="post">
                            <button type="submit" class="btn btn-success btn-sm" name="mes" value="'.$list["id_users"].'">Mês</button>
                          </form>
                        </td>';
                      }
                      $fatAno=mysqli_fetch_array(mysqli_query($conn,
                      "SELECT (YEAR(CURRENT_DATE)-YEAR(data)) as diff from recibos where id_trabalhador = '$list[id_users]' and isFerias = 1 order by data desc limit 1"));
                      if ($fatAno["diff"] == 0){
                        echo '<td>Férias Faturadas</td>';
                      }else {
                        echo'<td>
                        <form method="post">
                        <button type="submit" class="btn btn-primary btn-sm" name="ferias" value="'.$list["id_users"].'">
                            Férias
                        </button>
                        </form>
                        </td>';
                      }
                      $fatNat = mysqli_fetch_array(mysqli_query($conn, "SELECT MONTH(CURRENT_DATE) as diff"));
                      $fatNatAno=mysqli_fetch_array(mysqli_query($conn,
                      "SELECT (YEAR(CURRENT_DATE)-YEAR(data)) as diff from recibos where id_trabalhador = '$list[id_users]' and isSubNat = 1 order by data desc limit 1"));
                      if ($fatNat["diff"] == 11 && $fatNatAno["diff"] != 0 ){
                      echo'
                      <td>
                      <form method="post">
                      <button type="submit" class="btn btn-danger btn-sm" name="natal" value="'.$list["id_users"].'">
                          Subsidio de natal
                      </button>
                      </form>
                      </td>';
                    }elseif ($fatNat["diff"] == 11 && $fatNatAno["diff"] == 0 ){
                      echo '<td>Subsidio de natal já processado</td>';
                    }else{
                      echo '<td>Disponível em novembro</td>';
                    }

                      echo'
                  </tr>';
                }
                include 'connections/dconn.php';
                if (isset($_POST["mes"])){
                $_SESSION["editID"] = $_POST["mes"];
                $_SESSION["turnoID"] = 0;
                /*echo 'Este if funca e o id do user é:'.$_SESSION["editID"];*/
                echo '<meta http-equiv="refresh" content="0;url=platform.php?an=8">';
                }
                if (isset($_POST["deleteInfo"])) {
                  include 'connections/conn.php';
                  mysqli_query($conn, "DELETE from utilizador where id_users = '$_POST[deleteInfo]'");
                  echo '<meta http-equiv="refresh" content="0;url=platform.php?an=2">';
                  include 'connections/dconn.php';
                }
              ?>
            </tbody>
        </table>
    </div>
</div>
