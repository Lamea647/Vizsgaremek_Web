<form action="<?php echo base_url(); ?>regisztracio" method="post" enctype="multipart/form-data">
      <div class="form-group">
            <label for="nev">Teljes név:</label>
            <input type="text" class="form-control" id="nev" name="nev" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['nev']) ?>" <?php endif; ?>>
      </div>
      <div class="form-group">
            <label for="felhnev">Felhasználónév:</label>
            <input type="text" class="form-control" id="felhnev" name="felhnev" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['felhnev']) ?>" <?php endif; ?>>
      </div>
      <div class="form-group">
            <label for="szuldatum">Születési dátum:</label>
            <input type="date" class="form-control" id="szuldatum" name="szuldatum" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['szuldatum']) ?>" <?php endif; ?>>
      </div>
      <div class="form-group">
            <label for="telszam">Telefonszám:</label>
            <input type="tel" class="form-control" id="telszam" name="telszam" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['telszam']) ?>" <?php endif; ?>>
      </div>
      <div class="form-group">
            <label for="email">E-mail cím:</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['email']) ?>" <?php endif; ?>>
      </div>
      <div class="form-group">
            <label for="telepules_id">Település:</label>
            <select class="form-control" id="telepules_id" name="telepules_id" required>
            <?php for ($x = 0; $x < $szam; $x++) {?>
            <option value="<?php echo $x+1; ?>"><?php echo $telepules[$x]['telepules']; ?></option> <?php } ?>
            </select> 
      </div>
      <div class="form-group">
            <label for="cim">Cím:</label>
            <input type="text" class="form-control" id="cim" name="cim" maxlength="100" placeholder="Irányítószám, utca, házszám, emelet, ajtó" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['cim']) ?>" <?php endif; ?>>
      </div>
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
            <input type="password" class="form-control" id="jelszo" name="jelszo" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['jelszo']) ?>" <?php endif; ?>>
      </div>
      <div class="form-group">
            <label for="jelszoujra">Jelszó megerősítése:</label>
            <input type="password" class="form-control" id="jelszoujra" name="jelszoujra" maxlength="100" required <?php if ($this->session->flashdata('last_request') !== null) : ?> value="<?php echo ($this->session->flashdata('last_request')['jelszoujra']) ?>" <?php endif; ?>>
      </div>
      <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="feltetelek" id="feltetelek">
                <label class="form-check-label" for="input_feltetelek">Felhasználói feltételek és Adatvédelmi irányelvek elfogadása.</label>
            </div>
      </div>
    <button type="submit" class="btn btn-warning" name="regisztracio" value="true">Regisztráció</button>
</form><br>
