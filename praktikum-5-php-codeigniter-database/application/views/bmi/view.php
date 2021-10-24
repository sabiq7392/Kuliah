<h2>Data Pasien #ID:<?=$bmi->id?></h2>
<div>
    <table class="table table-striped table-hover">
        <tr>
            <td>Kode Pasien</td>
            <td>:</td>
            <td><?=$bmi->pasien_id?></td> 
        </tr>
        <tr>
            <td>Tanggal Periksa</td>
            <td>:</td>
            <td><?=$bmi->tanggal?></td>
        </tr>
        <tr>
            <td>Berat</td>
            <td>:</td>
            <td><?=$bmi->berat?></td>
        </tr>
        <tr>
            <td>Tinggi</td>
            <td>:</td>
            <td><?=$bmi->tinggi?></td>
        </tr>
        <tr>
            <td>BMI</td>
            <td>:</td>
            <td><?=$bmi->bmi?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td><?=$bmi->status_bmi?></td>
        </tr>
        <tr>
            <td>Catatan</td>
            <td>:</td>
            <td><?=$bmi->catatan?></td>
        </tr>
    </table>
</div>