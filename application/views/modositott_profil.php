<br>
<div class="container"><h6 style="font-weight: bold; text-align: center;">Profil módosítása (jóváhagyás nélkül, azonnal életbe lépnek):</h6></div>
<div class="container">
    <form action="<?php echo base_url(). 'adatok_mod/' . $_SESSION['user']['user_id']; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="telepules_id">Település:</label>
            <select class="form-control" id="telepules_id" name="telepules_id" required>
            <?php for ($x = 0; $x < $telepules_szam; $x++):?>
                <option value="
                <?php if($x+1 == $_SESSION['user']['telepules_id']):?>
                    <?php echo $x+1; ?>" selected>
                <?php else: echo $x+1; ?>"><?php endif ?><?php echo $telepules[$x]['telepules']; ?><?php endfor ?></option> 
            </select> 
    </div>
    <div class="form-group">
            <label for="cim">Cím:</label>
            <input type="text" class="form-control" id="cim" name="cim" maxlength="100" required value="<?php echo $_SESSION['user']['cim']; ?>">
    </div>
    <div class="form-group">
            <label for="email">E-mail cím:</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="100" required value="<?php echo $_SESSION['user']['email']; ?>">
    </div>
    <div class="form-group">
            <label for="telszam">Telefonszám:</label>
            <input type="tel" class="form-control" id="telszam" name="telszam" required value="<?php echo $_SESSION['user']['telszam']; ?>">
    </div>
    <div class="form-group">
            <label for="profilkep">Új profilkép feltöltése:</label>
            <input accept=".jpg,.jpeg,.png,.bmp" type="file" class="form-control-file" id="profilkep" name="profilkep">
    </div>
    <button type="submit" class="btn btn-warning">Profil módosítása</button>
    </form>
</div><br>

<div class="container"><h6 style="font-weight: bold; text-align: center;">Profil módosítása (jóváhagyás szükséges az adatok módosítását követően):</h6></div>
<div class="container">
    <div class="form-group">
            <label for="jelszo">Régi jelszó:</label>
            <input type="password" class="form-control" id="jelszo" name="jelszo" maxlength="100" required>
      </div>
      <div class="form-group">
            <label for="jelszoujra">Új jelszó:</label>
            <input type="password" class="form-control" id="jelszoujra" name="jelszoujra" maxlength="100" required>
      </div>
      <div class="form-group">
            <label for="jelszoujra">Új jelszó újra:</label>
            <input type="password" class="form-control" id="jelszoujra" name="jelszoujra" maxlength="100" required>
      </div>
      <button type="submit" class="btn btn-warning">Profil módosítása</button>
</div>

<div class="container"><h6 style="font-weight: bold; text-align: center;">Profil módosítása (jóváhagyás szükséges az adatok módosítását követően):</h6></div>
<div class="container">
      <div class="form-group">
            <label for="nev">Teljes név:</label>
            <input type="text" class="form-control" id="nev" name="nev" maxlength="100" required value="<?php echo $_SESSION['user']['nev']; ?>">
      </div>
      <div class="form-group">
            <label for="okmanyszam">Feltöltött új okmány száma:</label>
            <input type="text" class="form-control" id="okmanyszam" name="okmanyszam" maxlength="100" required value="<?php echo $_SESSION['user']['okmanyszam']; ?>">
      </div>
      <div class="form-group">
            <label for="okmanykep">Új okmánykép feltöltése:</label>
            <input accept=".jpg,.jpeg,.png,.bmp" type="file" class="form-control-file" id="okmanykep" name="okmanykep" required>
      </div>
    <button type="submit" class="btn btn-warning">Profil módosítása</button>
</div><br>