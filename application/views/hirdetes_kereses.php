<div class="container"><h5 style="font-weight: bold; text-align: center;">Hirdetések közötti keresés/szűrés:</h5></div>
<div class="form-group">
    <label for="kategoria_id">Kategória szerinti szűrés:</label>
    <select class="form-control" id="kategoria_id" name="kategoria_id">
    <?php for ($x = 0; $x < $kategoria_szam; $x++) {?>
    <option value="<?php echo $x+1; ?>"><?php echo $kategoria_nev[$x]['kategoria_nev']; ?></option> <?php } ?>
    </select> 
</div>
<div class="form-group">
    <label for="telepules_id">Település szerinti szűrés:</label>
    <select class="form-control" id="telepules_id" name="telepules_id">
    <?php for ($x = 0; $x < $telepules_szam; $x++) {?>
    <option value="<?php echo $x+1; ?>"><?php echo $telepules[$x]['telepules']; ?></option> <?php } ?>
    </select> 
</div>
<div class="form-group">
    <label for="kezdo_idopont">Dátum szerinti szűrés:</label>
    <input type="date" class="form-control" id="kezdo_idopont" name="kezdo_idopont">
</div>
<div><button type="button" class="btn btn-warning">Szűrés</button></div>
<div class="container"><h5 style="font-weight: bold; text-align: center;">Találatok:</h5></div>

<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width: 100%">
            <img class="card-img-top" src="<?php echo base_url(); ?>images/kutyasetaltatas.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
            <p class="card-text" style="text-align: justify;"><?php echo "Ez egy szövegrészlet a hirdetés feladásakor kötelezően kitöltött, a hirdetést ismertető leírásból."?></p>
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width: 100%">
            <img class="card-img-top" src="<?php echo base_url(); ?>images/bevasarlas.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
            <p class="card-text" style="text-align: justify;"><?php echo "Ez egy szövegrészlet a hirdetés feladásakor kötelezően kitöltött, a hirdetést ismertető leírásból."?></p>
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width: 100%">
            <img class="card-img-top" src="<?php echo base_url(); ?>images/takaritas.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
            <p class="card-text" style="text-align: justify;"><?php echo "Ez egy szövegrészlet a hirdetés feladásakor kötelezően kitöltött, a hirdetést ismertető leírásból."?></p>
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width: 100%">
            <img class="card-img-top" src="<?php echo base_url(); ?>images/takaritas.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
            <p class="card-text" style="text-align: justify;"><?php echo "Ez egy szövegrészlet a hirdetés feladásakor kötelezően kitöltött, a hirdetést ismertető leírásból."?></p>
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
            </div>
        </div>
    </div>
</div>



