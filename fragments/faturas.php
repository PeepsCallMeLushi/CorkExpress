<?php
  include 'connections/conn.php';
  $edit = mysqli_fetch_array(mysqli_query($conn, "SELECT * from utilizador where id_users = '$_SESSION[editID]'"));
  include 'connections/dconn.php';
 ?>
<div class="card">
        <div class="card-body card-block">
          <div class="row">
            <div class="form-group col-3">
                <label for="company" class=" form-control-label">Utilizador</label>
                <input type="text" id="company" placeholder="Nome do utilizador" class="form-control" value="<?php echo ''.$edit["nome_users"].''?>" disabled>
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
            <div class="form-group">
                <label for="vat" class=" form-control-label">VAT</label>
                <input type="text" id="vat" placeholder="DE1234567890" class="form-control">
            </div>
            <div class="form-group">
                <label for="street" class=" form-control-label">Street</label>
                <input type="text" id="street" placeholder="Enter street name" class="form-control">
            </div>
            <div class="row form-group">
                <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">City</label>
                        <input type="text" id="city" placeholder="Enter your city" class="form-control">
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label">Postal Code</label>
                        <input type="text" id="postal-code" placeholder="Postal Code" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class=" form-control-label">Country</label>
                <input type="text" id="country" placeholder="Country name" class="form-control">
            </div>
        </div>
    </div>
