<?php
include 'header.php';
?>
<!-- Tambahkan CSS AOS di head -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">


<!-- IMAGE -->
<!-- start hero -->
<section class="bg-light" id="hero">
	<div class="container">
		<div class="row position-relative">
			<div class="col-lg-5 col-md-6 offset-lg-1 py-5 order-1 text-start" id="judul">
				<div class="row p-0" data-aos="fade-down" data-aos-offset="50">
					<h2 class="fw-bold">Hello,</h2>
					<h1 class="fw-bold text-warning">Customer</h1>
				</div>
				<div class="col" data-aos="fade-right" data-aos-offset="100">
					<p class="text-dark" id="short">Usaha nasi kuning ini merupakan bisnis kuliner yang menyajikan nasi kuning sebagai menu utama, dilengkapi dengan berbagai lauk pendamping seperti ayam goreng, telur, tempe orek, dan sambal. Makanan ini banyak diminati sebagai sarapan.
					</p>

					<p class="text-dark" id="more" style="display: none;">
						<strong>Naskun</strong> Usaha ini dijalankan oleh sebuah keluarga yang telah berpengalaman dalam menyajikan nasi kuning dengan cita rasa khas. Saat ini, sistem penjualan masih dilakukan secara langsung di lokasi dan melalui pesanan manual. Namun, dengan meningkatnya permintaan, diperlukan solusi digital untuk mempermudah pengelolaan pesanan, pencatatan stok bahan baku, serta memperluas jangkauan pelanggan.
						<code>rasa</code> dan <code>kenikmatan</code> yang dapat
						disesuaikan dengan kebutuhan Anda.
					</p>

					<button id="myBtn" class="btn btn-warning">Read More</button>
				</div>

				<script>
					document.getElementById("myBtn").addEventListener("click", function () {
						var moreText = document.getElementById("more");
						var btnText = document.getElementById("myBtn");

						if (moreText.style.display === "none") {
							moreText.style.display = "block";
							btnText.innerHTML = "Read Less";
						} else {
							moreText.style.display = "none";
							btnText.innerHTML = "Read More";
						}
					});
				</script>
			</div>
			<div class="col-lg-5 col-md-6 order-md-2">
				<img data-aos="zoom-in" data-aos-offset="100" data-aos-delay="200" data-aos-duration="800"
					data-aos-easing="ease-in-out" data-aos-mirror="false" data-aos-once="true"
					data-aos-anchor-placement="top-center" src="image/home/3.png" width="115%"
					class="float-lg-end mx-auto d-block" alt="Responsive image">
			</div>
		</div>
	</div>
</section>


<!-- PRODUK TERBARU -->
<div class="container">


	<h4 class="text-center"
		style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 2px solid #ff8d87; border-bottom: 2px solid #ff8d87;">
		Keunggulan usaha ini adalah banyak peminat dan fleksibel dalam bentuk penjualan (porsi kecil atau catering). Tantangannya meliputi persaingan tinggi dan ketahanan makanan yang terbatas. Jika dikelola dengan baik, keuntungan bisa mencapai 30-50% dari omset. 🚀</h4>


	<!-- Judul Produk Kami dengan animasi fade-up -->
<h2 style="width: 100%; border-bottom: 4px solid #ff8680; margin-top: 80px;"
    data-aos="fade-up"
    data-aos-offset="100"
    data-aos-delay="100"
    data-aos-duration="800"
    data-aos-easing="ease-in-out">
    <b>Produk Kami</b>
</h2>

<div class="row">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM produk");
    $delay = 200; // Variabel untuk delay animasi tiap produk
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-sm-6 col-md-4"
            data-aos="zoom-in"
            data-aos-offset="100"
            data-aos-delay="<?= $delay; ?>"
            data-aos-duration="700"
            data-aos-easing="ease-in-out">
            <div class="thumbnail">
                <img src="image/produk/<?= $row['image']; ?>">
                <div class="caption">
                    <h3><?= $row['nama']; ?></h3>
                    <h4>Rp.<?= number_format($row['harga']); ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>"
                                class="btn btn-warning btn-block">Detail</a>
                        </div>
                        <?php if (isset($_SESSION['kd_cs'])) { ?>
                            <div class="col-md-6">
                                <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1"
                                    class="btn btn-success btn-block" role="button"><i
                                        class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-6">
                                <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i
                                        class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
		}
		?>
	</div>

</div>
<br>
<br>
<br>
<br>
<?php
include 'footer.php';
?>
<!-- Tambahkan JS AOS sebelum </body> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
	 document.addEventListener("DOMContentLoaded", function () {
        AOS.init({
            duration: 800, // Durasi animasi
            once: false // Animasi terus berulang saat scroll
        });
    });
</script>

<!-- CSS untuk memperbaiki overflow -->