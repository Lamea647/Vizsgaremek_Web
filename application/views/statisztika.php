<div class="row">
    <div class="col-sm-6">
        <h5 style="text-align: center; font-weight: bold;">Ranglista - Helyezettek listája</h5>
        <?php for ($i=0; $i < 5 ; $i++) {?> 
            <p style="text-align: center;"><?php echo $i+1 . "." ?></p>
            <div class="row">
                <div class="col-sm-6">
                    <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/<?php echo $dijKepek[$i]?>">
                </div>
                <div class="col-sm-6">
                    <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php if(isset($profilKepek[$i]['profilkep'])) {echo base_url(); ?>uploads/<?php echo $profilKepek[$i]['profilkep'];} else {echo "";}?>">
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="col-sm-6">
    <h5 style="text-align: center; font-weight: bold;">Statisztika - Hirdetések kategóriája szerint</h5>
        <?php for ($i=0; $i < $kategoria_szam ; $i++) {?>
        <p style="text-align: center;"><?php echo $i+1 . ". " . $kategoriaAdatok[$i]['kategoria_nev']; ?></p>
        <div class="row">
            <div class="col-sm-6">
                <img style="height: 200px; width: 300px; display: block; margin-left: auto; margin-right: auto;" class="img-fluid" src="<?php echo base_url(); ?>images/<?php echo $kategoriaKepek[$i]['kategoria_kep']?>" alt="kategoria">
            </div>
            <div class="col-sm-6">
                <p style="text-align: center; padding: 70px; font-weight: bold; font-size: x-large;"><?php echo round($kategoriaDarabszamok[$i]['Darabszám']/$hirdetes_szam*100, 1) . "%"?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div> 







