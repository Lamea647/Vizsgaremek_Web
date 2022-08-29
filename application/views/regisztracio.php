<div class="col-lg-8 mx-auto" style="margin-top: 5%;">
      <form action="<?php echo base_url(); ?>regisztracio" method="post" enctype="multipart/form-data">
            <div class="form-group">
                  <label for="nev">Teljes név:</label>
                  <input type="text" class="form-control" id="nev" name="nev" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['nev']) ?>" <?php endif; ?>>
            </div>
            <div class="form-group">
                  <label for="felhnev">Felhasználónév:</label>
                  <input type="text" class="form-control" id="felhnev" name="felhnev" maxlength="100" pattern=".{6,100}" required onchange="validalas_felhnev();" <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['felhnev']) ?>" <?php endif; ?>>
            </div>
            <span id="felhnev_hiba" style="color: red;"></span>
            <div class="form-group">
                  <label for="szuldatum">Születési dátum:</label>
                  <input type="date" class="form-control" id="szuldatum" name="szuldatum" max="2007-12-31" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['szuldatum']) ?>" <?php endif; ?>>
            </div>
            <div class="form-group">
                  <label for="telszam">Telefonszám:</label>
                  <input type="tel" class="form-control" id="telszam" name="telszam" maxlength="30" pattern=".{7,30}" required onchange="validalas_telszam();" <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['telszam']) ?>" <?php endif; ?>>
            </div>
            <span id="telszam_hiba" style="color: red;"></span>
            <div class="form-group">
                  <label for="email">E-mail cím:</label>
                  <input type="email" class="form-control" id="email" name="email" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['email']) ?>" <?php endif; ?>>
            </div>
            <div class="form-group">
                  <label for="telepules_id">Település:</label>
                  <select class="form-control" id="telepules_id" name="telepules_id" required>
                  <?php for ($x = 0; $x < $telepules_szam; $x++) {?>
                  <option value="<?php echo $x+1; ?>"><?php echo $telepules[$x]['telepules']; ?></option> <?php } ?>
                  </select> 
            </div>
            <div class="form-group">
                  <label for="cim">Cím:</label>
                  <input type="text" class="form-control" id="cim" name="cim" maxlength="100" pattern=".{8,100}" placeholder="Irányítószám, utca, házszám, emelet, ajtó" required onchange="validalas_cim();" <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['cim']) ?>" <?php endif; ?>>
            </div>
            <span id="cim_hiba" style="color: red;"></span>
            <div class="form-group">
                  <label for="okmanyszam">Feltöltött okmány száma:</label>
                  <input type="text" class="form-control" id="okmanyszam" name="okmanyszam" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['okmanyszam']) ?>" <?php endif; ?>>
            </div>
            <div class="form-group">
            <label for="okmanykep">Okmánykép feltöltése:</label>
            <input accept=".jpg,.jpeg,.png,.bmp" type="file" class="form-control-file" id="okmanykep" name="okmanykep" required>
            </div>
            <div class="form-group">
            <label for="profilkep">Profilkép feltöltése:</label>
            <input accept=".jpg,.jpeg,.png,.bmp" type="file" class="form-control-file" id="profilkep" name="profilkep" required>
            </div>
            <div class="form-group">
                  <label for="jelszo">Jelszó:</label>
                  <input type="password" class="form-control" id="jelszo" name="jelszo" maxlength="100" pattern=".{6,100}" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['jelszo']) ?>" <?php endif; ?>>
            </div>
            <div class="form-group">
                  <label for="jelszoujra">Jelszó megerősítése:</label>
                  <input type="password" class="form-control" id="jelszoujra" name="jelszoujra" maxlength="100" pattern=".{6,100}" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['jelszoujra']) ?>" <?php endif; ?>>
            </div>
            <div class="form-group">
                  <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="feltetelek" id="feltetelek">
                  <label class="form-check-label" for="input_feltetelek">Elfogadom a Felhasználói feltételeket és az Adatvédelmi irányelveket.</label>
                  </div>
            </div>
      <button type="submit" onclick="validalas();" class="btn btn-warning" name="regisztracio" value="true">Regisztráció</button>
      </form>
</div>
<br>

<script>
    function validalas(){
        validalas_cim();
        validalas_telszam();
        validalas_felhnev();
    }
</script>

<script>
    function validalas_cim(){
        let hirdetes_cim = document.getElementById("cim").value;
        if(hirdetes_cim.length < 8){
            document.getElementById("cim_hiba").innerHTML = "A megadott cím nem lehet 8 karakternél rövidebb.";
        }else{
            document.getElementById("cim_hiba").innerHTML = "";
        }
    }
</script>

<script>
    function validalas_telszam(){
        let hirdetes_telszam = document.getElementById("telszam").value;
        if(hirdetes_telszam.length < 7){
            document.getElementById("telszam_hiba").innerHTML = "A megadott telefonszám nem lehet 7 karakternél rövidebb.";
        }else{
            document.getElementById("telszam_hiba").innerHTML = "";
        }
    }
</script>

<script>
    function validalas_felhnev(){
        let felhnev = document.getElementById("felhnev").value;
        if(felhnev.length < 6){
            document.getElementById("felhnev_hiba").innerHTML = "A megadott felhasználónév nem lehet 6 karakternél rövidebb.";
        }else{
            document.getElementById("felhnev_hiba").innerHTML = "";
        }
    }
</script>
