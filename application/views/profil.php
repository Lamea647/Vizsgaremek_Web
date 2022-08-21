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
    <button class="btn btn-danger">Profil törlése</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p style="font-weight: bold;">Személyes adatok:</p>
        <table style="width:100%">
            <tr>
                <td>Telefonszám:</td>
                <td><?php echo $_SESSION['user']['telszam']; ?></td>
            </tr>
            <tr>
                <td>E-mail cím:</td>
                <td><?php echo $_SESSION['user']['email']; ?></td>
            </tr>
            <tr>
                <td>Település:</td>
                <td><?php echo $telepules['telepules']; ?></td>
            </tr>
            <tr>
                <td>Cím:</td>
                <td><?php echo $_SESSION['user']['cim']; ?></td>
            </tr>
        </table><br>
        <p style="font-weight: bold;">Statisztika:</p>
        <table style="width:25%">
            <tr>
                <td>Pontszám:</td>
                <td><?php echo $_SESSION['user']['pontszam']; ?></td>
            </tr>
        </table>
    </div>
</div><br>
<p style="font-weight: bold;">Díjaim:</p>
<div class="row">
    <div class="col-sm-3 col-lg-2">
        <img style="width: 200px; height: 150px;" class="img-thumbnail" src="<?php echo base_url(); ?>images/kutyasetaltatas.jpg" alt="kategoria_kepe">
    </div>
    <div class="col-sm-3 col-lg-2">
        <img style="width: 200px; height: 150px;" class="img-thumbnail" src="<?php echo base_url(); ?>images/vasarlas.jpg" alt="kategoria_kepe">
    </div>
    <div class="col-sm-3 col-lg-2">
        <img style="width: 200px; height: 150px;" class="img-thumbnail" src="<?php echo base_url(); ?>images/takaritas.jpg" alt="kategoria_kepe">
    </div>
</div><br>

<p style="font-weight: bold;">Hirdetések, amikre jelentkeztem:</p>
<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width:100%">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/vasarlas.jpg" alt="kategoria_kepe" style="width:100%">
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width:100%">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/kutyasetaltatas.jpg" alt="kategoria_kepe" style="width:100%">
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
        </div>
    </div>
</div>

<p style="font-weight: bold;">Saját hirdetéseim:</p>
<div class="row">
<?php foreach ($kategoriak as $kategoria) {?>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width:100%;">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/<?php echo $kategoria['kategoria_kep']; ?>"alt="kategoria_kepe" style="width:100%;">
            <a href="<?php echo base_url(); ?>hirdetes/<?php echo $kategoria['hirdetes_id']; ?>" class="btn btn-warning">Tovább a hirdetésre</a>
            <a id="torlesgomb" onclick="hirdetesTorles()" href="#" class="btn btn-danger">Törlés</a>
        </div>
    </div>
<?php } ?>
</div>

<p style="font-weight: bold;">Jóváhagyásra váró hirdetéseim:</p>
<div class="row">
<?php foreach ($kategoriak as $kategoria) {?>
    <div class="col-sm-12 col-md-4 col-lg-3" style="margin-bottom: 10px;">
        <div class="card" style="width:100%;">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/<?php echo $kategoria['kategoria_kep']; ?>"alt="kategoria_kepe" style="width:100%;">
            <a href="<?php echo base_url(); ?>hirdetes/<?php echo $kategoria['hirdetes_id']; ?>" class="btn btn-warning">Tovább a hirdetésre</a>
            <a href="#" class="btn btn-success">Elfogadás</a>
            <a href="#" class="btn btn-secondary">Elutasítás</a>
        </div>
    </div>
<?php } ?>
</div>

<script>
    function hirdetesTorles() {
        alert("Biztosan törölni szeretné ezt a hirdetést?"); 
    }
</script>