<?php 
	include 'header.php';
?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

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

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	
	body {
		font-family: 'Poppins', sans-serif;
		line-height: 1.6;
		color: var(--dark-color);
		background: linear-gradient(135deg, #FFF9E6 0%, #FFEDD5 50%, #FFE4CC 100%);
		min-height: 100vh;
	}


	/* Hero Section */
	.hero-section {
		text-align: center;
		margin-bottom: 60px;
		padding: 50px 30px;
		background: var(--gradient-1);
		border-radius: 20px;
		color: white;
		position: relative;
		overflow: hidden;
	}

	.hero-section::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="50" height="50" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
		opacity: 0.3;
	}

	.hero-section h2 {
		font-size: clamp(2.5rem, 5vw, 3.5rem);
		font-weight: 700;
		margin-bottom: 20px;
		position: relative;
		z-index: 2;
		border: none !important;
		color: white !important;
		text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
	}

	.hero-section .subtitle {
		font-size: clamp(1rem, 3vw, 1.3rem);
		font-weight: 400;
		position: relative;
		z-index: 2;
		opacity: 0.95;
		max-width: 600px;
		margin: 0 auto;
	}

	.original-title {
		display: none !important;
	}

	/* Content Grid */
	.content-section {
		margin-bottom: 60px;
	}

	.content-grid {
		display: grid;
		grid-template-columns: 1fr;
		gap: 40px;
		margin-bottom: 60px;
	}

	.content-text {
		font-size: clamp(1rem, 2.5vw, 1.1rem);
		line-height: 1.8;
		color: var(--dark-color);
		max-width: 100%;
	}

	.content-text p {
		margin-bottom: 25px;
		padding: 25px;
		background: linear-gradient(135deg, rgba(255, 215, 0, 0.05), rgba(255, 141, 0, 0.05));
		border-radius: 15px;
		border-left: 4px solid var(--primary-color);
		position: relative;
		text-align: justify;
		transition: all 0.3s ease;
		box-shadow: 0 5px 15px rgba(255, 215, 0, 0.1);
	}

	.content-text p:hover {
		background: linear-gradient(135deg, rgba(255, 215, 0, 0.1), rgba(255, 141, 0, 0.1));
		transform: translateY(-5px);
		box-shadow: var(--shadow);
	}

	.content-text p::before {
		content: '\f005';
		font-family: 'Font Awesome 6 Free';
		font-weight: 900;
		position: absolute;
		left: -2px;
		top: 25px;
		color: var(--primary-color);
		font-size: 1.2rem;
		text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
	}

	/* Features Grid */
	.features-section {
		margin: 60px 0;
	}

	.section-title {
		font-size: clamp(2rem, 4vw, 2.5rem);
		font-weight: 600;
		color: var(--secondary-color);
		text-align: center;
		margin-bottom: 50px;
		position: relative;
	}

	.section-title::after {
		content: '';
		position: absolute;
		bottom: -10px;
		left: 50%;
		transform: translateX(-50%);
		width: 100px;
		height: 4px;
		background: var(--gradient-1);
		border-radius: 2px;
	}

	.features-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
		gap: 30px;
		max-width: 1000px;
		margin: 0 auto;
	}

	.feature-card {
		background: linear-gradient(135deg, #fff, var(--light-color));
		padding: 35px 25px;
		border-radius: 20px;
		text-align: center;
		box-shadow: var(--shadow);
		transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
		border: 1px solid rgba(255, 215, 0, 0.1);
		position: relative;
		overflow: hidden;
		height: auto;
		min-height: 280px;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}

	.feature-card::before {
		content: '';
		position: absolute;
		top: -100%;
		left: -100%;
		width: 300%;
		height: 300%;
		background: linear-gradient(45deg, transparent, rgba(255, 215, 0, 0.1), transparent);
		transform: rotate(45deg);
		transition: all 0.6s ease;
		opacity: 0;
	}

	.feature-card:hover::before {
		opacity: 1;
		top: -50%;
		left: -50%;
	}

	.feature-card:hover {
		transform: translateY(-10px);
		box-shadow: var(--shadow-hover);
		border-color: rgba(255, 215, 0, 0.3);
	}

	.feature-icon {
		width: 80px;
		height: 80px;
		margin: 0 auto 25px;
		background: var(--gradient-1);
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		color: white;
		font-size: 2rem;
		position: relative;
		z-index: 2;
		transition: all 0.3s ease;
		box-shadow: 0 5px 20px rgba(255, 215, 0, 0.3);
	}

	.feature-card:hover .feature-icon {
		transform: scale(1.1) rotateY(360deg);
		box-shadow: 0 10px 30px rgba(255, 215, 0, 0.4);
	}

	.feature-title {
		font-size: clamp(1.2rem, 3vw, 1.4rem);
		font-weight: 600;
		color: var(--dark-color);
		margin-bottom: 15px;
		position: relative;
		z-index: 2;
	}

	.feature-desc {
		font-size: clamp(0.9rem, 2.5vw, 1rem);
		color: #666;
		line-height: 1.6;
		position: relative;
		z-index: 2;
		flex-grow: 1;
		display: flex;
		align-items: center;
	}

	/* Stats Section */
	.stats-section {
		background: var(--gradient-2);
		padding: 50px 30px;
		border-radius: 20px;
		margin: 60px 0;
		text-align: center;
		position: relative;
		overflow: hidden;
		color: white;
	}

	.stats-section::before {
		content: '';
		position: absolute;
		top: -50px;
		right: -50px;
		width: 100px;
		height: 100px;
		background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
		border-radius: 50%;
		z-index: 1;
	}

	.stats-section h2 {
		color: white !important;
		margin-bottom: 15px;
		font-size: clamp(2rem, 4vw, 2.5rem);
		text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
	}

	.stats-section p {
		color: rgba(255, 255, 255, 0.9) !important;
		margin-bottom: 40px;
		font-size: clamp(1rem, 2.5vw, 1.2rem);
	}

	.stats-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		gap: 30px;
		max-width: 800px;
		margin: 0 auto;
	}

	.stat-item {
		padding: 30px 20px;
		background: rgba(255, 255, 255, 0.1);
		border-radius: 15px;
		box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
		transition: all 0.3s ease;
		position: relative;
		z-index: 2;
		backdrop-filter: blur(10px);
		border: 1px solid rgba(255, 255, 255, 0.2);
	}

	.stat-item:hover {
		transform: translateY(-5px);
		background: rgba(255, 255, 255, 0.2);
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
	}

	.stat-number {
		font-size: clamp(2.5rem, 5vw, 3.5rem);
		font-weight: 700;
		color: white;
		display: block;
		margin-bottom: 10px;
		text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
	}

	.stat-label {
		font-size: clamp(1rem, 2.5vw, 1.1rem);
		color: rgba(255, 255, 255, 0.9);
		font-weight: 500;
	}

	/* Map Section */
	.map-container {
		background: white;
		padding: 40px 30px;
		border-radius: 25px;
		box-shadow: var(--shadow);
		margin: 60px 0 0 0;
		position: relative;
		border: 1px solid rgba(255, 215, 0, 0.1);
	}

	.map-title {
		text-align: center;
		font-size: clamp(2rem, 4vw, 2.5rem);
		font-weight: 600;
		color: var(--secondary-color);
		margin-bottom: 30px;
		position: relative;
	}

	.map-title::after {
		content: '';
		position: absolute;
		bottom: -10px;
		left: 50%;
		transform: translateX(-50%);
		width: 100px;
		height: 4px;
		background: var(--gradient-1);
		border-radius: 2px;
	}

	#map {
		width: 100%;
		height: 400px;
		border-radius: 15px;
		box-shadow: var(--shadow);
		border: 3px solid rgba(255, 215, 0, 0.2);
		transition: all 0.4s ease;
		position: relative;
		bottom: auto;
	}

	#map:hover {
		box-shadow: var(--shadow-hover);
		transform: translateY(-5px);
		border-color: rgba(255, 215, 0, 0.4);
	}

	/* Responsive Design */
	@media (max-width: 1024px) {
		.container {
			margin: 15px;
			padding: 30px 20px 60px 20px;
		}
		
		.features-grid {
			grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
			gap: 25px;
		}
		
		.stats-grid {
			grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
			gap: 25px;
		}
	}

	@media (max-width: 768px) {
		.container {
			margin: 10px;
			padding: 25px 15px 50px 15px;
		}
		
		.hero-section {
			padding: 40px 20px;
			margin-bottom: 40px;
		}
		
		.features-grid {
			grid-template-columns: 1fr;
			gap: 20px;
		}
		
		.feature-card {
			padding: 30px 20px;
			min-height: 250px;
		}
		
		.stats-grid {
			grid-template-columns: 1fr 1fr;
			gap: 15px;
		}
		
		.stat-item {
			padding: 25px 15px;
		}
		
		.map-container {
			padding: 25px 15px;
		}
		
		#map {
			height: 300px;
		}
		
		.content-text p {
			padding: 20px;
		}
	}

	@media (max-width: 480px) {
		.stats-grid {
			grid-template-columns: 1fr;
			gap: 15px;
		}
		
		.hero-section {
			padding: 30px 15px;
		}
		
		.features-section,
		.stats-section,
		.content-section {
			margin: 40px 0;
		}
	}

	/* iPad Specific */
	@media (min-width: 768px) and (max-width: 1024px) {
		.features-grid {
			grid-template-columns: repeat(2, 1fr);
			gap: 30px;
		}
		
		.stats-grid {
			grid-template-columns: repeat(3, 1fr);
		}
		
		.container {
			max-width: 95%;
		}
	}

	/* Animation Classes */
	.fade-in {
		opacity: 0;
		transform: translateY(30px);
		transition: all 0.8s ease;
	}

	.fade-in.visible {
		opacity: 1;
		transform: translateY(0);
	}

	/* Pulse Animation for Icons */
	@keyframes pulse {
		0% { transform: scale(1); }
		50% { transform: scale(1.05); }
		100% { transform: scale(1); }
	}

	.feature-icon:hover {
		animation: pulse 1s ease-in-out;
	}

	/* Smooth scrolling */
	html {
		scroll-behavior: smooth;
	}

	/* Loading states */
	.loading {
		opacity: 0.7;
		pointer-events: none;
	}
