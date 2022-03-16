<div class="container"><h5 style="font-weight: bold; text-align: center;">Új hirdetés adatai:</h5></div>
    <div class="container col-lg-8">
        <div class="form-group">
            <label for="kezdo_idopont">Kezdő időpont:</label>
            <input type="datetime-local" class="form-control" id="kezdo_idopont" name="kezdo_idopont">
        </div> 
        <div class="form-group">
            <label for="zaro_idopont">Záró időpont:</label>
            <input type="datetime-local" class="form-control" id="zaro_idopont" name="zaro_idopont">
        </div> 
        <div class="form-group">
            <p>Kategória:</p>
            <select class="form-control" id="kategoria_id" name="kategoria_id">
            <?php for ($x = 0; $x < 12; $x++) {?>
            <option value="<?php echo $x+1; ?>"><?php echo $kategoria_nev[$x]['kategoria_nev']; ?></option> <?php } ?>
            </select> 
        </div>
        <div class="form-group">
            <label for="leiras">Leírás:</label>
            <textarea class="form-control" id="leiras" name="leiras" rows="5" cols="10"></textarea>
        </div> 
        <div class="form-group">
            <label for="telepules_id">Település:</label>
            <select class="form-control" id="telepules_id" name="telepules_id" required>
            <?php for ($x = 0; $x < $szam; $x++):?>
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
                <label for="telszam">Telefonszám</label>
                <input type="tel" class="form-control" id="telszam" name="telszam" required value="<?php echo $_SESSION['user']['telszam']; ?>">
        </div>
        <div class="form-group">
                <label for="telszam_masik">Másodlagos telefonszám</label>
                <input type="telszam_masik" class="form-control" id="telszam_masik" name="telszam_masik" required placeholder="Opcionálisan megadható másik telefonszám">
        </div>
        <button type="submit" class="btn btn-warning">Hirdetés feladása</button>
    </div><br>
