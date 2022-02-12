<form method="post" enctype="multipart/form-data">
      <div class="form-group">
            <label for="nev">Teljes név</label>
            <input type="text" class="form-control" id="nev" name="nev" maxlength="100" required value="<?php echo isset($nev)?$nev:""; ?>">
      </div>
      <div class="form-group">
            <label for="felhnev">Felhasználónév</label>
            <input type="text" class="form-control" id="felhnev" name="felhnev" maxlength="100" required value="<?php echo isset($felhnev)?$felhnev:""; ?>">
      </div>
      <div class="form-group">
            <label for="szuldatum">Születési dátum</label>
            <input type="date" class="form-control" id="szuldatum" name="szuldatum" required value="<?php echo isset($szuldatum)?$szuldatum:""; ?>">
      </div>
      <div class="form-group">
            <label for="telszam">Telefonszám</label>
            <input type="tel" class="form-control" id="telszam" name="telszam" required value="<?php echo isset($telszam)?$telszam:""; ?>">
      </div>
      <div class="form-group">
            <label for="email">E-mail cím</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="100" required value="<?php echo isset($email)?$email:""; ?>">
      </div>
      <div class="form-group">
            <label for="telepules_id">Település</label>
            <select class="form-control" id="telepules_id" name="telepules_id" required>
            <?php for ($x = 0; $x < 3180; $x++) {?>
            <option value="<?php echo $x+1; ?>"><?php echo $telepules[$x]['telepules']; ?></option> <?php } ?>
            </select> 
      </div>
      <div class="form-group">
            <label for="cim">Cím</label>
            <input type="text" class="form-control" id="cim" name="cim" maxlength="100" required placeholder="irányítószám, utca, házszám, emelet, ajtó"value="<?php echo isset($cim)?$cim:""; ?>">
      </div>
      <div class="form-group">
            <label for="okmanyszam">Feltöltött okmány száma</label>
            <input type="text" class="form-control" id="okmanyszam" name="okmanyszam" maxlength="100" required value="<?php echo isset($okmanyszam)?$okmanyszam:""; ?>">
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
            <label for="jelszo">Jelszó</label>
            <input type="password" class="form-control" id="jelszo" name="jelszo" maxlength="100" required>
      </div>
      <div class="form-group">
            <label for="jelszoujra">Jelszó megerősítése</label>
            <input type="password" class="form-control" id="jelszoujra" name="jelszoujra" maxlength="100" required>
      </div>
      <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="feltetelek" id="feltetelek">
                <label class="form-check-label" for="input_feltetelek">Felhasználói feltételek és Adatvédelmi irányelvek elfogadása.</label>
            </div>
      </div>
    <button type="submit" class="btn btn-warning" name="regisztracio" value="true">Regisztráció</button>
</form><br>
