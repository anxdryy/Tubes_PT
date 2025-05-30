<?php
include 'header.php';
?>
<!-- Enhanced CSS dan Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-color: #FFD700;
        --secondary-color: #FF8D00;
        --accent-color: #FF6B35;
        --dark-color: #2C3E50;
        --light-color: #F8F9FA;
        --gradient-1: linear-gradient(135deg, #FFD700 0%, #FF8D00 100%);
        --gradient-2: linear-gradient(135deg, #FF8D00 0%, #FF6B35 100%);
        --shadow: 0 10px 30px rgba(0,0,0,0.1);
        --shadow-hover: 0 15px 40px rgba(0,0,0,0.2);
    }

    body {
        font-family: 'Poppins', sans-serif !important;
        line-height: 1.6;
        color: var(--dark-color);
        background: #fff;
    }

    /* Hero Section Enhancement */
    #hero {
        background: linear-gradient(135deg, #FFD700 0%, #FF8D00 50%, #FF6B35 100%);
        position: relative;
        overflow: hidden;
        min-height: 100vh;
    }

    #hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    #hero .container {
        position: relative;
        z-index: 2;
    }

    #judul h2, #judul h1 {
        color: white;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        font-family: 'Poppins', sans-serif;
    }

    #judul h2 {
        font-size: 3rem;
        font-weight: 600;
        margin-bottom: 0;
    }

    #judul h1 {
        font-size: 4rem;
        font-weight: 800;
        color: #FFE55C !important;
        margin-top: 0;
    }

    #hero p {
        color: rgba(255,255,255,0.9) !important;
        font-size: 1.1rem;
        background: rgba(255,255,255,0.1);
        padding: 20px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        margin-bottom: 20px;
    }

    /* Fixed Read More styling */
    #hero #more {
        background: rgba(255,255,255,0.15) !important;
        border-left: 4px solid #FFE55C;
        color: rgba(255,255,255,0.9) !important; /* Pastikan teks terlihat */
        display: none; /* Hidden by default */
        opacity: 1; /* Pastikan opacity 1 */
    }

    #hero code {
        background: rgba(255,255,255,0.2);
        color: #FFE55C;
        padding: 2px 6px;
        border-radius: 4px;
        font-weight: 600;
    }

    #myBtn {
        background: var(--gradient-2) !important;
        border: 2px solid transparent;
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 50px;
        color: white !important;
        transition: all 0.3s ease;
        box-shadow: var(--shadow);
        text-transform: none;
    }

    #myBtn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
        background: var(--gradient-1) !important;
    }

    #hero img {
        filter: drop-shadow(20px 20px 40px rgba(0,0,0,0.3));
        transition: transform 0.3s ease;
    }

    #hero img:hover {
        transform: scale(1.05);
    }

    /* Floating Elements */
    .floating-decoration {
        position: absolute;
        opacity: 0.1;
        color: white;
        animation: float 6s ease-in-out infinite;
        pointer-events: none;
    }

    .floating-decoration:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; font-size: 3rem; }
    .floating-decoration:nth-child(2) { top: 60%; right: 15%; animation-delay: 2s; font-size: 2rem; }
    .floating-decoration:nth-child(3) { bottom: 30%; left: 20%; animation-delay: 4s; font-size: 2.5rem; }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    /* Enhanced Section Styling */
    .container h4 {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        border: none !important;
        border-radius: 20px;
        padding: 30px;
        box-shadow: var(--shadow);
        color: var(--dark-color) !important;
        font-weight: 600;
        position: relative;
        overflow: hidden;
    }

    .container h4::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
    }

    .container h4::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
    }

    /* Products Section Enhancement */
    .container h2 {
        font-size: 3rem !important;
        font-weight: 700;
        text-align: center;
        margin-bottom: 60px !important;
        position: relative;
        color: var(--dark-color);
        font-family: 'Poppins', sans-serif;
    }

    .container h2::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: var(--gradient-1);
        border-radius: 2px;
    }

    /* Enhanced Thumbnail Cards */
    .thumbnail {
        background: white;
        border-radius: 20px !important;
        overflow: hidden;
        box-shadow: var(--shadow) !important;
        transition: all 0.3s ease;
        border: none !important;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .thumbnail:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hover) !important;
    }

    .thumbnail img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .thumbnail:hover img {
        transform: scale(1.1);
    }

    .caption {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .caption h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark-color);
        font-family: 'Poppins', sans-serif;
    }

    .caption h4 {
        font-size: 1.5rem !important;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 20px !important;
        padding: 0 !important;
        background: none !important;
        box-shadow: none !important;
        border-radius: 0 !important;
    }

    .caption h4::before,
    .caption h4::after {
        display: none;
    }

    .caption .row {
        margin-top: auto;
    }

    /* Enhanced Buttons */
    .btn-warning {
        background: transparent !important;
        color: var(--secondary-color) !important;
        border: 2px solid var(--secondary-color) !important;
        font-weight: 600;
        border-radius: 50px !important;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        background: var(--secondary-color) !important;
        color: white !important;
        transform: translateY(-2px);
    }

    .btn-success {
        background: var(--gradient-1) !important;
        border: none !important;
        font-weight: 600;
        border-radius: 50px !important;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background: var(--gradient-2) !important;
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }

    /* Stats Section */
    .stats-section {
        background: var(--gradient-1);
        padding: 80px 0;
        margin: 80px 0;
        border-radius: 0;
        color: white;
    }

    .stat-item {
        text-align: center;
        padding: 20px;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 10px;
        font-family: 'Poppins', sans-serif;
    }

    .stat-label {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        #judul h2 {
            font-size: 2rem;
        }
        
        #judul h1 {
            font-size: 2.5rem;
        }
        
        .container h2 {
            font-size: 2rem !important;
        }
        
        #hero {
            padding: 50px 0;
        }
    }

    /* Loading Animation */
    .loading-animation {
        opacity: 0;
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- IMAGE -->
<!-- start hero -->
<section class="bg-light" id="hero">
    <!-- Floating Decorations -->
    <div class="floating-decoration"><i class="fas fa-leaf"></i></div>
    <div class="floating-decoration"><i class="fas fa-star"></i></div>
    <div class="floating-decoration"><i class="fas fa-heart"></i></div>
    
	<div class="container">
		<div class="row position-relative">
			<div class="col-lg-5 col-md-6 offset-lg-1 py-5 order-1 text-start" id="judul">
				<div class="row p-0" data-aos="fade-down" data-aos-offset="50">
					<h2 class="fw-bold">Hello,</h2>
					<h1 class="fw-bold text-warning">Customer</h1>
				</div>
				<div class="col" data-aos="fade-right" data-aos-offset="100">
					<p id="short">Usaha nasi kuning ini merupakan bisnis kuliner yang menyajikan nasi kuning sebagai menu utama, dilengkapi dengan berbagai lauk pendamping seperti ayam goreng, telur, tempe orek, dan sambal. Makanan ini banyak diminati sebagai sarapan.
					</p>

					<p id="more" style="display: none;">
						<strong>Naskun</strong> - Usaha ini dijalankan oleh sebuah keluarga yang telah berpengalaman dalam menyajikan nasi kuning dengan cita rasa khas. Saat ini, sistem penjualan masih dilakukan secara langsung di lokasi dan melalui pesanan manual. Namun, dengan meningkatnya permintaan, diperlukan solusi digital untuk mempermudah pengelolaan pesanan, pencatatan stok bahan baku, serta memperluas jangkauan pelanggan.
						<br><br>
						Dengan <code>rasa</code> dan <code>kenikmatan</code> yang dapat disesuaikan dengan kebutuhan Anda, kami berkomitmen memberikan pengalaman kuliner terbaik untuk setiap pelanggan.
					</p>

					<button id="myBtn" class="btn btn-warning">
                        <i class="fas fa-info-circle me-2"></i>Read More
                    </button>
				</div>
			</div>
			<div class="col-lg-5 col-md-6 order-md-2">
				<img data-aos="zoom-in" data-aos-offset="100" data-aos-delay="200" data-aos-duration="800"
					data-aos-easing="ease-in-out" data-aos-mirror="false" data-aos-once="true"
					data-aos-anchor-placement="top-center" src="image/home/foto.png" width="115%"
					class="float-lg-end mx-auto d-block" alt="Responsive image">
			</div>
		</div>
	</div>
</section>

<!-- Enhanced Stats Section -->
<div class="stats-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-label">Pelanggan Puas</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">Keuntungan (%)</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-number" data-count="12">0</div>
                    <div class="stat-label">Jam Buka</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-item">
                    <div class="stat-number" data-count="4">0</div>
                    <div class="stat-label">Varian Menu</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PRODUK TERBARU -->
<div class="container">
	<h4 class="text-center"
		style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px;"
        data-aos="fade-up" data-aos-delay="100">
		Keunggulan usaha ini adalah banyak peminat dan fleksibel dalam bentuk penjualan (porsi kecil atau catering). Tantangannya meliputi persaingan tinggi dan ketahanan makanan yang terbatas. Jika dikelola dengan baik, keuntungan bisa mencapai 30-50% dari omset. 🚀</h4>

	<!-- Judul Produk Kami dengan animasi fade-up -->
<h2 style="width: 100%; margin-top: 80px;"
    data-aos="fade-up"
    data-aos-offset="100"
    data-aos-delay="100"
    data-aos-duration="800"
    data-aos-easing="ease-in-out">
    <b>Produk Kami</b>
</h2>

<div class="row">
    <?php
    // Sample products data untuk demo
    $sample_products = [
        [
            'kode_produk' => 'NK001',
            'nama' => 'Nasi Kuning Spesial',
            'harga' => 15000,
            'image' => 'nasi-kuning-1.jpg'
        ],
        [
            'kode_produk' => 'NK002',
            'nama' => 'Nasi Kuning Ayam',
            'harga' => 18000,
            'image' => 'nasi-kuning-2.jpg'
        ],
        [
            'kode_produk' => 'NK003',
            'nama' => 'Nasi Kuning Komplit',
            'harga' => 22000,
            'image' => 'nasi-kuning-3.jpg'
        ]
    ];
    
    // Gunakan data dari database jika tersedia, jika tidak gunakan sample data
    if (isset($conn)) {
        $result = mysqli_query($conn, "SELECT * FROM produk");
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        if (empty($products)) {
            $products = $sample_products;
        }
    } else {
        $products = $sample_products;
    }
    
    $delay = 200;
    foreach ($products as $row) {
        ?>
        <div class="col-sm-6 col-md-4 mb-4"
            data-aos="zoom-in"
            data-aos-offset="100"
            data-aos-delay="<?= $delay; ?>"
            data-aos-duration="700"
            data-aos-easing="ease-in-out">
            <div class="thumbnail">
                <img src="image/produk/<?= $row['image']; ?>" alt="<?= $row['nama']; ?>">
                <div class="caption">
                    <h3><?= $row['nama']; ?></h3>
                    <h4>Rp.<?= number_format($row['harga']); ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>"
                                class="btn btn-warning btn-block">
                                <i class="fas fa-eye me-1"></i>Detail
                            </a>
                        </div>
                        <?php if (isset($_SESSION['kd_cs'])) { ?>
                            <div class="col-md-6">
                                <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1"
                                    class="btn btn-success btn-block" role="button">
                                    <i class="fas fa-shopping-cart me-1"></i> Tambah
                                </a>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-6">
                                <a href="keranjang.php" class="btn btn-success btn-block" role="button">
                                    <i class="fas fa-shopping-cart me-1"></i> Tambah
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
		<?php
        $delay += 100;
		}
		?>
	</div>
</div>

<br><br><br><br>

<?php
include 'footer.php';
?>

<!-- Enhanced JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS with enhanced settings
    document.addEventListener("DOMContentLoaded", function () {
        AOS.init({
            duration: 800,
            once: false,
            offset: 100,
            easing: 'ease-in-out'
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const increment = target / 100;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    counter.textContent = Math.floor(current);
                    
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    }
                }, 20);
            });
        }

        // Trigger counter animation when stats section is visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Add loading animation to product cards
        const productCards = document.querySelectorAll('.thumbnail');
        productCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('loading-animation');
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroImg = document.querySelector('#hero img');
            if (heroImg) {
                heroImg.style.transform = `translateY(${scrolled * 0.1}px)`;
            }
        });
    });

    // Fixed Read More functionality
    document.getElementById("myBtn").addEventListener("click", function () {
        const moreText = document.getElementById("more");
        const btnText = document.getElementById("myBtn");

        if (moreText.style.display === "none" || !moreText.style.display) {
            // Show more text
            moreText.style.display = "block";
            moreText.style.opacity = "0";
            moreText.style.transform = "translateY(10px)";
            
            // Animate in
            setTimeout(() => {
                moreText.style.transition = "all 0.4s ease";
                moreText.style.opacity = "1";
                moreText.style.transform = "translateY(0)";
            }, 10);
            
            btnText.innerHTML = '<i class="fas fa-times me-2"></i>Read Less';
        } else {
            // Hide more text
            moreText.style.transition = "all 0.4s ease";
            moreText.style.opacity = "0";
            moreText.style.transform = "translateY(-10px)";
            
            setTimeout(() => {
                moreText.style.display = "none";
            }, 400);
            
            btnText.innerHTML = '<i class="fas fa-info-circle me-2"></i>Read More';
        }
    });
</script>