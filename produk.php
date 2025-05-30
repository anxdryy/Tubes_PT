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
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    /* Page Header */
    .page-header {
        background: var(--gradient-1);
        color: white;
        padding: 100px 0 60px;
        margin-bottom: 60px;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .page-header .container {
        position: relative;
        z-index: 2;
    }

    .page-title {
        font-size: 3.5rem;
        font-weight: 800;
        text-align: center;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .page-subtitle {
        font-size: 1.2rem;
        text-align: center;
        margin-top: 20px;
        opacity: 0.9;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Breadcrumb */
    .breadcrumb-container {
        background: white;
        padding: 20px 0;
        box-shadow: var(--shadow);
        margin-bottom: 40px;
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin: 0;
        font-weight: 500;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "→";
        color: var(--secondary-color);
        font-weight: bold;
    }

    .breadcrumb-item.active {
        color: var(--secondary-color);
        font-weight: 600;
    }

    /* Filter & Search Section */
    .filter-section {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: var(--shadow);
        margin-bottom: 40px;
    }

    .search-box {
        position: relative;
    }

    .search-input {
        border: 2px solid #e9ecef;
        border-radius: 50px;
        padding: 15px 50px 15px 20px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .search-input:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 0.2rem rgba(255, 141, 0, 0.25);
        background: white;
    }

    .search-btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--gradient-1);
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    /* Product Grid Enhancement */
    .products-container {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: var(--shadow);
        margin-bottom: 60px;
    }

    .container h2 {
        font-size: 2.5rem !important;
        font-weight: 700;
        text-align: center;
        margin-bottom: 50px !important;
        position: relative;
        color: var(--dark-color);
        font-family: 'Poppins', sans-serif;
        border: none !important;
        margin-top: 0 !important;
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

    /* Enhanced Product Cards */
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
        position: relative;
    }

    .thumbnail:hover {
        transform: translateY(-15px);
        box-shadow: var(--shadow-hover) !important;
    }

    .thumbnail::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-1);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
        pointer-events: none;
    }

    .thumbnail:hover::before {
        opacity: 0.1;
    }

    .thumbnail img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: transform 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .thumbnail:hover img {
        transform: scale(1.1);
    }

    .caption {
        padding: 30px 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 3;
        background: white;
    }

    .caption h3 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--dark-color);
        font-family: 'Poppins', sans-serif;
        line-height: 1.3;
    }

    .caption h4 {
        font-size: 1.8rem !important;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 25px !important;
        padding: 0 !important;
        background: none !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        border: none !important;
    }

    .caption .row {
        margin-top: auto;
        gap: 10px;
    }

    /* Enhanced Buttons */
    .btn-warning {
        background: transparent !important;
        color: var(--secondary-color) !important;
        border: 2px solid var(--secondary-color) !important;
        font-weight: 600;
        border-radius: 50px !important;
        padding: 12px 20px;
        transition: all 0.3s ease;
        text-transform: none;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-warning:hover {
        background: var(--secondary-color) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 141, 0, 0.4);
    }

    .btn-success {
        background: var(--gradient-1) !important;
        border: none !important;
        font-weight: 600;
        border-radius: 50px !important;
        padding: 12px 20px;
        transition: all 0.3s ease;
        text-transform: none;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-success:hover {
        background: var(--gradient-2) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
    }

    /* Product Badge */
    .product-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--gradient-2);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 4;
        opacity: 0;
        transform: translateY(-10px);
        transition: all 0.3s ease;
    }

    .thumbnail:hover .product-badge {
        opacity: 1;
        transform: translateY(0);
    }

    /* Product Count Info */
    .product-info-bar {
        background: white;
        padding: 20px 30px;
        border-radius: 15px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .product-count {
        font-weight: 600;
        color: var(--dark-color);
        font-size: 1.1rem;
    }

    .view-toggle {
        display: flex;
        gap: 10px;
    }

    .view-btn {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 10px 15px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .view-btn.active,
    .view-btn:hover {
        background: var(--gradient-1);
        border-color: var(--secondary-color);
        color: white;
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

    /* Floating Action Button */
    .fab {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        background: var(--gradient-1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-hover);
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 1000;
        color: white;
        font-size: 1.5rem;
    }

    .fab:hover {
        transform: scale(1.1);
        background: var(--gradient-2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-title {
            font-size: 2.5rem;
        }
        
        .container h2 {
            font-size: 2rem !important;
        }
        
        .products-container {
            padding: 20px;
        }
        
        .filter-section {
            padding: 20px;
        }
        
        .product-info-bar {
            padding: 15px 20px;
        }
        
        .fab {
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
        }
    }

    /* Shimmer Loading Effect */
    .shimmer {
        animation: shimmer 2s infinite linear;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }
</style>

<!-- Page Header -->
<div class="page-header" data-aos="fade-down">
    <div class="container">
        <h1 class="page-title">Produk Kami</h1>
        <p class="page-subtitle">Temukan berbagai pilihan nasi kuning dengan cita rasa autentik dan kualitas terbaik</p>
    </div>
</div>



<!-- Filter & Search Section -->
<div class="container">
    <div class="filter-section" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="search-box">
                    <input type="text" class="form-control search-input" placeholder="Cari produk favorit Anda..." id="searchProduct">
                    <button class="search-btn" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end justify-content-start mt-3 mt-md-0">
                    <select class="form-select" style="max-width: 200px; border-radius: 50px;" id="sortProduct">
                        <option value="default">Urutkan Produk</option>
                        <option value="name-asc">Nama A-Z</option>
                        <option value="name-desc">Nama Z-A</option>
                        <option value="price-asc">Harga Terendah</option>
                        <option value="price-desc">Harga Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Info Bar -->
    <div class="product-info-bar" data-aos="fade-up" data-aos-delay="200">
        <div class="product-count">
            <i class="fas fa-boxes me-2"></i>
            <span id="productCount">Menampilkan semua produk</span>
        </div>
        <div class="view-toggle">
            <button class="view-btn active" data-view="grid">
                <i class="fas fa-th"></i>
            </button>
            <button class="view-btn" data-view="list">
                <i class="fas fa-list"></i>
            </button>
        </div>
    </div>
</div>

<!-- PRODUK TERBARU -->
<div class="container">
    <div class="products-container">
        <!-- Judul Produk Kami dengan animasi fade-up -->
        <h2 data-aos="fade-up" data-aos-offset="100" data-aos-delay="100" data-aos-duration="800" data-aos-easing="ease-in-out">
            <b>Koleksi Produk Terbaik</b>
        </h2>

        <div class="row" id="productGrid">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM produk");
            $delay = 200; // Variabel untuk delay animasi tiap produk
            $product_count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_count++;
                ?>
                <div class="col-sm-6 col-md-4 mb-4 product-item loading-animation"
                    data-aos="zoom-in"
                    data-aos-offset="100"
                    data-aos-delay="<?= $delay; ?>"
                    data-aos-duration="700"
                    data-aos-easing="ease-in-out"
                    data-name="<?= strtolower($row['nama']); ?>"
                    data-price="<?= $row['harga']; ?>">
                    <div class="thumbnail">
                        <div class="product-badge">Populer</div>
                        <img src="image/produk/<?= $row['image']; ?>" alt="<?= $row['nama']; ?>">
                        <div class="caption">
                            <h3><?= $row['nama']; ?></h3>
                            <h4>Rp.<?= number_format($row['harga']); ?></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>"
                                        class="btn btn-warning btn-block">
                                        <i class="fas fa-eye"></i>Detail
                                    </a>
                                </div>
                                <?php if (isset($_SESSION['kd_cs'])) { ?>
                                    <div class="col-md-6">
                                        <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1"
                                            class="btn btn-success btn-block" role="button">
                                            <i class="fas fa-shopping-cart"></i> Tambah
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-6">
                                        <a href="keranjang.php" class="btn btn-success btn-block" role="button">
                                            <i class="fas fa-shopping-cart"></i> Tambah
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $delay += 100; // Increment delay untuk animasi selanjutnya
            }
            ?>
        </div>

        <!-- No Products Found Message -->
        <div id="noProductsMessage" style="display: none;" class="text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Produk tidak ditemukan</h4>
            <p class="text-muted">Coba ubah kata kunci pencarian Anda</p>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<div class="fab" onclick="scrollToTop()" title="Kembali ke atas">
    <i class="fas fa-arrow-up"></i>
</div>

<?php 
    include 'footer.php';
?>

<!-- Enhanced JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS
    document.addEventListener("DOMContentLoaded", function () {
        AOS.init({
            duration: 800,
            once: false,
            offset: 100,
            easing: 'ease-in-out'
        });

        // Update product count
        updateProductCount();

        // Search functionality
        const searchInput = document.getElementById('searchProduct');
        const sortSelect = document.getElementById('sortProduct');
        
        searchInput.addEventListener('input', filterProducts);
        sortSelect.addEventListener('change', sortProducts);

        // View toggle functionality
        const viewButtons = document.querySelectorAll('.view-btn');
        viewButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                viewButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const view = this.getAttribute('data-view');
                toggleView(view);
            });
        });

        // Add loading animation delay to product cards
        const productCards = document.querySelectorAll('.product-item');
        productCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });

        // Smooth scroll for FAB
        window.addEventListener('scroll', function() {
            const fab = document.querySelector('.fab');
            if (window.scrollY > 300) {
                fab.style.opacity = '1';
                fab.style.transform = 'scale(1)';
            } else {
                fab.style.opacity = '0';
                fab.style.transform = 'scale(0.8)';
            }
        });
    });

    // Filter products function
    function filterProducts() {
        const searchTerm = document.getElementById('searchProduct').value.toLowerCase();
        const products = document.querySelectorAll('.product-item');
        let visibleCount = 0;

        products.forEach(product => {
            const productName = product.getAttribute('data-name');
            if (productName.includes(searchTerm)) {
                product.style.display = 'block';
                visibleCount++;
            } else {
                product.style.display = 'none';
            }
        });

        updateProductCount(visibleCount);
        toggleNoProductsMessage(visibleCount === 0);
    }

    // Sort products function
    function sortProducts() {
        const sortValue = document.getElementById('sortProduct').value;
        const productGrid = document.getElementById('productGrid');
        const products = Array.from(document.querySelectorAll('.product-item'));

        products.sort((a, b) => {
            switch (sortValue) {
                case 'name-asc':
                    return a.getAttribute('data-name').localeCompare(b.getAttribute('data-name'));
                case 'name-desc':
                    return b.getAttribute('data-name').localeCompare(a.getAttribute('data-name'));
                case 'price-asc':
                    return parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price'));
                case 'price-desc':
                    return parseInt(b.getAttribute('data-price')) - parseInt(a.getAttribute('data-price'));
                default:
                    return 0;
            }
        });

        // Re-append sorted products
        products.forEach(product => {
            productGrid.appendChild(product);
        });

        // Re-trigger AOS animations
        AOS.refresh();
    }

    // Toggle view function
    function toggleView(view) {
        const productGrid = document.getElementById('productGrid');
        const products = document.querySelectorAll('.product-item');

        if (view === 'list') {
            productGrid.classList.add('list-view');
            products.forEach(product => {
                product.classList.remove('col-md-4');
                product.classList.add('col-12');
            });
        } else {
            productGrid.classList.remove('list-view');
            products.forEach(product => {
                product.classList.remove('col-12');
                product.classList.add('col-md-4');
            });
        }
    }

    // Update product count
    function updateProductCount(count = null) {
        const productCountElement = document.getElementById('productCount');
        const totalProducts = document.querySelectorAll('.product-item').length;
        
        if (count === null) {
            productCountElement.textContent = `Menampilkan ${totalProducts} produk`;
        } else {
            productCountElement.textContent = `Menampilkan ${count} dari ${totalProducts} produk`;
        }
    }

    // Toggle no products message
    function toggleNoProductsMessage(show) {
        const message = document.getElementById('noProductsMessage');
        message.style.display = show ? 'block' : 'none';
    }

    // Scroll to top function
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Enhanced hover effects
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.thumbnail');
        
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.02)';
            });
            
            thumbnail.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add ripple effect to buttons
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });
</script>

<style>
    /* Ripple effect */
    .btn {
        position: relative;
        overflow: hidden;
    }

    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    /* List view styles */
    .list-view .thumbnail {
        display: flex;
        flex-direction: row;
        height: auto;
    }

    .list-view .thumbnail img {
        width: 200px;
        height: 150px;
        flex-shrink: 0;
    }

    .list-view .caption {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    @media (max-width: 768px) {
        .list-view .thumbnail {
            flex-direction: column;
        }
        
        .list-view .thumbnail img {
            width: 100%;
            height: 200px;
        }
    }
</style>