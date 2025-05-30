<?php 
// Aktifkan error reporting (sangat penting saat debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi
include '../koneksi/koneksi.php';

// Ambil parameter
$hal = $_GET['hal'];
$kode_cs = $_GET['kd_cs'];
$kode_produk = $_GET['produk'];
$qty = isset($_GET['jml']) ? $_GET['jml'] : 1; // Default qty = 1 jika tidak dikirim

// Ambil detail produk
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
$row = mysqli_fetch_assoc($result);

$nama_produk = $row['nama'];
$kd = $row['kode_produk'];
$harga = $row['harga'];

// Cek apakah produk sudah ada di keranjang
$cek = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_produk = '$kode_produk' AND kode_customer = '$kode_cs'");
$jml = mysqli_num_rows($cek);
$row1 = mysqli_fetch_assoc($cek);

if ($hal == 1) {
    if ($jml > 0) {
        // Jika sudah ada, tambahkan qty +1
        $set = $row1['qty'] + 1;
        $update = mysqli_query($conn, "UPDATE keranjang SET qty = '$set' WHERE kode_produk = '$kode_produk' AND kode_customer = '$kode_cs'");
        if ($update) {
            echo "
            <script>
                alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                window.location = '../keranjang.php';
            </script>";
            die;
        }
    } else {
        // Jika belum ada, insert baru dengan qty 1
        $insert = mysqli_query($conn, "INSERT INTO keranjang (kode_customer, kode_produk, nama_produk, qty, harga) VALUES ('$kode_cs', '$kd', '$nama_produk', '1', '$harga')");
        if ($insert) {
            echo "
            <script>
                alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                window.location = '../keranjang.php';
            </script>";
            die;
        }
    }
} else {
    if ($jml > 0) {
        // Jika sudah ada, tambahkan qty dengan jumlah dari $_GET['jml']
        $set = $row1['qty'] + $qty;
        $update = mysqli_query($conn, "UPDATE keranjang SET qty = '$set' WHERE kode_produk = '$kode_produk' AND kode_customer = '$kode_cs'");
        if ($update) {
            echo "
            <script>
                alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                window.location = '../detail_produk.php?produk=$kode_produk';
            </script>";
            die;
        }
    } else {
        // Jika belum ada, insert baru dengan qty dari $_GET['jml']
        $insert = mysqli_query($conn, "INSERT INTO keranjang (kode_customer, kode_produk, nama_produk, qty, harga) VALUES ('$kode_cs', '$kd', '$nama_produk', '$qty', '$harga')");
        if ($insert) {
            echo "
            <script>
                alert('BERHASIL DITAMBAHKAN KE KERANJANG');
                window.location = '../detail_produk.php?produk=$kode_produk';
            </script>";
            die;
        }
    }
}
?>
