<style>
	.footer {
    width: 100%;
    height: 100%;
    padding: 50px 20px;
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    background-color: rgba(255, 234, 0, 0.41);
    color: #000000;
    font-family: 'Montserrat', sans-serif;
}

.footer-1 .footer-logo {
    display: flex;
    align-items: center;
}

.footer-logo img {
    width: 60px;
    height: 60px;
    margin-right: 10px;
}

.footer-logo h1 {
    font-size: 20px;
    letter-spacing: 1px;
}

.footer-1 p {
    font-size: 13px;
    font-family: 'Montserrat', sans-serif;
    letter-spacing: 1px;
    margin-bottom: 20px;
    color: #000;
}

.sosial-media img {
    width: 30px;
    height: 30px;
    margin-right: 10px;
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
}

.footer-2 a,
.footer-4 a {
    color: #000;
    margin-bottom: 5px;
}

.footer-4 a:hover {
    color: #ffce09;
}

.footer-3 p {
    font-size: 15px;
    color: #000;
    letter-spacing: 1px;
    margin-bottom: 5px;
}

footer {
    width: 100%;
    height: 100%;
    background-color: rgba(254, 237, 0, 0.63);
}

footer h1 {
    text-align: center;
    line-height: 50px;
    color: rgb(0, 0, 0);
    font-size: 1rem;
}

footer h1 a {
    color: #000000;
    display: inline-block;
}

footer h1 a:hover {
    color: #ffce09;
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
        <img src="../image/home/3.png" alt="">
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
      <!-- <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">Thu - Sat 05 Am - 08 Pm</p>
      <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="450">Sun 04 Am - 08 Pm</p> -->
    </div>

    <div class="footer-4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
      <h1>Link</h1>
      <a data-scroll data-easing="easeInQuint" href="#beranda">Home</a>
      <a data-scroll data-easing="easeInQuint" href="#tentang">About Us</a>
      <a data-scroll data-easing="easeInQuint" href="#menu">Menu</a>
      <!-- <a data-scroll data-easing="easeInQuint" href="#review">Review</a> -->
      <!-- <a data-scroll data-easing="easeInQuint" href="#partnership">Partnership</a> -->
      <a data-scroll data-easing="easeInQuint" href="#lokasi">Location</a>
    </div>
  </div>
  <footer>
    <h1>&copy; Copyright 2025, <a href=""> @TelkomUniversity</a> All Rights Reserved</h1>
  </footer>
  <!-- ======= Footer End ======= -->
</body>
</html>