</style>

<div class="container">
	<!-- Hero Section -->
	<div class="hero-section" data-aos="fade-down" data-aos-duration="1000">
		<h2><i class="fas fa-utensils" style="margin-right: 15px;"></i>Tentang Kami</h2>
		<p class="subtitle">Melestarikan Cita Rasa Tradisional Nasi Kuning dengan Sentuhan Teknologi Modern</p>
	</div>

	<!-- Hide original title -->
	<h2 class="original-title" style="width: 100%; border-bottom: 4px solid #ff8680"><b>Tentang Kami</b></h2>

	<!-- Content Section -->
	<div class="content-section">
		<div class="content-grid">
			<div class="content-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
				<p>Usaha kuliner merupakan salah satu sektor yang terus berkembang, terutama di bidang makanan siap saji seperti nasi kuning. Nasi kuning adalah makanan khas Indonesia yang banyak diminati untuk sarapan maupun acara tertentu. Namun, pelaku usaha seringkali sudah berusia lanjut dan membutuhkan bantuan teknologi.</p>
				
				<p>Oleh karena itu, dibutuhkan solusi digital berupa aplikasi web yang dapat membantu penjual dalam mempromosikan bisnisnya dengan lebih efisien dan terorganisir. Platform kami hadir untuk menjembatani kebutuhan tersebut dengan interface yang mudah digunakan.</p>
			</div>
		</div>
	</div>

	<!-- Features Section -->
	<div class="features-section">
		<h2 class="section-title" data-aos="fade-up" data-aos-duration="1000">Keunggulan Kami</h2>
		<div class="features-grid">
			<div class="feature-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
				<div class="feature-icon">
					<i class="fas fa-mobile-alt"></i>
				</div>
				<h3 class="feature-title">Solusi Digital Terpadu</h3>
				<p class="feature-desc">Platform modern yang memudahkan promosi bisnis kuliner secara online dengan fitur lengkap dan mudah digunakan</p>
			</div>
			
			<div class="feature-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
				<div class="feature-icon">
					<i class="fas fa-chart-line"></i>
				</div>
				<h3 class="feature-title">Efisien & Terorganisir</h3>
				<p class="feature-desc">Sistem manajemen yang membantu mengatur dan meningkatkan efisiensi penjualan dengan laporan yang detail</p>
			</div>
			
			<div class="feature-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
				<div class="feature-icon">
					<i class="fas fa-users"></i>
				</div>
				<h3 class="feature-title">Mudah Digunakan</h3>
				<p class="feature-desc">Interface yang user-friendly dan intuitif, cocok untuk semua kalangan usia termasuk penjual senior</p>
			</div>
			
			<div class="feature-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
				<div class="feature-icon">
					<i class="fas fa-heart"></i>
				</div>
				<h3 class="feature-title">Cita Rasa Tradisional</h3>
				<p class="feature-desc">Mempertahankan keaslian rasa nasi kuning warisan nenek moyang dengan kualitas terjamin</p>
			</div>
		</div>
	</div>

	<!-- Stats Section -->
	<div class="stats-section" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
		<h2>Mengapa Memilih Kami?</h2>
		<p>Kami berkomitmen memberikan yang terbaik untuk bisnis kuliner Anda</p>
		
		<div class="stats-grid">
			<div class="stat-item">
				<span class="stat-number">150+</span>
				<div class="stat-label">Pembeli Terdaftar</div>
			</div>
			<div class="stat-item">
				<span class="stat-number">24/7</span>
				<div class="stat-label">Dukungan Online</div>
			</div>
			<div class="stat-item">
				<span class="stat-number">⭐ 4.9</span>
				<div class="stat-label">Rating Kepuasan</div>
			</div>
		</div>
	</div>

	<!-- Map Section -->
	<div class="map-container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
		<h2 class="map-title"><i class="fas fa-map-marker-alt" style="margin-right: 15px;"></i>Lokasi Kami</h2>
		<iframe id="map"
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63341.2456485418!2d107.59192465992735!3d-6.974568094787286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e91bfffffff7%3A0x798a5c7bbcad437e!2sJl.%20Sukabirus%2C%20Citeureup%2C%20Kec.%20Dayeuhkolot%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1668349240972!5m2!1sen!2sid"
			frameborder="0" allowfullscreen loading="lazy">
		</iframe>
	</div>
