<div class="col-lg-12">
    <div class="table-responsive table--no-card m-b-30">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>Id Pedido</th>
                    <th>Utilizador</th>
                    <th>Nib Atual</th>
                    <th>Nib Novo</th>
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
