<div class="row">
    <div class="col-sm-4">
        <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $_SESSION['user']['profilkep'];?>" alt="hirdeto_profilkepe">
    </div>
    <div class="col-sm-8">
        <table style="width:100%">
            <tr>
                <td>Teljes név:</td>
                <td><?php echo $_SESSION['user']['nev'];?></td>
            </tr>
            <tr>
                <td>Település:</td>
                <td>
                    <?php 
                        for ($i=0; $i < $telepules_szam ; $i++): 
                            if($hirdetesek['telepules_id'] == $i+1):
                                echo $telepules[$i]['telepules'];
                            endif;
                        endfor;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Cím:</td>
                <td><?php echo $hirdetesek['hirdetes_cim'];?></td>
            </tr>
            <tr>
                <td>Telefonszám:</td>
                <td><?php echo $_SESSION['user']['telszam'];?></td>
            </tr>
            <tr>
                <td>Másodlagos telefonszám:</td>
                <td><?php echo $hirdetesek['telszam_2'];?></td>
            </tr>
            <tr>
                <td>Időpont:</td>
                <td><?php echo $hirdetesek['kezdo_idopont'];?></td>
            </tr>
            <tr>
                <td>Kategória:</td>
                <td>
                    <?php 
                        for ($i=0; $i < $kategoria_szam ; $i++): 
                            if($hirdetesek['kategoria_id'] == $i+1):
                                echo $kategoria_nev[$i]['kategoria_nev'];
                            endif;
                        endfor;
                    ?>
                </td>    
            </tr>
        </table>
    </div> 
</div>
<div class="row">
    <div class="col-sm-12">
        <p>Leírás:</p>
        <p style="text-align: justify;"><?php echo $hirdetesek['leiras'];?></p>
    </div>
</div>
<button class="btn btn-warning">Jelentkezem</button>
<br>








  


  


