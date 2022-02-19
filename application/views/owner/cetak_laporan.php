<style>
    .tabel {
        border: 2px solid black;
        border-collapse: collapse;
    }
</style>
<title>Laporan Pencucian</title>


<center>
    <h1>Laporan Pencucian</h1>
</center>

<table width="775">
    <tr>
        <td style="text-align: center;">
            Dari <?= $this->session->userdata('tanggal_mulai'); ?> Sampai <?=
                                                                            $this->session->userdata('tanggal_akhir');
                                                                            ?>
        </td>
    </tr>
</table>

<br>
<br>

<table class="tabel" width="775" border="1">
    <tr style="background: yellow;">
        <th>No</th>
        <th>Tanggal Masuk</th>
        <th>Kode Pesanan</th>
        <th>Pelanggan</th>
        <th>Outlet</th>
        <th>Paket</th>
        <th>Harga</th>
        <th>Jumlah (kg/pcs)</th>
        <th>Total</th>
        <th>Status</th>
    </tr>

    <?php
    $no = 1;
    foreach ($laporan as $row) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row->tgl_masuk; ?></td>
            <td><?= $row->id; ?></td>
            <td><?= $row->nama; ?></td>
            <td><?= $row->nama_outlet; ?></td>
            <td><?= $row->nama_paket; ?></td>
            <td><?= "Rp." . number_format($row->harga, 0, '.', '.'); ?></td>
            <td><?= $row->jumlah; ?></td>
            <td><?= "Rp." . number_format($row->total, 0, '.', '.'); ?></td>
            <td><?= $row->status; ?></td>
        </tr>.
    <?php }
    ?>
</table>