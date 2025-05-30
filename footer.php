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

.footer {
    width: 100%;
    height: 100%;
    padding: 50px 20px;
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    background: var(--gradient-1);
    color: var(--dark-color);
    font-family: 'Montserrat', sans-serif;
    box-shadow: var(--shadow);
}

.footer-1 .footer-logo {
    display: flex;
    align-items: center;
}

.footer-logo img {
    width: 60px;
    height: 60px;
    margin-right: 10px;
    border-radius: 50%;
    box-shadow: var(--shadow);
}

.footer-logo h1 {
    font-size: 20px;
    letter-spacing: 1px;
    color: var(--dark-color);
    font-weight: 700;
}

.footer-1 p {
    font-size: 13px;
    font-family: 'Montserrat', sans-serif;
    letter-spacing: 1px;
    margin-bottom: 20px;
    color: var(--dark-color);
    opacity: 0.8;
}

.sosial-media img {
    width: 30px;
    height: 30px;
    margin-right: 10px;
    border-radius: 50%;
    padding: 5px;
    background: var(--light-color);
    transition: all 0.3s ease;
}

.sosial-media img:hover {
    background: var(--accent-color);
    transform: translateY(-3px);
    box-shadow: var(--shadow-hover);
}

.footer-1,
.footer-2,
.footer-3,
.footer-4 {
    display: flex;
    flex-direction: column;
    margin: 10px;
}

.footer-2 h1,
.footer-3 h1,
.footer-4 h1 {
    font-size: 20px;
    margin-bottom: 10px;
    color: var(--dark-color);
    font-weight: 700;
    position: relative;
}

.footer-2 h1::after,
.footer-3 h1::after,
.footer-4 h1::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 30px;
    height: 3px;
    background: var(--accent-color);
    border-radius: 2px;
}

.footer-2 a,
.footer-4 a {
    color: var(--dark-color);
    margin-bottom: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
    opacity: 0.8;
}

.footer-2 a:hover,
.footer-4 a:hover {
    color: var(--accent-color);
    opacity: 1;
    transform: translateX(5px);
}

.footer-3 p {
    font-size: 15px;
    color: var(--dark-color);
    letter-spacing: 1px;
    margin-bottom: 5px;
    opacity: 0.8;
}

footer {
    width: 100%;
    height: 100%;
    background: var(--gradient-2);
    padding: 20px 0;
}

footer h1 {
    text-align: center;
    line-height: 50px;
    color: var(--light-color);
    font-size: 1rem;
    margin: 0;
    font-weight: 500;
}

footer h1 a {
    color: var(--light-color);
    display: inline-block;
    text-decoration: none;
    transition: all 0.3s ease;
}

footer h1 a:hover {
    color: var(--primary-color);
    transform: scale(1.05);
}

@media screen and (max-width:768px) {
    .nav {
        justify-content: space-between;
        padding: 0px 30px;
    }

    .nav a {
        display: none;
    }

    #btn-nav {
        display: block;
    }

    .box-menu {
        flex-direction: column;
        margin: 10px;
        width: 280px;
    }

    .area-menu {
        width: 260px;
        height: 220px;
    }

    .footer {
        flex-direction: column;
        padding: 30px 20px;
    }

    .area-visi .main-carousel {
        width: 300px;
    }

    .area-visi img {
        width: 300px;
    }

    .visi-kiri {
        width: 300px;
    }

    .box-visi img {
        width: 60px;
        height: 60px;
    }
}

@media screen and (max-width:600px) {
    .nav-menu {
        width: 100%;
    }

    .beranda span {
        font-size: 30px;
    }

    .tentang img {
        width: 300px;
        height: 260px;
    }

    .area-tentang {
        width: 300px;
    }

    .main-carousel {
        width: 95%;
    }

    .main-carousel .carousel-cell img {
        margin: 10px;
    }

    .footer {
        padding: 20px 15px;
    }

    .footer-logo h1 {
        font-size: 18px;
    }

    .footer-2 h1,
    .footer-3 h1,
    .footer-4 h1 {
        font-size: 18px;
    }
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        AOS.init({
            duration: 800, // Durasi animasi
            once: false // Animasi terus berulang saat scroll
        });
    });

    // Re-initialize AOS setelah halaman di-load ulang dengan AJAX atau klik menu
    document.addEventListener("click", function () {
        setTimeout(() => {
            AOS.refresh();
        }, 100);
    });
</script>

<!-- ======= Footer Start ======= -->
<div class="footer">
    <div class="footer-1">
        <div class="footer-logo" data-aos="fade-down" data-aos-duration="800">
            <img src="image/home/3.png" alt="">
            <h1>Naskun Zahra</h1>
        </div>
        <p data-aos="fade-up" data-aos-duration="800">Memberikan Layanan Terbaik <br> Dibuat Dengan Tangan Dan Cinta.</p>
        <div class="sosial-media">
            <a href="https://wa.me/6282319001537">
                <img src="https://img.icons8.com/?size=100&id=16713&format=png&color=000000" alt="" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="200">
            </a>
            <a href="https://www.instagram.com/">
                <img src="https://img.icons8.com/?size=100&id=32323&format=png&color=000000" alt="" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="250">
            </a>
            <a href="https://line.me/ti/p/~6282319001537">
                <img src="https://img.icons8.com/?size=100&id=21746&format=png&color=000000" alt="" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="300">
            </a>
        </div>
    </div>

    <div class="footer-2">
        <h1 data-aos="fade-down" data-aos-duration="800" data-aos-delay="200">Contact</h1>
        <a href="" data-aos="fade-up" data-aos-duration="800" data-aos-delay="250">+62 812-2085-1610</a>
        <a href="" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">OLIH SOLIHIN@gmail.com</a>
    </div>

    <div class="footer-3">
        <h1 data-aos="fade-down" data-aos-duration="800" data-aos-delay="300">Operational Time</h1>
        <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="350">Senin - Sabtu 07 Am - 01 Pm</p>
    </div>

    <div class="footer-4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
        <h1>Link</h1>
        <a data-scroll data-easing="easeInQuint" href="#beranda">Home</a>
        <a data-scroll data-easing="easeInQuint" href="#tentang">About Us</a>
        <a data-scroll data-easing="easeInQuint" href="#menu">Menu</a>
        <a data-scroll data-easing="easeInQuint" href="#lokasi">Location</a>
    </div>
</div>

<footer>
    <h1>&copy; Copyright 2025, <a href=""> @TelkomUniversity</a> All Rights Reserved</h1>
</footer>
<!-- ======= Footer End ======= -->

</body>
</html>