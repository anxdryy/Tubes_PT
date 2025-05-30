<?php 
include '../koneksi/koneksi.php';
$kode = mysqli_query($conn, "SELECT kode_customer from customer order by kode_customer desc");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['kode_customer'], 1, 4);
$add = (int) $num + 1;
if(strlen($add) == 1){
	$format = "C000".$add;
}else if(strlen($add) == 2){
	$format = "C00".$add;
}
else if(strlen($add) == 3){
	$format = "C0".$add;
}else{
	$format = "C".$add;
}

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$tlp = $_POST['telp'];
$konfirmasi = $_POST['konfirmasi'];



$hash = password_hash($password, PASSWORD_DEFAULT);

if($password == $konfirmasi){
	$cek = mysqli_query($conn, "SELECT username from customer where username = '$username'");;
	$jml = mysqli_num_rows($cek);

	if($jml == 1){
		echo "
		<script>
		alert('USERNAME SUDAH DIGUNAKAN');
		window.location = '../register.php';
		</script>
		";
		die;
	}

	// Validasi email harus format @gmail.com lengkap
if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)) {
	echo "
	<script>
	alert('Email harus menggunakan domain @gmail.com secara lengkap');
	window.location = '../register.php';
	</script>
	";
	exit;
}

// Validasi nomor telepon hanya angka
if (!is_numeric($tlp)) {
	echo "
	<script>
	alert('Nomor telepon hanya boleh angka');
	window.location = '../register.php';
	</script>
	";
	exit;
}

	// Validasi password kuat
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
	echo "
	<script>
	alert('Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka');
	window.location = '../register.php';
	</script>
	";
	exit;
}

	$result = mysqli_query($conn, "INSERT INTO customer VALUES('$format','$nama', '$email', '$username', '$hash', '$tlp')");
	if($result){
		echo "
		<script>
		alert('REGISTER BERHASIL');
		window.location = '../user_login.php';
		</script>
		";
	}

}else{
	echo "
	<script>
	alert('KONFIRMASI PASSWORD TIDAK SAMA');
	window.location = '../register.php';
	</script>
	";
}


?>