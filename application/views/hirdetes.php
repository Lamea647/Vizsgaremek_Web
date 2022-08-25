<div class="row">
    <div class="col-sm-4">
        <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $nev_profilkep[0]['profilkep'];?>" alt="hirdeto_profilkepe">
    </div>
    <div class="col-sm-8">
        <table style="width:100%">
            <tr>
                <td>Teljes név:</td>
                <td><?php echo $nev_profilkep[0]['nev'];?></td>
            </tr>
            <tr>
                <td>Település:</td>
                <td>
                    <?php 
                        for ($i=0; $i < $telepules_szam ; $i++): 
                            if($hirdetesek[0]['telepules_id'] == $i+1):
                                echo $telepules[$i]['telepules'];
                            endif;
                        endfor;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Cím:</td>
                <td><?php echo $hirdetesek[0]['hirdetes_cim'];?></td>
            </tr>
            <tr>
                <td>Telefonszám:</td>
                <td><?php echo $hirdetesek[0]['hirdetes_telszam'];?></td>
            </tr>
            <tr>
                <td>Kategória:</td>
                <td>
                    <?php 
                        for ($i=0; $i < $kategoria_szam ; $i++): 
                            if($hirdetesek[0]['kategoria_id'] == $i+1):
                                echo $kategoria_nev[$i]['kategoria_nev'];
                            endif;
                        endfor;
                    ?>
                </td>    
            </tr>
            <tr>
                <td>Időpont kezdete:</td>
                <td><?php echo $hirdetesek[0]['kezdo_idopont'];?></td>
            </tr>
            <tr>
                <td>Időpont vége:</td>
                <td><?php echo $hirdetesek[0]['zaro_idopont'];?></td>
            </tr>
        </table>
    </div> 
</div>
<div class="row">
    <div class="col-sm-12">
        <p>Leírás:</p>
        <p style="text-align: justify;"><?php echo $hirdetesek[0]['leiras'];?></p>
    </div>
</div>
<button class="btn btn-warning">Jelentkezem</button>
<br>






  


  


