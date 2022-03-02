<div class="col-lg-6 mx-auto" style="margin-top: 5%;">
<form action="<?php echo base_url(); ?>bejelentkezes" method="post">
    <div class="form-group">
        <label for="felhnev">Felhasználónév:</label>
        <input type="text" class="form-control" id="felhnev" name="felhnev" required>
    </div>
    <div class="form-group">
        <label for="jelszo">Jelszó:</label>
        <input type="password" class="form-control" id="jelszo" name="jelszo" required>
    </div>
<button type="submit" class="btn btn-warning" name="belepes" value="true">Bejelentkezés</button>
</form>
</div><br>