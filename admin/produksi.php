<?php 
include 'header.php';


$sortage = mysqli_query($conn, "SELECT * FROM produksi WHERE cek = '1'");
$cek_sor = mysqli_num_rows($sortage);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Daftar Pesanan</b></h2>
    <br>
    <h5 class="bg-success" style="padding: 7px; width: 710px; font-weight: bold;">
        <marquee>Lakukan Reload Setiap Masuk Halaman ini, untuk menghindari terjadinya kesalahan data dan informasi</marquee>
    </h5>
    <a href="produksi.php" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Reload</a>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Invoice</th>
                <th scope="col">Kode Customer</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 
          $result = mysqli_query($conn, "SELECT DISTINCT invoice, kode_customer, status, kode_produk, qty, terima, tolak, cek, tanggal FROM produksi GROUP BY invoice, kode_customer, status, kode_produk, qty, terima, tolak, cek, tanggal");


            $no = 1;

            while ($row = mysqli_fetch_assoc($result)) {
                $kodep = $row['kode_produk'];
                $inv = $row['invoice'];
                ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['invoice']; ?></td>
                    <td><?= $row['kode_customer']; ?></td>
                    <td style="font-weight: bold; color: 
                        <?= ($row['terima'] == 1) ? 'green' : (($row['tolak'] == 1) ? 'red' : 'orange'); ?>">
                        <?= ($row['terima'] == 1) ? 'Pesanan Diterima (Siap Kirim)' : (($row['tolak'] == 1) ? 'Pesanan Ditolak' : $row['status']); ?>
                    </td>
                    <td><?= date('Y/m/d', strtotime($row['tanggal'])); ?></td>
                    <td>
                        <?php if ($row['tolak'] == 0 && $row['cek'] == 1 && $row['terima'] == 0) { ?>
                            <a href="inventory.php?cek=0" id="rq" class="btn btn-warning">
                                <i class="glyphicon glyphicon-warning-sign"></i> Request Material Shortage
                            </a> 
                            <a href="proses/tolak.php?inv=<?= $row['invoice']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menolak ?')">
                                <i class="glyphicon glyphicon-remove-sign"></i> Tolak
                            </a> 
                        <?php } elseif ($row['terima'] == 0 && $row['cek'] == 0) { ?>
                            <a href="proses/terima.php?inv=<?= $row['invoice']; ?>&kdp=<?= $row['kode_produk']; ?>" class="btn btn-success">
                                <i class="glyphicon glyphicon-ok-sign"></i> Terima
                            </a> 
                            <a href="proses/tolak.php?inv=<?= $row['invoice']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menolak ?')">
                                <i class="glyphicon glyphicon-remove-sign"></i> Tolak
                            </a> 
                        <?php } ?>
                        <a href="detailorder.php?inv=<?= $row['invoice']; ?>&cs=<?= $row['kode_customer']; ?>" class="btn btn-primary">
                            <i class="glyphicon glyphicon-eye-open"></i> Detail Pesanan
                        </a>
                    </td>
                </tr>

                <?php
                $no++; 
            }
            ?>

        </tbody>
    </table>

    <?php 
    // Inisialisasi array material yang kurang
    $nama_material = []; 

    $result = mysqli_query($conn, "SELECT DISTINCT invoice, kode_produk, qty FROM produksi");
    
    while ($row = mysqli_fetch_assoc($result)) {
        $kodep = $row['kode_produk'];
        $inv = $row['invoice'];
        $qtyorder = $row['qty'];

        $t_bom = mysqli_query($conn, "SELECT * FROM bom_produk WHERE kode_produk = '$kodep'");

        while ($row1 = mysqli_fetch_assoc($t_bom)) {
            $kodebk = $row1['kode_bk'];

            $inventory = mysqli_query($conn, "SELECT * FROM inventory WHERE kode_bk = '$kodebk'");
            $r_inv = mysqli_fetch_assoc($inventory);

            if ($r_inv) {
                $kebutuhan = $row1['kebutuhan'];    
                $inventory_qty = $r_inv['qty'];
                $bom = ($kebutuhan * $qtyorder);
                $hasil = $inventory_qty - $bom;

                if ($hasil < 0) {
                    $nama_material[] = $r_inv['nama'];
                    mysqli_query($conn, "UPDATE produksi SET cek = '1' WHERE invoice = '$inv'");
                }
            }
        }
    }

    // Tampilkan daftar material yang kurang jika ada
    if (!empty($nama_material)) {
    ?>
        <br><br>
        <div class="row">
            <div class="col-md-4 bg-danger" style="padding:10px;">
                <h4>Kekurangan Material</h4>
                <h5 style="color: red;font-weight: bold;">Silahkan Tambah Stok Material di bawah ini:</h5>
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Material</th>
                    </tr>
                    <?php 
                    $arr = array_values(array_unique($nama_material));
                    for ($i = 0; $i < count($arr); $i++) { 
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $arr[$i]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php 
    } 
    ?>

</div>

<?php 
include 'footer.php';
?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>