<div class="container"><h5 style="font-weight: bold; text-align: center;">Új hirdetés adatai:</h5></div>
    <div class="container col-lg-8">
    <form action="<?php echo base_url(); ?>hirdetes_feladas" method="post">
        <div class="form-group">
            <label for="kezdo_idopont">Kezdő időpont:</label>
            <input type="datetime-local" class="form-control" id="kezdo_idopont" name="kezdo_idopont" required>
        </div> 
        <div class="form-group">
            <label for="zaro_idopont">Záró időpont:</label>
            <input type="datetime-local" class="form-control" id="zaro_idopont" name="zaro_idopont" required>
        </div> 
        <div class="form-group">
            <p>Kategória:</p>
            <select class="form-control" id="kategoria_id" name="kategoria_id" required>
            <?php for ($x = 0; $x < $kategoria_szam; $x++) {?>
            <option value="<?php echo $x+1; ?>"><?php echo $kategoria_nev[$x]['kategoria_nev']; ?></option> <?php } ?>
            </select> 
        </div>
        <div class="form-group">
            <label for="leiras">Leírás:</label>
            <textarea class="form-control" id="leiras" name="leiras" rows="5" cols="10" required></textarea>
        </div> 
        <div class="form-group">
            <label for="telepules_id">Település:</label>
            <select class="form-control" id="telepules_id" name="telepules_id" required>
                <?php for ($x = 0; $x < $telepules_szam; $x++) {?>
                <option value="<?php echo $x+1; ?>"><?php echo $telepules[$x]['telepules']; ?></option> <?php } ?>
            </select> 
        </div>
        <div class="form-group">
                <label for="hirdetes_cim">Cím:</label>
                <input type="text" class="form-control" id="hirdetes_cim" name="hirdetes_cim" maxlength="100" pattern=".{8,100}" required onchange="validalas_cim();">
        </div>
        <span id="hirdetes_cim_hiba" style="color: red;"></span>
        <div class="form-group">
                <label for="hirdetes_telszam">Telefonszám:</label>
                <input type="tel" class="form-control" id="hirdetes_telszam" name="hirdetes_telszam" maxlength="30" pattern=".{7,30}" required onchange="validalas_telszam();">
        </div>
        <span id="hirdetes_telszam_hiba" style="color: red;"></span><br>
        <button type="submit" onclick="validalas();" class="btn btn-warning" name="hirdetes_feladas" value="true">Hirdetés feladása</button>
        </form>
    </div><br>

<script>
    function validalas(){
        validalas_cim();
        validalas_telszam();
    }
</script>

<script>
    function validalas_cim(){
        let hirdetes_cim = document.getElementById("hirdetes_cim").value;
        if(hirdetes_cim.length < 8){
            document.getElementById("hirdetes_cim_hiba").innerHTML = "A megadott cím nem lehet 8 karakternél rövidebb.";
        }else{
            document.getElementById("hirdetes_cim_hiba").innerHTML = "";
        }
    }
</script>

<script>
    function validalas_telszam(){
        let hirdetes_telszam = document.getElementById("hirdetes_telszam").value;
        if(hirdetes_telszam.length < 7){
            document.getElementById("hirdetes_telszam_hiba").innerHTML = "A megadott telefonszám nem lehet 7 karakternél rövidebb.";
        }else{
            document.getElementById("hirdetes_telszam_hiba").innerHTML = "";
        }
    }
</script>

