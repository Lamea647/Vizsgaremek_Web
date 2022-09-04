<div class="row">
    <div class="col-sm-4">
        <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $_SESSION['user']['profilkep']; ?>" alt="felhasznalo_profilkepe">
    </div>
    <div class="col-sm-8">
        <table style="width:30%">
            <tr>
                <td>Teljes név:</td>
                <td><?php echo $_SESSION['user']['nev']; ?></td>
            </tr>
            <tr>
                <td>Felhasználónév:</td>
                <td><?php echo $_SESSION['user']['felhnev']; ?></td>
            </tr>
        </table>
    <button class="btn btn-warning">
    <a href="<?php echo base_url(); ?>profil/profil_modositas">Profil módosítása</a>
    </button>
    <button class="btn btn-danger">
    <a id="profiltorlesgomb" onclick="profilTorlese()">Profil törlése</a>
    </button>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p style="font-weight: bold;">Személyes adatok:</p>
        <table style="width:100%">
            <tr>
                <td>Telefonszám:</td>
                <td><?php echo $userAdatai[0]['telszam']; ?></td>
            </tr>
            <tr>
                <td>E-mail cím:</td>
                <td><?php echo $userAdatai[0]['email']; ?></td>
            </tr>
            <tr>
                <td>Település:</td>
                <td><?php echo $telepules['telepules']; ?></td>
            </tr>
            <tr>
                <td>Cím:</td>
                <td><?php echo $userAdatai[0]['cim']; ?></td>
            </tr>
        </table><br>
        <p style="font-weight: bold;">Statisztika:</p>
        <table style="width:25%">
            <tr>
                <td>Pontszám:</td>
                <td><?php echo $userAdatai[0]['pontszam']; ?></td>
            </tr>
        </table>
    </div>
</div><br>
<p style="font-weight: bold;">Díjaim:</p>
<div class="row">
<?php foreach ($kategoriaKepek as $kategoriakep) {?>
    <div class="col-sm-3 col-lg-2">
        <img style="width: 200px; height: 150px;" class="img-thumbnail" src="<?php echo base_url(); ?>images/<?php echo $kategoriakep['kategoria_kep']; ?>"alt="kategoria_kepe">
    </div>
<?php } ?>
</div><br>

<p style="font-weight: bold;">Hirdetések, amikre jelentkeztem:</p>
<div class="row">
    <?php for ($i=0; $i < count($hirdetesIdkJelentkezesek) ; $i++) {?>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width:100%">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/<?php echo $kategoriaKepekJelentkezesek[$i]['kategoria_kep']; ?>" alt="kategoria_kepe" style="width:100%">
            <a href="<?php echo base_url(); ?>hirdetes/<?php echo $hirdetesIdkJelentkezesek[$i]['hirdetes_id']; ?>" class="btn btn-warning">Tovább a hirdetésre</a>
        </div>
    </div>
<?php } ?>
</div>

<p style="font-weight: bold;">Saját hirdetéseim:</p>
<div class="row">
<?php for ($i=0; $i < count($kategoriaKepekSajatHirdetesek) ; $i++) {?>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width:100%;">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/<?php echo $kategoriaKepekSajatHirdetesek[$i]['kategoria_kep']; ?>"alt="kategoria_kepe" style="width:100%;">
            <a href="<?php echo base_url(); ?>hirdetes/<?php echo $hirdetesIdkSajatHirdetesek[$i]['hirdetes_id']; ?>" class="btn btn-warning">Tovább a hirdetésre</a>
            <a id="hirdetestorlesgomb<?php echo $hirdetesIdkSajatHirdetesek[$i]['hirdetes_id'];?>" onclick="hirdetesTorlese(<?php echo $hirdetesIdkSajatHirdetesek[$i]['hirdetes_id']; ?>)" class="btn btn-danger">Törlés</a>
        </div>
    </div>
<?php } ?>
</div>

<p style="font-weight: bold;">Jóváhagyásra váró hirdetéseim:</p>
<div class="row">
<?php for ($i=0; $i < count($jovahagyasravaroHirdetesekAdatai) ; $i++) {?>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width:100%;">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/<?php echo $jovahagyasravaroKategoriaKepek[$i]['kategoria_kep']; ?>"alt="kategoria_kepe" style="width:100%;">
            <a href="<?php echo base_url(); ?>hirdetes/<?php echo $jovahagyasravaroHirdetesekAdatai[$i]['hirdetes_id']; ?>" class="btn btn-warning">Tovább a hirdetésre</a>
            <a href="#" id="elfogadasgomb<?php echo $jovahagyasravaroHirdetesekAdatai[$i]['hirdetes_id']?>" onclick="hirdetesElfogadasa(<?php echo $jovahagyasravaroHirdetesekAdatai[$i]['hirdetes_id']?>)" class="btn btn-success">Elfogadás</a>
            <a href="#" id="elutasitasgomb<?php echo $jovahagyasravaroHirdetesekAdatai[$i]['hirdetes_id']?>" onclick="hirdetesElutasitasa(<?php echo $jovahagyasravaroHirdetesekAdatai[$i]['hirdetes_id']?>)" class="btn btn-secondary">Elutasítás</a>
        </div>
    </div>
<?php } ?>
</div>

<script>
    function hirdetesTorlese(hirdetes_id) {
        var result = confirm("Biztosan törölni kívánja ezt a hirdetést?");
        if (result) {
            var utvonal = "<?php echo base_url(); ?>hirdetestorles/"+ hirdetes_id;
            var torlesid = "#hirdetestorlesgomb" + hirdetes_id;
            document.querySelector(torlesid).setAttribute("href", utvonal);
        }
    }

    function hirdetesElfogadasa(hirdetes_id) {
        var utvonal = "<?php echo base_url(); ?>hirdeteselfogadas/"+ hirdetes_id;
        var elfogadasid = "#elfogadasgomb" + hirdetes_id;
        document.querySelector(elfogadasid).setAttribute("href", utvonal);
    }

    function hirdetesElutasitasa(hirdetes_id) {
        var utvonal = "<?php echo base_url(); ?>hirdeteselutasitas/"+ hirdetes_id;
        var elutasitasid = "#elutasitasgomb" + hirdetes_id;
        document.querySelector(elutasitasid).setAttribute("href", utvonal);
    }

    function profilTorlese() {
        var result = confirm("Biztosan törölni kívánja felhasználói profilját?");
        if (result) {
            var utvonal = "<?php echo base_url(); ?>profiltorles";
            document.querySelector('#profiltorlesgomb').setAttribute("href", utvonal);
        }
    }
</script>

