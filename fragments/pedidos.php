<div class="row">
<div class="col-lg-12">
    <div class="table-responsive table--no-card m-b-30">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>Id Pedido</th>
                    <th>Utilizador</th>
                    <th>Nib a Alterar</th>
                    <th>Nib Pedido</th>
                    <th colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
              <?php
              include 'connections/conn.php';
                $pedidos = mysqli_query($conn,
                "SELECT pedidos.id, pedidos.id_user, pedidos.nib_atual, pedidos.nib_novo, pedidos.estado, utilizador.nome_users FROM pedidos
                left join utilizador on utilizador.id_users = pedidos.id_user
                where estado = 0");
                while($list = mysqli_fetch_array($pedidos)){
                  echo'
                  <form method="post">
                    <tr>
                      <td>'.$list["id"].'</td>
                      <td><input type="hidden" name="user" value="'.$list["id_user"].'">'.$list["nome_users"].'</td>
                      <td>'.$list["nib_atual"].'</td>
                      <td><input type="hidden" name="nibNew" value="'.$list["nib_novo"].'">'.$list["nib_novo"].'</input></td>
                      <td><button type="submit" class="btn btn-success btn-sm" name="approve" value="'.$list["id"].'">Aprovar</button></td>
                      <td><button type="submit" class="btn btn-danger btn-sm" name="deny" value="'.$list["id"].'">Rejeitar</button></td>
                    </tr>
                    </form>
                  ';
                }
              include 'connections/dconn.php';
               ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<div class="row">
  <div class="col-lg-6">
      <div class="table-responsive table--no-card m-b-30">
          <table class="table table-borderless table-striped table-approved">
              <thead>
                  <tr>
                      <th>Id Pedido</th>
                      <th>Utilizador</th>
                      <th>Nib a Alterar</th>
                      <th>Nib Pedido</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                include 'connections/conn.php';
                  $pedidos = mysqli_query($conn,
                  "SELECT pedidos.id, pedidos.id_user, pedidos.nib_atual, pedidos.nib_novo, pedidos.estado, utilizador.nome_users FROM pedidos
                  left join utilizador on utilizador.id_users = pedidos.id_user
                  where estado = 1");
                  while($list = mysqli_fetch_array($pedidos)){
                    echo'
                      <tr>
                        <td>'.$list["id"].'</td>
                        <td>'.$list["nome_users"].'</td>
                        <td>'.$list["nib_atual"].'</td>
                        <td>'.$list["nib_novo"].'</td>
                      </tr>
                    ';
                  }
                include 'connections/dconn.php';
                 ?>
              </tbody>
          </table>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="table-responsive table--no-card m-b-30">
          <table class="table table-borderless table-striped table-denied">
              <thead>
                  <tr>
                      <th>Id Pedido</th>
                      <th>Utilizador</th>
                      <th>Nib a Alterar</th>
                      <th>Nib Pedido</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                include 'connections/conn.php';
                  $pedidos = mysqli_query($conn,
                  "SELECT pedidos.id, pedidos.id_user, pedidos.nib_atual, pedidos.nib_novo, pedidos.estado, utilizador.nome_users FROM pedidos
                  left join utilizador on utilizador.id_users = pedidos.id_user
                  where estado = 2");
                  while($list = mysqli_fetch_array($pedidos)){
                    echo'
                      <tr>
                        <td>'.$list["id"].'</td>
                        <td>'.$list["nome_users"].'</td>
                        <td>'.$list["nib_atual"].'</td>
                        <td>'.$list["nib_novo"].'</td>
                      </tr>
                    ';
                  }
                include 'connections/dconn.php';
                 ?>
              </tbody>
          </table>
      </div>
  </div>
</div>
<?php
if(isset($_POST["approve"])){
  include 'connections/conn.php';
  mysqli_query($conn, "UPDATE utilizador set nib = '$_POST[nibNew]' where id_users = '$_POST[user]'");
  mysqli_query($conn, "UPDATE pedidos set estado = 1 where id = '$_POST[approve]'");
  include 'connections/dconn.php';
  echo '<meta http-equiv="refresh" content="0;url=platform.php?an=15">';
}
  if(isset($_POST["deny"])){
    include 'connections/conn.php';
    mysqli_query($conn, "UPDATE pedidos set estado = 2 where id = '$_POST[deny]'");
    include 'connections/dconn.php';
    echo '<meta http-equiv="refresh" content="0;url=platform.php?an=15">';
  }
 ?>
