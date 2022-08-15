<div class="row">
    <div class="col-sm-6">
        <h5 style="text-align: center;">Ranglista - Helyezettek listája</h5>
        <p style="text-align: center;">1.</p>
        <div class="row">
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/elso.jpg" alt="dij_1">
            </div>
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/helyezett_1.jpg" alt="helyezett_1">
            </div>
        </div>
        <p style="text-align: center;">2.</p>
        <div class="row">
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/masodik.jpg" alt="dij_1">
            </div>
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/helyezett_2.jpg" alt="helyezett_1">
            </div>
        </div>
        <p style="text-align: center;">3.</p>
        <div class="row">
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/harmadik.jpg" alt="dij_1">
            </div>
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/helyezett_3.jpg" alt="helyezett_1">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
    <h5 style="text-align: center;">Statisztika - Hirdetések kategóriája szerint</h5>
    <p style="text-align: center;">1.</p>
        <div class="row">
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/kutyasetaltatas.jpg" alt="kategoria_1">
            </div>
            <div class="col-sm-6">
                <p style="text-align: center; padding: 70px; font-weight: bold; font-size: x-large;">10 %</p>
            </div>
        </div>
        <p style="text-align: center;">2.</p>
        <div class="row">
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/bevasarlas.jpg" alt="kategoria_2">
            </div>
            <div class="col-sm-6">
                <p style="text-align: center; padding: 70px; font-weight: bold; font-size: x-large;">20 %</p>
            </div>
        </div>
        <p style="text-align: center;">3.</p>
        <div class="row">
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/takaritas.jpg" alt="kategoria_3">
            </div>
            <div class="col-sm-6">
                <p style="text-align: center; padding: 70px; font-weight: bold; font-size: x-large;">16 %</p>
            </div>
        </div>
    </div>
</div> 


<?php //Statisztikai adatok megjelenítésének tesztelése
foreach($adatok as $adat){
    echo $adat['kategoria_id'] . ".kategória - " . $adat['COUNT(hirdetes_id)'] . " db <br>";
    echo $adat['kategoria_id'] . ".kategória - " . $adat['COUNT(hirdetes_id)']/$hirdetes_szam*100 . " % <br>";
}
?>

<?php
for ($i=0; $i < 12 ; $i++):?>
    <?php for ($j=0; $j < 2 ; $j++):?>
        <?php if($adatok[$j]['kategoria_id'] == $i+1):?>
            <p style="text-align: center;"><?php echo $adatok[$j]['kategoria_id'];?></p>
            <div class="row">
                <div class="col-sm-6">
                    <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/<?php echo $kategoriaAdatok[$j+1]['kategoria_kep']; ?>" alt="kategoria_2">
                </div>
                <div class="col-sm-6">
                    <p style="text-align: center; padding: 70px; font-weight: bold; font-size: x-large;"><?php echo $adatok[$j]['COUNT(hirdetes_id)']/$hirdetes_szam*100; ?>%</p>
                </div>
            </div> 
        <?php endif; ?>
    <?php endfor; ?>
            <p style="text-align: center;"><?php echo $kategoriaAdatok[$i]['kategoria_id']?></p>
            <div class="row">
                <div class="col-sm-6">
                    <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/<?php echo $kategoriaAdatok[$i]['kategoria_kep']; ?>" alt="kategoria_2">
                </div>
                <div class="col-sm-6">
                    <p style="text-align: center; padding: 70px; font-weight: bold; font-size: x-large;">0 %</p>
                </div>
            </div>   
<?php endfor; ?>


<?php var_dump($kategoriaAdatok);?>
<?php echo $kategoriaAdatok[0]['kategoria_id'];
echo $kategoriaAdatok[0]['kategoria_nev'];
echo $kategoriaAdatok[1]['kategoria_kep'];
echo $adatok[0]['kategoria_id'];
echo $adatok[1]['kategoria_id'];




