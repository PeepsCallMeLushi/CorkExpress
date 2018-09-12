<?php
  include 'connections/conn.php';
  //$_SESSION["turnoID"];
  $recibo= mysqli_fetch_array(mysqli_query($conn, "SELECT * from recibos where id = '$_SESSION[viewID]' "));
  $tabalhador= mysqli_fetch_array(mysqli_query($conn, "SELECT * from utilizador where id_users = '$recibo[id_trabalhador]' "));
  $depart = mysqli_fetch_array(mysqli_query($conn, "SELECT departamento.id_depart from departamento
    left join categprofissional on departamento.id_depart = categprofissional.id_departamento
    where departamento.id_depart = categprofissional.id_departamento and categprofissional.id_departamento = '$tabalhador[id_catprof]'"));
  $salBru = $tabalhador["salario"] + ($tabalhador["salario"]*$recibo["turno_mult"]);
  include 'connections/dconn.php';
 ?>
<div class="card">
        <div class="card-body card-block">

          <div class="row">
            <div class="form-group col-1">
                <label for="text-input" class=" form-control-label">Fatura</label>
            </div>
            <div class="form-group col-2">
                <input type="text" id="text-input" name="nome_users" placeholder="Nome do colaborador" class="form-control" value = "<?php echo ''.$recibo["id"].''?>"disabled>
            </div>
              <div class="form-group col-1">
                  <label for="select" class=" form-control-label">Turno</label>
              </div>
              <div class="form-group col-2">
                  <select name="turnos" id="select" class="form-control" disabled>
                    <?php
                    if ($depart["id_depart"]==1){
                    include 'connections/conn.php';
                      $opcoes = mysqli_query($conn, "SELECT * from turno where nome_turno = '$recibo[turno_nome]'");
                      while($eopcoes = mysqli_fetch_array($opcoes)){
                        echo'<option value="'.$eopcoes["id"].'">'.$eopcoes["nome_turno"].'</option>';
                      }
                      include 'connections/dconn.php';
                    }else{
                      echo'<option value="0">Escritório</option>';
                    }
                    ?>
                  </select>
              </div>
              <?php
              if($recibo["isFerias"]==1){
                echo '<div class="form-group col-3">
                        <label for="text-input" class=" form-control-label"><b>Tipo de vencimento:</b> Subsidio de férias</label>
                        </div>';
              }elseif($recibo["isSubNat"]==1){
                echo '<div class="form-group col-3">
                        <label for="text-input" class=" form-control-label"><b>Tipo de vencimento:</b>  Subsidio de Natal</label>
                        </div>';
              }else{
                echo '<div class="form-group col-3">
                        <label for="text-input" class=" form-control-label"><b>Tipo de vencimento:</b>  Salário</label>
                        </div>';
                      }
              ?>
              <div class="form-group col-1">
                  <label for="select" class=" form-control-label"><?php echo ''.$recibo["data"].'';?></label>
              </div>
          </div>

          <div class="row">
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">Utilizador</label>
                <input name = "nome" type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$tabalhador["nome_users"].'';?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">NIF</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$tabalhador["nif"].'';?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">NISS</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$tabalhador["niss"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">NIB</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$tabalhador["nib"].''?>" disabled>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">Segurança Social</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$recibo["ss_mult"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">IRS</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$recibo["irs_mult"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">% total de descontos</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php $percentagemTotal = $recibo["ss_mult"] + $recibo["irs_mult"]; echo ''.$percentagemTotal.''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">Salário Base (+ Turno)</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$salBru.'€'?>" disabled>
            </div>
        </div>
        <div class="row">
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Valor</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$recibo["ss_val"].'€'; ?>" disabled>
          </div>
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Valor</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$recibo["irs_val"].'€'; ?>" disabled>
          </div>
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Valor total de descontos</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php $descontoTotal = $recibo["ss_val"] + $recibo["irs_val"]; echo ''.$descontoTotal.'€'?>" disabled>
          </div>
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Salário Liquidado</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$recibo["total"].'€'?>" disabled>
          </div>
      </div>
    </div>
