<?php 
include '../koneksi/koneksi.php';

// Ambil data dari POST
$kd_cs   = $_POST['kode_cs'];
$nama    = $_POST['nama'];
$prov    = trim($_POST['prov']);
$kota    = trim($_POST['kota']);
$alamat  = trim($_POST['almt']);
$kopos   = trim($_POST['kopos']);
$tanggal = date('Y-m-d'); // gunakan 'Y' bukan 'y' untuk 4 digit tahun

// === Validasi input ===
if (empty($prov) || empty($kota) || empty($alamat) || empty($kopos)) {
    echo "<script>alert('Semua form harus diisi!'); window.history.back();</script>";
    exit;
}

if (!is_numeric($kopos)) {
    echo "<script>alert('Kode Pos harus berupa angka!'); window.history.back();</script>";
    exit;
}

if (strlen($kopos) != 5) {
    echo "<script>alert('Kode Pos harus terdiri dari 5 digit!'); window.history.back();</script>";
    exit;
}

// === Buat Kode Invoice ===
$kode = mysqli_query($conn, "SELECT invoice FROM produksi ORDER BY invoice DESC LIMIT 1");
$data = mysqli_fetch_assoc($kode);
$num  = substr($data['invoice'], 3, 4);
$add  = (int)$num + 1;

if (strlen($add) == 1) {
    $format = "INV000" . $add;
} else if (strlen($add) == 2) {
    $format = "INV00" . $add;
} else if (strlen($add) == 3) {
    $format = "INV0" . $add;
} else {
    $format = "INV" . $add;
}

// === Ambil data dari keranjang ===
$keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd_cs'");
while ($row = mysqli_fetch_assoc($keranjang)) {
    $kd_produk   = $row['kode_produk'];
    $nama_produk = $row['nama_produk'];
    $qty         = $row['qty'];
    $harga       = $row['harga'];
    $status      = "Pesanan Baru";

    mysqli_query($conn, "INSERT INTO produksi 
        VALUES (NULL, '$format', '$kd_cs', '$kd_produk', '$nama_produk', '$qty', '$harga', 
                '$status', '$tanggal', '$prov', '$kota', '$alamat', '$kopos', '0', '0', '0')");
}

// === Hapus isi keranjang ===
$del_keranjang = mysqli_query($conn, "DELETE FROM keranjang WHERE kode_customer = '$kd_cs'");

// === Redirect ke halaman selesai ===
if ($del_keranjang) {
    header("Location: ../selesai.php");
    exit;
} else {
    echo "<script>alert('Terjadi kesalahan saat menghapus keranjang.'); window.history.back();</script>";
}
?>
