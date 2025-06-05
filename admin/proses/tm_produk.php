<?php 
include '../../koneksi/koneksi.php';

// generate kode bom
$kode_query = mysqli_query($conn, "SELECT kode_bom FROM bom_produk ORDER BY kode_bom DESC");
$data = mysqli_fetch_assoc($kode_query);
if (!$data || $data['kode_bom'] == null) {
    $format = "B0001";
} else {
    $num = substr($data['kode_bom'], 1, 4);
    $add = (int) $num + 1;
    if (strlen($add) == 1) {
        $format = "B000" . $add;
    } else if (strlen($add) == 2) {
        $format = "B00" . $add;
    } else if (strlen($add) == 3) {
        $format = "B0" . $add;
    } else {
        $format = "B" . $add;
    }
}

// Ambil data dari form
$kode = $_POST['kode'];
$nm_produk = $_POST['nama'];
$harga = $_POST['harga'];
$desk = $_POST['desk'];

$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$eror = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

// BOM
$kd_material = $_POST['material'];
$keb = $_POST['keb'];

// Validasi input gambar
if ($eror === 4) {
    echo "
    <script>
    alert('TIDAK ADA GAMBAR YANG DIPILIH');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

$ekstensiGambar = ['jpg', 'jpeg', 'png'];
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
    echo "
    <script>
    alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

if ($size_gambar > 1000000) {
    echo "
    <script>
    alert('UKURAN GAMBAR TERLALU BESAR');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

$namaGambarBaru = uniqid() . "." . $ekstensiGambarValid;

// Upload gambar
if (move_uploaded_file($tmp_file, "../../image/produk/" . $namaGambarBaru)) {

    // Escape string untuk mencegah SQL injection
    $kode = mysqli_real_escape_string($conn, $kode);
    $nm_produk = mysqli_real_escape_string($conn, $nm_produk);
    $desk = mysqli_real_escape_string($conn, $desk);
    $harga = (int)$harga; // Cast ke integer untuk keamanan
    
    // Insert produk dengan semua kolom yang diperlukan
    $query_produk = "INSERT INTO produk (kode_produk, nama, image, deskripsi, harga) 
                     VALUES ('$kode', '$nm_produk', '$namaGambarBaru', '$desk', $harga)";
    
    $result = mysqli_query($conn, $query_produk);
    
    if (!$result) {
        echo "
        <script>
        alert('Error menambahkan produk: " . mysqli_error($conn) . "');
        window.location = '../tm_produk.php';
        </script>
        ";
        exit;
    }

    // Insert BOM jika berhasil menambahkan produk
    if (is_array($kd_material) && is_array($keb)) {
        $filter = array_filter($kd_material);
        $jml = count($filter) - 1;
        $no = 0;

        while ($no <= $jml) {
            if (!empty($kd_material[$no]) && !empty($keb[$no])) {
                // Escape data BOM
                $material_code = mysqli_real_escape_string($conn, $kd_material[$no]);
                $kebutuhan = mysqli_real_escape_string($conn, $keb[$no]);
                
                // Get material name from inventory table
                $material_query = mysqli_query($conn, "SELECT nama FROM inventory WHERE kode_bk = '$material_code'");
                $material_data = mysqli_fetch_assoc($material_query);
                $material_name = $material_data ? $material_data['nama'] : '';
                
                $bom_query = "INSERT INTO bom_produk (kode_bom, kode_bk, kode_produk, nama_produk, kebutuhan) 
                             VALUES ('$format', '$material_code', '$kode', '$nm_produk', '$kebutuhan')";
                
                $bom_result = mysqli_query($conn, $bom_query);
                
                if (!$bom_result) {
                    echo "
                    <script>
                    alert('Error BOM pada material $no: " . mysqli_error($conn) . "');
                    </script>
                    ";
                }
            }
            $no++;
        }
    }

    echo "
    <script>
    alert('PRODUK BERHASIL DITAMBAHKAN');
    window.location = '../m_produk.php';
    </script>
    ";

} else {
    echo "
    <script>
    alert('GAGAL MENGUPLOAD GAMBAR');
    window.location = '../tm_produk.php';
    </script>
    ";
}
?>