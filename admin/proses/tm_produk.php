<?php 
include '../../koneksi/koneksi.php';

// Error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function untuk log error
function logError($message) {
    error_log(date('[Y-m-d H:i:s] ') . $message . PHP_EOL, 3, 'upload_errors.log');
}

try {
    // generate kode bom
    $kode_query = mysqli_query($conn, "SELECT kode_bom FROM bom_produk ORDER BY kode_bom DESC LIMIT 1");
    
    if (!$kode_query) {
        throw new Exception("Error query kode BOM: " . mysqli_error($conn));
    }
    
    $data = mysqli_fetch_assoc($kode_query);
    if (!$data || empty($data['kode_bom'])) {
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

    // Validasi POST data
    if (!isset($_POST['kode']) || !isset($_POST['nama']) || !isset($_POST['harga']) || !isset($_POST['desk'])) {
        throw new Exception("Data form tidak lengkap");
    }

    // Ambil data dari form
    $kode = trim($_POST['kode']);
    $nm_produk = trim($_POST['nama']);
    $harga = $_POST['harga'];
    $desk = trim($_POST['desk']);

    // Validasi data kosong
    if (empty($kode) || empty($nm_produk) || empty($harga)) {
        throw new Exception("Kode produk, nama produk, dan harga harus diisi");
    }

    // Validasi harga
    if (!is_numeric($harga) || $harga < 0) {
        throw new Exception("Harga harus berupa angka positif");
    }

    // Validasi file upload
    if (!isset($_FILES['files']) || $_FILES['files']['error'] === UPLOAD_ERR_NO_FILE) {
        echo "
        <script>
        alert('TIDAK ADA GAMBAR YANG DIPILIH');
        window.location = '../tm_produk.php';
        </script>
        ";
        exit;
    }

    $nama_gambar = $_FILES['files']['name'];
    $size_gambar = $_FILES['files']['size'];
    $tmp_file = $_FILES['files']['tmp_name'];
    $eror = $_FILES['files']['error'];
    $type = $_FILES['files']['type'];

    // BOM data
    $kd_material = isset($_POST['material']) ? $_POST['material'] : [];
    $keb = isset($_POST['keb']) ? $_POST['keb'] : [];

    // Cek error upload
    if ($eror !== UPLOAD_ERR_OK) {
        $upload_errors = array(
            UPLOAD_ERR_INI_SIZE => 'File terlalu besar (PHP ini setting)',
            UPLOAD_ERR_FORM_SIZE => 'File terlalu besar (form setting)',
            UPLOAD_ERR_PARTIAL => 'File hanya terupload sebagian',
            UPLOAD_ERR_NO_FILE => 'Tidak ada file yang diupload',
            UPLOAD_ERR_NO_TMP_DIR => 'Folder temporary tidak ditemukan',
            UPLOAD_ERR_CANT_WRITE => 'Gagal menulis file ke disk',
            UPLOAD_ERR_EXTENSION => 'Upload dihentikan oleh ekstensi PHP'
        );
        
        $error_message = isset($upload_errors[$eror]) ? $upload_errors[$eror] : 'Error upload tidak diketahui';
        throw new Exception("Error upload file: " . $error_message);
    }

    // Validasi ekstensi gambar
    $ekstensiGambar = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ekstensiGambarValid = explode(".", strtolower($nama_gambar));
    $ekstensiGambarValid = end($ekstensiGambarValid);

    if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
        echo "
        <script>
        alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG, GIF, atau WEBP');
        window.location = '../tm_produk.php';
        </script>
        ";
        exit;
    }

    // Validasi ukuran file (2MB)
    $max_size = 2 * 1024 * 1024; // 2MB
    if ($size_gambar > $max_size) {
        echo "
        <script>
        alert('UKURAN GAMBAR TERLALU BESAR. Maksimal 2MB');
        window.location = '../tm_produk.php';
        </script>
        ";
        exit;
    }

    // Validasi MIME type
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($type, $allowed_types)) {
        throw new Exception("Tipe file tidak diizinkan: " . $type);
    }

    // Cek apakah file benar-benar gambar dengan getimagesize
    $image_info = getimagesize($tmp_file);
    if ($image_info === false) {
        throw new Exception("File bukan gambar yang valid");
    }

    // Cek kode produk duplikat
    $check_kode = mysqli_query($conn, "SELECT kode_produk FROM produk WHERE kode_produk = '" . mysqli_real_escape_string($conn, $kode) . "'");
    if (mysqli_num_rows($check_kode) > 0) {
        echo "
        <script>
        alert('KODE PRODUK SUDAH ADA. Gunakan kode yang berbeda');
        window.location = '../tm_produk.php';
        </script>
        ";
        exit;
    }

    // Konversi gambar ke Base64
    $imageData = file_get_contents($tmp_file);
    if ($imageData === false) {
        throw new Exception("Gagal membaca file gambar");
    }

    $base64Image = base64_encode($imageData);
    $imageSrc = 'data:' . $type . ';base64,' . $base64Image;

    // Start transaction
    mysqli_autocommit($conn, FALSE);

    // Escape string untuk mencegah SQL injection
    $kode = mysqli_real_escape_string($conn, $kode);
    $nm_produk = mysqli_real_escape_string($conn, $nm_produk);
    $desk = mysqli_real_escape_string($conn, $desk);
    $harga = (float)$harga; // Cast ke float untuk decimal
    $imageSrc = mysqli_real_escape_string($conn, $imageSrc);

    // Insert produk dengan gambar Base64
    $query_produk = "INSERT INTO produk (kode_produk, nama, image, deskripsi, harga) 
                     VALUES ('$kode', '$nm_produk', '$imageSrc', '$desk', $harga)";

    $result = mysqli_query($conn, $query_produk);

    if (!$result) {
        throw new Exception("Error menambahkan produk: " . mysqli_error($conn));
    }

    // Insert BOM jika ada data material
    if (is_array($kd_material) && is_array($keb) && count($kd_material) > 0) {
        // Filter array kosong
        $kd_material = array_filter($kd_material, function($value) {
            return !empty(trim($value));
        });
        
        $keb = array_filter($keb, function($value) {
            return !empty(trim($value)) && is_numeric($value);
        });

        // Pastikan jumlah material dan kebutuhan sama
        if (count($kd_material) === count($keb)) {
            $material_keys = array_keys($kd_material);
            
            foreach ($material_keys as $key) {
                if (isset($kd_material[$key]) && isset($keb[$key])) {
                    $material_code = mysqli_real_escape_string($conn, trim($kd_material[$key]));
                    $kebutuhan = (float)$keb[$key];
                    
                    // Validasi kebutuhan harus positif
                    if ($kebutuhan <= 0) {
                        throw new Exception("Kebutuhan material harus lebih dari 0");
                    }
                    
                    // Cek apakah material ada di inventory
                    $material_check = mysqli_query($conn, "SELECT nama FROM inventory WHERE kode_bk = '$material_code'");
                    if (mysqli_num_rows($material_check) == 0) {
                        throw new Exception("Material dengan kode '$material_code' tidak ditemukan di inventory");
                    }
                    
                    $bom_query = "INSERT INTO bom_produk (kode_bom, kode_bk, kode_produk, nama_produk, kebutuhan) 
                                 VALUES ('$format', '$material_code', '$kode', '$nm_produk', $kebutuhan)";
                    
                    $bom_result = mysqli_query($conn, $bom_query);
                    
                    if (!$bom_result) {
                        throw new Exception("Error BOM pada material '$material_code': " . mysqli_error($conn));
                    }
                }
            }
        }
    }

    // Commit transaction
    mysqli_commit($conn);
    mysqli_autocommit($conn, TRUE);

    echo "
    <script>
    alert('PRODUK BERHASIL DITAMBAHKAN');
    window.location = '../m_produk.php';
    </script>
    ";

} catch (Exception $e) {
    // Rollback transaction jika ada error
    mysqli_rollback($conn);
    mysqli_autocommit($conn, TRUE);
    
    // Log error
    logError("Error upload produk: " . $e->getMessage());
    
    echo "
    <script>
    alert('ERROR: " . addslashes($e->getMessage()) . "');
    window.location = '../tm_produk.php';
    </script>
    ";
} catch (Error $e) {
    // Handle fatal errors
    mysqli_rollback($conn);
    mysqli_autocommit($conn, TRUE);
    
    logError("Fatal error upload produk: " . $e->getMessage());
    
    echo "
    <script>
    alert('TERJADI KESALAHAN SISTEM. Silakan coba lagi.');
    window.location = '../tm_produk.php';
    </script>
    ";
}
?>