<div class="row">
    <div class="col-sm-4">
        <img class="img-fluid" src="<?php echo base_url(); ?>images/profilkep_1.jpg" alt="felhasznalo_profilkepe">
    </div>
    <div class="col-sm-8">
        <table style="width:30%">
            <tr>
                <td>Teljes név:</td>
                <td>Kiss Anita</td>
            </tr>
            <tr>
                <td>Felhasználónév:</td>
                <td>kissa</td>
            </tr>
        </table>
    <button class="btn btn-warning">Profil módosítása</button>
    <button class="btn btn-warning">Profil törlése</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <p style="font-weight: bold;">Személyes adatok:</p>
        <table style="width:100%">
            <tr>
                <td>Telefonszám:</td>
                <td>Regisztrációkor megadott telefonszám betöltődik</td>
            </tr>
            <tr>
                <td>E-mail cím:</td>
                <td>Regisztrációkor megadott e-mail cím betöltődik</td>
            </tr>
            <tr>
                <td>Település:</td>
                <td>Regisztrációkor megadott település betöltődik</td>
            </tr>
            <tr>
                <td>Cím:</td>
                <td>Regisztrációkor megadott cím betöltődik</td>
            </tr>
        </table><br>
        <p style="font-weight: bold;">Statisztika:</p>
        <table style="width:25%">
            <tr>
                <td>Pontszám:</td>
                <td>3</td>
            </tr>
        </table>
    </div>
</div><br>
<p style="font-weight: bold;">Díjaim:</p>
<div class="row">
    <div class="col-sm-2">
        <img style="width: 100px; height: 100px;" class="img-fluid" src="<?php echo base_url(); ?>images/kategoria_id_1.jpg" alt="kategoria_kepe">
    </div>
    <div class="col-sm-2">
        <img style="width: 100px; height: 100px;" class="img-fluid" src="<?php echo base_url(); ?>images/kategoria_id_2.jpg" alt="kategoria_kepe">
    </div>
    <div class="col-sm-2">
        <img style="width: 100px; height: 100px;" class="img-fluid" src="<?php echo base_url(); ?>images/kategoria_id_3.jpg" alt="kategoria_kepe">
    </div>
</div>
<p style="font-weight: bold;">Hirdetések, amikre jelentkeztem:</p>
<div class="row">
    <div class="col-sm-2">
        <div class="card" style="width:100px">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/kategoria_id_2.jpg" alt="kategoria_kepe" style="width:100%">
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card" style="width:100px">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/kategoria_id_1.jpg" alt="kategoria_kepe" style="width:100%">
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
        </div>
    </div>
</div><br>
<p style="font-weight: bold;">Saját hirdetéseim:</p>
<div class="row">
    <div class="col-sm-2">
        <div class="card" style="width:100px;">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/kategoria_id_2.jpg" alt="kategoria_kepe" style="width:100%;">
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
            <a href="#" class="btn btn-danger">Törlés</a>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card" style="width:100px">
            <img class="card-img-bottom" src="<?php echo base_url(); ?>images/kategoria_id_3.jpg" alt="kategoria_kepe" style="width:100%">
            <a href="#" class="btn btn-warning">Tovább a hirdetésre</a>
            <a id="torlesgomb" onclick="hirdetesTorles()" href="#" class="btn btn-danger">Törlés</a>
        </div>
    </div>
</div>

<script>
    function hirdetesTorles() {
        alert("Biztosan törölni szeretné ezt a hirdetést?"); 
    }
</script>