<?php
include 'connections/conn.php';
/*Queries - Inicio*/
/*Queries para os anos*/
$anoAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT YEAR(CURDATE()) as ano"));
$anoAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (YEAR(CURDATE()) - 1) as ano"));
$anoAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (YEAR(CURDATE()) - 2) as ano"));

/*Queries para os valores de IRS*/
$irsAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(irs_val) as irs from recibos where YEAR(data) = '$anoAtual[ano]'"));
$irsAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(irs_val) as irs from recibos where YEAR(data) = '$anoAnterior[ano]'"));
$irsAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(irs_val) as irs from recibos where YEAR(data) = '$anoAntAnterior[ano]'"));

/*Queries para os valores de Segurança Social*/
$ssAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(ss_val) as ss from recibos where YEAR(data) = '$anoAtual[ano]'"));
$ssAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(ss_val) as ss from recibos where YEAR(data) = '$anoAnterior[ano]'"));
$ssAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(ss_val) as ss from recibos where YEAR(data) = '$anoAntAnterior[ano]'"));

/*Queries para os valores de Subsidios de Férias*/
$ferAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as ferias from recibos where YEAR(data) = '$anoAtual[ano]' and isFerias = 1"));
$ferAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as ferias from recibos where YEAR(data) = '$anoAnterior[ano]' and isFerias = 1"));
$ferAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as ferias from recibos where YEAR(data) = '$anoAntAnterior[ano]' and isFerias = 1"));

/*Queries para os valores de Subsidios de Natal*/
$natAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as natal from recibos where YEAR(data) = '$anoAtual[ano]' and isSubNat = 1"));
$natAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as natal from recibos where YEAR(data) = '$anoAnterior[ano]' and isSubNat = 1"));
$natAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as natal from recibos where YEAR(data) = '$anoAntAnterior[ano]' and isSubNat = 1"));

/*Queries para os valores de Salários*/
$salAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as salario from recibos where YEAR(data) = '$anoAtual[ano]' and isFerias = 0 and isSubNat = 0"));
$salAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as salario from recibos where YEAR(data) = '$anoAnterior[ano]' and isFerias = 0 and isSubNat = 0"));
$salAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(total) as salario from recibos where YEAR(data) = '$anoAntAnterior[ano]' and isFerias = 0 and isSubNat = 0"));

/*Queries para os valores totais de gastos*/
$gastAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]'"));
$gastAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]'"));
$gastAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]'"));

/*Queries para os valores totais de gastos em Janeiro*/
$janAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=1"));
$janAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=1"));
$janAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=1"));

/*Queries para os valores totais de gastos em Fevereiro*/
$fevAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=2"));
$fevAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=2"));
$fevAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=2"));

/*Queries para os valores totais de gastos em Março*/
$marAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=3"));
$marAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=3"));
$marAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=3"));

/*Queries para os valores totais de gastos em Abril*/
$abrAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=4"));
$abrAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=4"));
$abrAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=4"));

/*Queries para os valores totais de gastos em Maio*/
$maiAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=5"));
$maiAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=5"));
$maiAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=5"));

/*Queries para os valores totais de gastos em Junho*/
$junAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=6"));
$junAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=6"));
$junAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=6"));

/*Queries para os valores totais de gastos em Julho*/
$julAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=7"));
$julAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=7"));
$julAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=7"));

/*Queries para os valores totais de gastos em Agosto*/
$agoAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=8"));
$agoAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=8"));
$agoAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=8"));

/*Queries para os valores totais de gastos em Setembro*/
$setAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=9"));
$setAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=9"));
$setAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=9"));

/*Queries para os valores totais de gastos em Outubro*/
$outAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=10"));
$outAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=10"));
$outAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=10"));

/*Queries para os valores totais de gastos em Novembro*/
$novAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=11"));
$novAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=11"));
$novAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=11"));

/*Queries para os valores totais de gastos em Dezembro*/
$dezAtual = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAtual[ano]' and MONTH(data)=12"));
$dezAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAnterior[ano]' and MONTH(data)=12"));
$dezAntAnterior = mysqli_fetch_array(mysqli_query($conn, "SELECT (sum(total)+sum(irs_val)+sum(ss_val)) as gastos from recibos where YEAR(data) = '$anoAntAnterior[ano]' and MONTH(data)=12"));
/*Queries - Fim*/
include 'connections/dconn.php';

/*Contas totais em %s- Inicio*/
if ($gastAtual["gastos"] == 0){
  $gastAtual["gastos"] = 1;
}
if ($gastAnterior["gastos"] == 0){
  $gastAnterior["gastos"] = 1;
}
if ($gastAntAnterior["gastos"] == 0){
  $gastAntAnterior["gastos"] = 1;
}

