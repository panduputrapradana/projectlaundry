<link rel="shortcut icon" href="<?= base_url('assets/logo/favicon.png'); ?>" type="image/x-icon">
<title>Detail Transaksi</title>
<style>
    hr {
        border: 0;
        border-top: 2px solid black;
    }

    td {
        font-size: 10;
    }

    .tabel {
        border: 2px solid black;
        border-collapse: collapse;
    }
</style>
        <img src="<?= base_url('assets/'); ?>landing/img/logo.png">
<center>
    <h1><?= $transaksi['nama_outlet']; ?></h1>
</center>
<hr>

<table>
    <tr>
        <td>Customer :</td>
        <td width="300"><?= $transaksi['nama']; ?></td>

        <td>Kode Pesanan :</td>
        <td>
            <?= $transaksi['id']; ?>
        </td>
    </tr>
    <tr>
        <td> </td>
        <td width="300"><?= $transaksi['id_member']; ?></td>

        <td>Tanggal Masuk :</td>
        <td>
            <?= $transaksi['tgl_masuk']; ?>
        </td>
    </tr>
    <tr>
        <td> </td>
        <td width="300"><?= $transaksi['alamat']; ?></td>
        <?php
        if ($transaksi['tgl_ambil'] != 0) { ?>
            <td>Tanggal Ambil :</td>
            <td>
                <?= $transaksi['tgl_ambil']; ?>
            </td>
        <?php } else { ?>
            <td>Tanggal Ambil :</td>
            <td> -</td>
        <?php }
        ?>
    </tr>
</table><br><br>

<table class="tabel" width="525">
    <tr>
        <th class="tabel">Paket</th>
        <th class="tabel">Harga</th>
        <th class="tabel">Jumlah (kg/pcs)</th>
        <th class="tabel">Total</th>
    </tr>
    <tr>
        <td class="tabel"><?= $transaksi['nama_paket']; ?></td>
        <td class="tabel"><?= "Rp." . number_format($transaksi['harga'], 0, '.', '.'); ?></td>
        <td class="tabel"><?= $transaksi['jumlah']; ?></td>
        <td class="tabel"><?= "Rp." . number_format($transaksi['total'], 0, '.', '.'); ?></td>
    </tr>
    <tr>
        <td class="tabel" colspan="3" style="font-weight: bold;">Total Pembayaran</td>
        <td class="tabel" style="font-weight: bold;"><?= "Rp." . number_format($transaksi['total'], 0, '.', '.'); ?></td>
    </tr>
</table>
<br>
<br>
<br>
<table>
    <tr>
        <td style="font-weight: bold;">Keterangan:</td>
    </tr>
    <tr>
        <td>1. Pembayaran sudah termasuk biaya admin</td>
    </tr>
    <tr>
        <td>2. Bebas dari pajak apapun</td>
    </tr>
    <tr>
        <td>3. Apabila bekas cucian terdapat kerusakan</td>
    </tr>
    <tr>
        <td> &nbsp; &nbsp; harap segera melapor ke outlet 1x24 jam setelah barang diambil</td>
    </tr>
    <tr>
        <td>

        </td>
    </tr>

</table>
<br>

<?php
if ($transaksi['dibayar'] == "dibayar") { ?>
    <h1 style="text-align:right; font-size: 25;">Lunas</h1>
<?php } else { ?>
    <h1 style="text-align:right; font-size: 25;">Belum Lunas</h1>
<?php }
?>