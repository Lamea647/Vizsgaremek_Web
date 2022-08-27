<div class="container"><h5 style="font-weight: bold; text-align: center;">Hirdetések közötti keresés/szűrés:</h5></div>
<form action="<?php echo base_url()?>kereses" method="POST">
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
<div><button type="submit" class="btn btn-warning" name="szures" value="true">Szűrés</button></div>
<div class="container"><h5 style="font-weight: bold; text-align: center;">Találatok:</h5></div>

<?php if(count($lekerdezettHirdetesek) == 0 && isset($_POST["szures"])){
    echo "Nincs találat a megadott paraméterek alapján.";
}?>
<div class="row">
    <?php for ($i=0; $i < count($lekerdezettHirdetesek) ; $i++) {?>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width: 100%">
            <img class="card-img-top" src="<?php echo base_url(); ?>images/<?php echo $kategoriaKep['kategoria_kep'];?>" alt="Card image" style="width:100%">
            <div class="card-body">
            <p class="card-text" style="text-align: justify;"><?php echo strlen($lekerdezettHirdetesek[$i]['leiras']) > 50 ? substr($lekerdezettHirdetesek[$i]['leiras'], 0, 47) . "..." : $lekerdezettHirdetesek[$i]['leiras']; ?></p>
            <a href="<?php echo base_url(); ?>hirdetes/<?php echo $lekerdezettHirdetesek[$i]['hirdetes_id']; ?>" class="btn btn-warning">Tovább a hirdetésre</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>