/*Contas para as %s de IRS*/
$irsPerAtual = ($irsAtual["irs"] * 100)/$gastAtual["gastos"];
$irsPerAnterior = ($irsAnterior["irs"] * 100)/$gastAnterior["gastos"];
$irsPerAntAnterior = ($irsAntAnterior["irs"] * 100)/$gastAntAnterior["gastos"];

/*Contas para as %s de Segurança Social*/
$ssPerAtual = ($ssAtual["ss"] * 100)/$gastAtual["gastos"];
$ssPerAnterior = ($ssAnterior["ss"] * 100)/$gastAnterior["gastos"];
$ssPerAntAnterior = ($ssAntAnterior["ss"] * 100)/$gastAntAnterior["gastos"];

/*Contas para as %s de Subsidios de Férias*/
$ferPerAtual = ($ferAtual["ferias"] * 100)/$gastAtual["gastos"];
$ferPerAnterior = ($ferAnterior["ferias"] * 100)/$gastAnterior["gastos"];
$ferPerAntAnterior = ($ferAntAnterior["ferias"] * 100)/$gastAntAnterior["gastos"];

/*Contas para as %s de Subsidios de Natal*/
$natPerAtual = ($natAtual["natal"] * 100)/$gastAtual["gastos"];
$natPerAnterior = ($natAnterior["natal"] * 100)/$gastAnterior["gastos"];
$natPerAntAnterior = ($natAntAnterior["natal"] * 100)/$gastAntAnterior["gastos"];

/*Contas para as %s de Salários*/
$salPerAtual = ($salAtual["salario"] * 100)/$gastAtual["gastos"];
$salPerAnterior = ($salAnterior["salario"] * 100)/$gastAnterior["gastos"];
$salPerAntAnterior = ($salAntAnterior["salario"] * 100)/$gastAntAnterior["gastos"];

