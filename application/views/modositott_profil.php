<br>
<div class="container"><h6 style="font-weight: bold; text-align: center;">Profil módosítása:</h6></div>
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
            <input type="text" class="form-control" id="cim" name="cim" maxlength="100" pattern=".{8,100}" required value="<?php echo $_SESSION['user']['cim']; ?>">
    </div>
    <div class="form-group">
            <label for="email">E-mail cím:</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="100" required value="<?php echo $_SESSION['user']['email']; ?>">
    </div>
    <div class="form-group">
            <label for="telszam">Telefonszám:</label>
            <input type="tel" class="form-control" id="telszam" name="telszam" maxlength="30" pattern=".{7,30}" required value="<?php echo $_SESSION['user']['telszam']; ?>">
    </div>
    <button type="submit" class="btn btn-warning" value="true">Profil módosítása</button>
    </form>
</div><br>

<div class="container"><h6 style="font-weight: bold; text-align: center;">Jelszó módosítása:</h6></div>
<div class="container">
    <div class="form-group">
            <label for="jelszo">Jelenlegi jelszó:</label>
            <input type="password" class="form-control" id="jelenlegijelszo" name="jelszo" maxlength="100" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,100}" required>
      </div>
      <div class="form-group">
            <label for="jelszoujra">Új jelszó:</label>
            <input type="password" class="form-control" id="ujjelszo" name="jelszo" maxlength="100" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,100}" required>
      </div>
      <div class="form-group">
            <label for="jelszoujra">Új jelszó újra:</label>
            <input type="password" class="form-control" id="ujjelszoujra" name="ujjelszoujra" maxlength="100" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,100}" required>
      </div>
      <button type="submit" class="btn btn-warning" value="true">Jelszó módosítása</button>
</div><br>



