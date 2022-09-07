<br>
<div class="container"><h6 style="font-weight: bold; text-align: center;">Profil módosítása:</h6></div>
<div class="container">
    <form action="<?php echo base_url()?>modositas/<?php echo $_SESSION['user']['user_id']; ?>" method="POST">
    <div class="form-group">
        <label for="telepules_id">Település:</label>
        <select class="form-control" id="telepules_id" name="telepules_id" required>
        <?php for ($x = 0; $x < $telepules_szam; $x++) {?>
        <option value="<?php echo $x+1; ?>"><?php echo $telepules[$x]['telepules']; ?></option> <?php } ?>
        </select> 
    </div>
    <div class="form-group">
            <label for="cim">Cím:</label>
            <input type="text" class="form-control" id="cim" name="cim" maxlength="100" pattern=".{8,100}" required value="<?php echo $userAdatai[0]['cim']; ?>">
    </div>
    <div class="form-group">
            <label for="email">E-mail cím:</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="100" required value="<?php echo $userAdatai[0]['email']; ?>">
    </div>
    <div class="form-group">
            <label for="telszam">Telefonszám:</label>
            <input type="tel" class="form-control" id="telszam" name="telszam" maxlength="30" pattern=".{7,30}" required value="<?php echo $userAdatai[0]['telszam'];; ?>">
    </div>
    <div class="form-group">
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION['user']['user_id']; ?>">
    </div>
    <button type="submit" class="btn btn-warning" value="true">Profil módosítása</button>
    </form>
</div><br>

<div class="container"><h6 style="font-weight: bold; text-align: center;">Jelszó módosítása:</h6></div>
<div class="container">
    <form action="<?php echo base_url()?>jelszomodositas/<?php echo $_SESSION['user']['user_id']; ?>" method="POST">
    <div class="form-group">
            <label for="jelenlegijelszo">Jelenlegi jelszó:</label>
            <input type="password" class="form-control" id="jelenlegi_jelszo" name="jelenlegi_jelszo" maxlength="100" required>
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


