<?php
  include 'connections/conn.php';
  //$_SESSION["turnoID"];
  $fatId= mysqli_fetch_array(mysqli_query($conn, "SELECT id from recibos order by id DESC limit 1 "));
  $nextFatura = $fatId["id"] + 1;
  $edit = mysqli_fetch_array(mysqli_query($conn, "SELECT * from utilizador where id_users = '$_SESSION[editID]'"));
  $turn = mysqli_fetch_array(mysqli_query($conn, "SELECT * from turno where id = '$_SESSION[turnoID]'"));
  $salBru = $edit["salario"] + ($edit["salario"]*$turn["mult"]);
  $irs = mysqli_fetch_array(mysqli_query($conn, "SELECT * from irs where '$salBru'> min and '$salBru' <= max"));
  $ss = mysqli_fetch_array(mysqli_query($conn, "SELECT * from segurancasocial where '$salBru'> min and '$salBru' <= max"));

  include 'connections/dconn.php';
 ?>
 <form method="post">
<div class="card">
        <div class="card-body card-block">

          <div class="row">
            <div class="form-group col-3">
                <label for="text-input" class=" form-control-label">Numero de Fatura</label>
            </div>
            <div class="form-group col-3">
                <input type="text" id="text-input" name="nome_users" placeholder="Nome do colaborador" class="form-control" value = "<?php echo ''.$nextFatura.''?>"disabled>
            </div>
              <div class="form-group col-1">
                  <label for="select" class=" form-control-label">Turno</label>
              </div>
              <div class="form-group col-2">
                  <select name="turnos" id="select" class="form-control">
                    <?php
                    include 'connections/conn.php';
                      $opcoes = mysqli_query($conn, "SELECT * from turno");
                      while($eopcoes = mysqli_fetch_array($opcoes)){
                        echo'<option value="'.$eopcoes["id"].'">'.$eopcoes["nome_turno"].'</option>';
                      }
                      include 'connections/dconn.php';
                    ?>
                  </select>
              </div>
            <div class="form-group col-3">
              <button type="submit" class="btn btn-primary btn-sm" name="refresh">
                  Refrescar
              </button>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">Utilizador</label>
                <input name = "nome" type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$edit["nome_users"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">NIF</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$edit["nif"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">NISS</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$edit["niss"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">NIB</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$edit["nib"].''?>" disabled>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">Segurança Social</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$ss["mult_func"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">IRS</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$irs["mult"].''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">% total de descontos</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php $percentagemTotal = $ss["mult_func"] + $irs["mult"]; echo ''.$percentagemTotal.''?>" disabled>
            </div>
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">Salário Base (+ Turno)</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$salBru.'€'?>" disabled>
            </div>
        </div>
        <div class="row">
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Valor</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php $valorSS = $salBru * $ss["mult_func"]; echo ''.$valorSS.'€'; ?>" disabled>
          </div>
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Valor</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php $valorIRS = $salBru * $irs["mult"]; echo ''.$valorIRS.'€'; ?>" disabled>
          </div>
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Valor total de descontos</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php $descontoTotal = $valorSS + $valorIRS; echo ''.$descontoTotal.'€'?>" disabled>
          </div>
          <div class="form-group col-3">
              <label for="company" class=" form-control-label">Salário Liquidado</label>
              <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php $salLiq = $salBru - $valorSS - $valorIRS; echo ''.$salLiq.'€'?>" disabled>
          </div>
      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" name="submitInfo">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
    </div>
</form>
<?php
if (isset($_POST["turnos"])){
  $_SESSION["turnoID"] = $_POST["turnos"];
}
if (isset($_POST["refresh"])){
  echo '<meta http-equiv="refresh" content="0;url=platform.php?an=8">';
}
if (isset($_POST["submitInfo"])){
  include 'connections/conn.php';
  mysqli_query($conn, "INSERT INTO recibos(id_trabalhador, ss_mult, ss_val, irs_mult, irs_val, turno_nome, turno_mult, isFerias, isSubNat, total)
  VALUES ('$edit[id_users]', '$ss[mult_func]', '$valorSS', '$irs[mult]', '$valorIRS', '$turn[nome_turno]', '$turn[mult]', 0, 0, '$salLiq')");
  echo '<meta http-equiv="refresh" content"=0;url=platform.php?an=7">';
  include 'connections/dconn.php';
}
 ?>
