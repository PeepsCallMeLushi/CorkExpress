<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Listagem de recibos</h3>
    <div class="table-responsive table-data">
        <table class="table">
            <thead>
                <tr>
                    <td>Data de pagamento</td>
                    <td>Montante</td>
                    <td>Tipo de Vencimento</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'connections/conn.php';
                $users = mysqli_query($conn, "SELECT * from recibos where id_trabalhador = '$_SESSION[iduser]' order by data desc");
                while($list = mysqli_fetch_array($users)){
                  /*echo'<option value="'.$eopcoes["id_catprof"].'">'.$eopcoes["nome_catprof"].'</option>';*/
                  echo
                  '<tr>
                      <td>
                          <div class="table-data__info">
                              <h6>';
                              $mes = mysqli_fetch_array(mysqli_query($conn, "SELECT mes from meses where id = MONTH('$list[data]')"));
                              echo ''.$mes["mes"].'</h6>
                              <span>
                                  <a href="#">'.$list["data"].'</a>
                              </span>
                          </div>
                      </td>
                      <td>
                          <div class="table-data__info">
                            <h6>'.$list["total"].'</h6>
                          </div>
                      </td>';
                      if($list["isFerias"]==1){
                        echo '<td>
                            <div class="table-data__info">
                                <h6> Subsidio de férias</h6>
                                </div>
                            </td>';
                      }elseif($list["isSubNat"]==1){
                        echo '<td>
                            <div class="table-data__info">
                                <h6> Subsidio de Natal</h6>
                                </div>
                            </td>';
                      }else{
                        echo '<td>
                            <div class="table-data__info">
                                <h6> Salário</h6>
                                </div>
                            </td>';
                      }
                      echo '<td>
                        <form method="post">
                          <button type="submit" class="btn btn-primary btn-sm" name="viewInfo" value ="'.$list["id"].'">Detalhes</button>
                        </form>
                      </td>
                      </tr>';
                }
                include 'connections/dconn.php';
                if (isset($_POST["viewInfo"])){
                $_SESSION["viewID"] = $_POST["viewInfo"];
                /*echo 'Este if funca e o id do user é:'.$_SESSION["editID"];*/
                echo '<meta http-equiv="refresh" content="0;url=platform.php?an=10">';
                }
              ?>
            </tbody>
        </table>
    </div>
</div>
