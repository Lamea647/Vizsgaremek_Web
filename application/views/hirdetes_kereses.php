<div class="container"><h5 style="font-weight: bold; text-align: center;">Hirdetések közötti keresés/szűrés:</h5></div>
<div class="form-group">
    <label for="kategoria_id">Kategória szerinti szűrés:</label>
    <select class="form-control" id="kategoria_id" name="telepules_id">
    <?php for ($x = 0; $x < 12; $x++) {?>
    <option value="<?php echo $x+1; ?>"><?php echo $kategoria_nev[$x]['kategoria_nev']; ?></option> <?php } ?>
    </select> 
</div>
<div class="form-group">
    <label for="telepules_id">Település szerinti szűrés:</label>
    <select class="form-control" id="telepules_id" name="telepules_id">
    <?php for ($x = 0; $x < 3180; $x++) {?>
    <option value="<?php echo $x+1; ?>"><?php echo $telepules[$x]['telepules']; ?></option> <?php } ?>
    </select> 
</div>
<div class="form-group">
    <label for="kezdo_idopont">Dátum szerinti szűrés:</label>
    <input type="date" class="form-control" id="kezdo_idopont" name="kezdo_idopont">
</div>
<div class="container"><h5 style="font-weight: bold; text-align: center;">Találatok:</h5></div>

<div class="row">
  <div class="col-sm-4">
  <img class="mx-auto d-block" src="<?php echo base_url(); ?>images/kategoria_id_1.jpg" alt="kutyasetaltatas">
  </div>
  <div class="col-sm-4">
      <?php echo "Ez egy szövegrészlet a hirdetés feladásakor kötelezően kitöltött, a hirdetést ismertető leírásból."?>
  </div>
  <div class="col-sm-4">
      <button class="mx-auto d-block btn btn-warning">Tovább a hirdetésre</button>
  </div>
</div> 
<div class="row">
  <div class="col-sm-4">
  <img class="mx-auto d-block" src="<?php echo base_url(); ?>images/kategoria_id_3.jpg" alt="takaritas">
  </div>
  <div class="col-sm-4">
      <?php echo "Ez egy szövegrészlet a hirdetés feladásakor kötelezően kitöltött, a hirdetést ismertető leírásból."?>
  </div>
  <div class="col-sm-4">
      <button class="mx-auto d-block btn btn-warning">Tovább a hirdetésre</button>
  </div>
</div> 