</div>

<?php 
	include 'footer.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
	// Initialize AOS with optimized settings
	AOS.init({
		duration: 1000,
		once: true,
		offset: 50,
		easing: 'ease-out-cubic',
		delay: 100
	});

	// Enhanced scroll animations
	const observerOptions = {
		threshold: 0.1,
		rootMargin: '0px 0px -50px 0px'
	};

	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.classList.add('visible');
			}
		});
	}, observerOptions);

	document.querySelectorAll('.fade-in').forEach(el => {
		observer.observe(el);
	});

	// Enhanced hover effects for feature cards
	document.querySelectorAll('.feature-card').forEach((card, index) => {
		card.addEventListener('mouseenter', function() {
			this.style.transform = 'translateY(-10px)';
			this.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
		});
		
		card.addEventListener('mouseleave', function() {
			this.style.transform = 'translateY(0)';
		});

		// Add staggered loading animation
		card.style.animationDelay = `${index * 0.1}s`;
	});

	// Counter animation for stats
	function animateCounter(element, target, suffix = '') {
		let current = 0;
		const increment = target / 80;
		const timer = setInterval(() => {
			current += increment;
			if (current >= target) {
				current = target;
				clearInterval(timer);
			}
			
			if (suffix === '⭐') {
				element.textContent = '⭐ ' + current.toFixed(1);
			} else if (suffix === '/7') {
				element.textContent = Math.ceil(current) + '/7';
			} else if (suffix === '+') {
				element.textContent = Math.ceil(current) + '+';
			} else {
				element.textContent = Math.ceil(current) + suffix;
			}
		}, 30);
	}

	// Trigger counter animation when stats section is visible
	const statsObserver = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				const statNumbers = entry.target.querySelectorAll('.stat-number');
				const configs = [
					{ target: 150, suffix: '+' },
					{ target: 24, suffix: '/7' },
					{ target: 4.9, suffix: '⭐' }
				];
				
				statNumbers.forEach((stat, index) => {
					setTimeout(() => {
						const config = configs[index];
						animateCounter(stat, config.target, config.suffix);
					}, index * 200);
				});
				
				statsObserver.unobserve(entry.target);
			}
		});
	}, { threshold: 0.5 });

	const statsSection = document.querySelector('.stats-section');
	if (statsSection) {
		statsObserver.observe(statsSection);
	}

	// Map loading optimization
	document.addEventListener('DOMContentLoaded', function() {
		const map = document.getElementById('map');
		let mapLoaded = false;
		
		// Lazy load map when it comes into view
		const mapObserver = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting && !mapLoaded) {
					map.style.opacity = '1';
					map.style.transform = 'translateY(0)';
					mapLoaded = true;
					mapObserver.unobserve(map);
				}
			});
		});
		
		mapObserver.observe(map);
	});

	// Smooth scroll behavior
	document.documentElement.style.scrollBehavior = 'smooth';

	// Performance optimization
	let ticking = false;
	function updateAnimations() {
		// Throttle animations for better performance
		if (!ticking) {
			requestAnimationFrame(() => {
				ticking = false;
			});
			ticking = true;
		}
	}

	window.addEventListener('scroll', updateAnimations, { passive: true });

	// Responsive image loading
	if ('loading' in HTMLImageElement.prototype) {
		const images = document.querySelectorAll('img[loading="lazy"]');
		images.forEach(img => {
			img.src = img.dataset.src;
		});
	}

	// Touch device optimization
	if ('ontouchstart' in window) {
		document.body.classList.add('touch-device');
	}
</script>