/*Contas para as %s de Janeiro*/
$janPerAtual = ($janAtual["gastos"] * 100)/$gastAtual["gastos"];
$janPerAnterior = ($janAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$janPerAntAnterior = ($janAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Feveiro*/
$fevPerAtual = ($fevAtual["gastos"] * 100)/$gastAtual["gastos"];
$fevPerAnterior = ($fevAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$fevPerAntAnterior = ($fevAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Março*/
$marPerAtual = ($marAtual["gastos"] * 100)/$gastAtual["gastos"];
$marPerAnterior = ($marAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$marPerAntAnterior = ($marAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Abril*/
$abrPerAtual = ($abrAtual["gastos"] * 100)/$gastAtual["gastos"];
$abrPerAnterior = ($abrAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$abrPerAntAnterior = ($abrAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Maio*/
$maiPerAtual = ($maiAtual["gastos"] * 100)/$gastAtual["gastos"];
$maiPerAnterior = ($maiAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$maiPerAntAnterior = ($maiAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Junho*/
$junPerAtual = ($junAtual["gastos"] * 100)/$gastAtual["gastos"];
$junPerAnterior = ($junAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$junPerAntAnterior = ($junAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Julho*/
$julPerAtual = ($julAtual["gastos"] * 100)/$gastAtual["gastos"];
$julPerAnterior = ($julAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$julPerAntAnterior = ($julAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Agosto*/
$agoPerAtual = ($agoAtual["gastos"] * 100)/$gastAtual["gastos"];
$agoPerAnterior = ($agoAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$agoPerAntAnterior = ($agoAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Setembro*/
$setPerAtual = ($setAtual["gastos"] * 100)/$gastAtual["gastos"];
$setPerAnterior = ($setAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$setPerAntAnterior = ($setAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Outubro*/
$outPerAtual = ($outAtual["gastos"] * 100)/$gastAtual["gastos"];
$outPerAnterior = ($outAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$outPerAntAnterior = ($outAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Novembro*/
$novPerAtual = ($novAtual["gastos"] * 100)/$gastAtual["gastos"];
$novPerAnterior = ($novAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$novPerAntAnterior = ($novAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];
/*Contas para as %s de Dezembro*/
$dezPerAtual = ($dezAtual["gastos"] * 100)/$gastAtual["gastos"];
$dezPerAnterior = ($dezAnterior["gastos"] * 100)/$gastAnterior["gastos"];
$dezPerAntAnterior = ($dezAntAnterior["gastos"] * 100)/$gastAntAnterior["gastos"];

/*Contas totais em %s- Fim*/

 ?>

<div class="row">
<div class="form col-4">
  <div class="card-header">
    <h4>Gastos totais em <?php echo $anoAtual["ano"]; ?></h4>
  </div>
  <div class="card-body">
    IRS: <?php echo ''.$irsAtual["irs"].'€';?> (<?php echo ''.$irsPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$irsPerAtual.'%';?>" aria-valuenow="<?php echo ''.$irsPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Segurança Social: <?php echo ''.$ssAtual["ss"].'€';?> (<?php echo ''.$ssPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$ssPerAtual.'%';?>" aria-valuenow="<?php echo ''.$ssPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Subsidio de Férias: <?php echo ''.$ferAtual["ferias"].'€';?> (<?php echo ''.$ferPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$ferPerAtual.'%';?>" aria-valuenow="<?php echo ''.$ferPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Subsidio de Natal: <?php echo ''.$natAtual["natal"].'€';?> (<?php echo ''.$natPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$natPerAtual.'%';?>" aria-valuenow="<?php echo ''.$natPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Salários: <?php echo ''.$salAtual["salario"].'€';?> (<?php echo ''.$salPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$salPerAtual.'%';?>" aria-valuenow="<?php echo ''.$salPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</div>
<div class="form col-4">
  <div class="card-header">
    <h4>Gastos totais em <?php echo $anoAnterior["ano"]; ?></h4>
  </div>
  <div class="card-body">
    IRS: <?php echo ''.$irsAnterior["irs"].'€';?> (<?php echo ''.$irsPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$irsPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$irsPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Segurança Social: <?php echo ''.$ssAnterior["ss"].'€';?> (<?php echo ''.$ssPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$ssPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$ssPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Subsidio de Férias: <?php echo ''.$ferAnterior["ferias"].'€';?> (<?php echo ''.$ferPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$ferPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$ferPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Subsidio de Natal: <?php echo ''.$natAnterior["natal"].'€';?> (<?php echo ''.$natPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$natPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$natPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Salários: <?php echo ''.$salAnterior["salario"].'€';?> (<?php echo ''.$salPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$salPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$salPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</div>
<div class="form col-4">
  <div class="card-header">
    <h4>Gastos totais em <?php echo $anoAntAnterior["ano"]; ?></h4>
  </div>
  <div class="card-body">
    IRS: <?php echo ''.$irsAntAnterior["irs"].'€';?> (<?php echo ''.$irsPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$irsPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$irsPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Segurança Social: <?php echo ''.$ssAntAnterior["ss"].'€';?> (<?php echo ''.$ssPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$ssPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$ssPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Subsidio de Férias: <?php echo ''.$ferAntAnterior["ferias"].'€';?> (<?php echo ''.$ferPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$ferPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$ferPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Subsidio de Natal: <?php echo ''.$natAntAnterior["natal"].'€';?> (<?php echo ''.$natPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$natPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$natPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Salários: <?php echo ''.$salAntAnterior["salario"].'€';?> (<?php echo ''.$salPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$salPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$salPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</div>
</div>

<div class="row">
<div class="form col-4">
  <div class="card-header">
    <h4>Gastos por mês em <?php echo $anoAtual["ano"]; ?></h4>
  </div>
  <div class="card-body">
    Janeiro: <?php echo ''.$janAtual["gastos"].'€';?> (<?php echo ''.$janPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$janPerAtual.'%';?>" aria-valuenow="<?php echo ''.$janPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Fevereiro: <?php echo ''.$fevAtual["gastos"].'€';?> (<?php echo ''.$fevPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$fevPerAtual.'%';?>" aria-valuenow="<?php echo ''.$fevPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Março: <?php echo ''.$marAtual["gastos"].'€';?> (<?php echo ''.$marPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$marPerAtual.'%';?>" aria-valuenow="<?php echo ''.$marPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Abril: <?php echo ''.$abrAtual["gastos"].'€';?> (<?php echo ''.$abrPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$abrPerAtual.'%';?>" aria-valuenow="<?php echo ''.$abrPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Maio <?php echo ''.$maiAtual["gastos"].'€';?> (<?php echo ''.$maiPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$maiPerAtual.'%';?>" aria-valuenow="<?php echo ''.$maiPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Junho <?php echo ''.$junAtual["gastos"].'€';?> (<?php echo ''.$junPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$junPerAtual.'%';?>" aria-valuenow="<?php echo ''.$junPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Julho <?php echo ''.$julAtual["gastos"].'€';?> (<?php echo ''.$julPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$julPerAtual.'%';?>" aria-valuenow="<?php echo ''.$julPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Agosto <?php echo ''.$agoAtual["gastos"].'€';?> (<?php echo ''.$agoPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$agoPerAtual.'%';?>" aria-valuenow="<?php echo ''.$agoPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Setembro <?php echo ''.$setAtual["gastos"].'€';?> (<?php echo ''.$setPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$setPerAtual.'%';?>" aria-valuenow="<?php echo ''.$setPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Outubro <?php echo ''.$outAtual["gastos"].'€';?> (<?php echo ''.$outPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$outPerAtual.'%';?>" aria-valuenow="<?php echo ''.$outPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Novembro <?php echo ''.$novAtual["gastos"].'€';?> (<?php echo ''.$novPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$novPerAtual.'%';?>" aria-valuenow="<?php echo ''.$novPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Dezembro <?php echo ''.$dezAtual["gastos"].'€';?> (<?php echo ''.$dezPerAtual.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$dezPerAtual.'%';?>" aria-valuenow="<?php echo ''.$dezPerAtual.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</div>
<div class="form col-4">
  <div class="card-header">
    <h4>Gastos por mês em <?php echo $anoAnterior["ano"]; ?></h4>
  </div>
  <div class="card-body">
    Janeiro: <?php echo ''.$janAnterior["gastos"].'€';?> (<?php echo ''.$janPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$janPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$janPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Fevereiro: <?php echo ''.$fevAnterior["gastos"].'€';?> (<?php echo ''.$fevPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$fevPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$fevPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Março: <?php echo ''.$marAnterior["gastos"].'€';?> (<?php echo ''.$marPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$marPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$marPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Abril: <?php echo ''.$abrAnterior["gastos"].'€';?> (<?php echo ''.$abrPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$abrPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$abrPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Maio <?php echo ''.$maiAnterior["gastos"].'€';?> (<?php echo ''.$maiPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$maiPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$maiPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Junho <?php echo ''.$junAnterior["gastos"].'€';?> (<?php echo ''.$junPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$junPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$junPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Julho <?php echo ''.$julAnterior["gastos"].'€';?> (<?php echo ''.$julPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$julPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$julPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Agosto <?php echo ''.$agoAnterior["gastos"].'€';?> (<?php echo ''.$agoPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$agoPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$agoPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Setembro <?php echo ''.$setAnterior["gastos"].'€';?> (<?php echo ''.$setPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$setPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$setPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Outubro <?php echo ''.$outAnterior["gastos"].'€';?> (<?php echo ''.$outPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$outPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$outPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Novembro <?php echo ''.$novAnterior["gastos"].'€';?> (<?php echo ''.$novPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$novPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$novPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Dezembro <?php echo ''.$dezAnterior["gastos"].'€';?> (<?php echo ''.$dezPerAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$dezPerAnterior.'%';?>" aria-valuenow="<?php echo ''.$dezPerAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</div>
<div class="form col-4">
  <div class="card-header">
    <h4>Gastos por mês em <?php echo $anoAntAnterior["ano"]; ?></h4>
  </div>
  <div class="card-body">
    Janeiro: <?php echo ''.$janAntAnterior["gastos"].'€';?> (<?php echo ''.$janPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$janPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$janPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Fevereiro: <?php echo ''.$fevAntAnterior["gastos"].'€';?> (<?php echo ''.$fevPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$fevPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$fevPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Março: <?php echo ''.$marAntAnterior["gastos"].'€';?> (<?php echo ''.$marPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$marPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$marPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Abril: <?php echo ''.$abrAntAnterior["gastos"].'€';?> (<?php echo ''.$abrPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$abrPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$abrPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Maio <?php echo ''.$maiAntAnterior["gastos"].'€';?> (<?php echo ''.$maiPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$maiPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$maiPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Junho <?php echo ''.$junAntAnterior["gastos"].'€';?> (<?php echo ''.$junPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$junPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$junPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Julho <?php echo ''.$julAntAnterior["gastos"].'€';?> (<?php echo ''.$julPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$julPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$julPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Agosto <?php echo ''.$agoAntAnterior["gastos"].'€';?> (<?php echo ''.$agoPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$agoPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$agoPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Setembro <?php echo ''.$setAntAnterior["gastos"].'€';?> (<?php echo ''.$setPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$setPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$setPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Outubro <?php echo ''.$outAntAnterior["gastos"].'€';?> (<?php echo ''.$outPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$outPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$outPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Novembro <?php echo ''.$novAntAnterior["gastos"].'€';?> (<?php echo ''.$novPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$novPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$novPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    Dezembro <?php echo ''.$dezAntAnterior["gastos"].'€';?> (<?php echo ''.$dezPerAntAnterior.'%';?>)
    <div class="progress mb-2">
      <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo ''.$dezPerAntAnterior.'%';?>" aria-valuenow="<?php echo ''.$dezPerAntAnterior.'';?>"
       aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</div>
</div>
