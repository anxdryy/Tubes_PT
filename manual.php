<?php 
include 'header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

<!-- Inline CSS langsung di dalam style tag -->
<style>
/* RESET TOTAL UNTUK HALAMAN MANUAL */
.manual-wrapper {
    all: initial !important;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
    line-height: 1.6 !important;
    color: #333 !important;
    background: #fff !important;
    display: block !important;
    width: 100vw !important;
    max-width: 100% !important;
    margin: 0 !important;
    padding: 20px 0 !important;
    box-sizing: border-box !important;
    position: relative !important;
    z-index: 1 !important;
}

.manual-wrapper * {
    box-sizing: border-box !important;
}

.manual-container {
    width: 100% !important;
    max-width: 1200px !important;
    margin: 0 auto !important;
    padding: 0 20px !important;
    display: block !important;
    position: relative !important;
}

.manual-title {
    font-size: 28px !important;
    font-weight: bold !important;
    color: #333 !important;
    border-bottom: 4px solid #ff8680 !important;
    padding-bottom: 12px !important;
    margin-bottom: 30px !important;
    display: block !important;
    width: 100% !important;
    text-align: left !important;
}

.manual-accordion {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    display: block !important;
}

.accordion-item {
    background: #ffffff !important;
    border: 2px solid #e1e1e1 !important;
    border-radius: 8px !important;
    margin-bottom: 15px !important;
    overflow: hidden !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    display: block !important;
    width: 100% !important;
}

.accordion-header {
    background: #f8f9fa !important;
    padding: 18px 20px !important;
    cursor: pointer !important;
    border: none !important;
    display: block !important;
    width: 100% !important;
    text-align: left !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    color: #333 !important;
    transition: background-color 0.3s ease !important;
    position: relative !important;
}

.accordion-header:hover {
    background: #e9ecef !important;
}

.accordion-header:after {
    content: '+' !important;
    position: absolute !important;
    right: 20px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    font-size: 20px !important;
    font-weight: bold !important;
    color: #ff8680 !important;
}

.accordion-header.active:after {
    content: '−' !important;
}

.accordion-content {
    padding: 20px !important;
    background: #ffffff !important;
    display: none !important;
    border-top: 1px solid #e1e1e1 !important;
}

.accordion-content.show {
    display: block !important;
}

.accordion-content ol {
    margin: 0 !important;
    padding-left: 20px !important;
    list-style: decimal !important;
}

.accordion-content ol li {
    margin-bottom: 10px !important;
    line-height: 1.6 !important;
    font-size: 15px !important;
    color: #555 !important;
    padding-left: 5px !important;
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {
    .manual-container {
        padding: 0 15px !important;
    }
    
    .manual-title {
        font-size: 24px !important;
        margin-bottom: 20px !important;
    }
    
    .accordion-header {
        padding: 15px !important;
        font-size: 15px !important;
    }
    
    .accordion-content {
        padding: 15px !important;
    }
    
    .accordion-content ol li {
        font-size: 14px !important;
    }
}

@media (max-width: 480px) {
    .manual-container {
        padding: 0 10px !important;
    }
    
    .manual-title {
        font-size: 20px !important;
        border-bottom-width: 3px !important;
    }
    
    .accordion-header {
        padding: 12px 15px !important;
        font-size: 14px !important;
    }
    
    .accordion-header:after {
        right: 15px !important;
        font-size: 18px !important;
    }
    
    .accordion-content {
        padding: 12px !important;
    }
}
</style>

<div class="manual-wrapper">
    <div class="manual-container">
        <h2 class="manual-title">Manual Aplikasi</h2>
        
        <div class="manual-accordion">
            <!-- 1. Cara Berbelanja -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Bagaimana Cara Berbelanja di Naskun Zahra
                </div>
                <div class="accordion-content show">
                    <ol>
                        <li>Pastikan Anda sudah Daftar/Register dahulu dengan mengisi form pendaftaran</li>
                        <li>Verifikasi email Anda melalui link yang dikirim ke email</li>
                        <li>Login menggunakan username dan password yang sudah dibuat</li>
                        <li>Browse katalog produk atau gunakan fitur pencarian</li>
                        <li>Pilih produk yang ingin dibeli dengan klik gambar atau nama produk</li>
                        <li>Tentukan jumlah yang ingin dibeli dan varian jika ada</li>
                        <li>Klik tombol "Tambah ke Keranjang"</li>
                        <li>Lanjutkan belanja atau langsung checkout</li>
                        <li>Isi alamat pengiriman dengan lengkap dan benar</li>
                        <li>Pilih metode pengiriman yang diinginkan</li>
                        <li>Review pesanan Anda sebelum melanjutkan pembayaran</li>
                        <li>Lakukan pembayaran sesuai metode yang dipilih</li>
                    </ol>
                </div>
            </div>
            
            <!-- 2. Cara Daftar -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Cara Mendaftar Akun Baru
                </div>
                <div class="accordion-content">
                    <ol>
                        <li>Klik tombol "Daftar" atau "Register" di halaman utama</li>
                        <li>Isi form pendaftaran dengan data yang benar</li>
                        <li>Masukkan nama lengkap sesuai identitas</li>
                        <li>Gunakan alamat email yang aktif dan valid</li>
                        <li>Buat username yang unik dan mudah diingat</li>
                        <li>Buat password yang kuat minimal 8 karakter</li>
                        <li>Konfirmasi password dengan mengetik ulang</li>
                        <li>Isi nomor telepon yang bisa dihubungi</li>
                        <li>Lengkapi alamat lengkap untuk pengiriman</li>
                        <li>Centang persetujuan syarat dan ketentuan</li>
                        <li>Klik tombol "Daftar" untuk menyelesaikan pendaftaran</li>
                        <li>Cek email untuk verifikasi akun</li>
                    </ol>
                </div>
            </div>
            
            <!-- 3. Cara Pembayaran -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Cara Melakukan Pembayaran
                </div>
                <div class="accordion-content">
                    <ol>
                        <li>Pilih metode pembayaran yang tersedia (Transfer Bank, E-wallet, COD)</li>
                        <li>Untuk transfer bank, catat nomor rekening tujuan dengan benar</li>
                        <li>Transfer sesuai dengan total yang tertera di invoice</li>
                        <li>Jangan lupa tambahkan kode unik jika diminta</li>
                        <li>Simpan bukti transfer/struk pembayaran</li>
                        <li>Upload bukti pembayaran melalui halaman konfirmasi</li>
                        <li>Isi detail pembayaran seperti nama pengirim dan bank asal</li>
                        <li>Tunggu konfirmasi pembayaran dari admin (1x24 jam)</li>
                        <li>Untuk COD, siapkan uang pas saat barang tiba</li>
                        <li>Untuk e-wallet, ikuti instruksi pembayaran yang muncul</li>
                        <li>Pastikan pembayaran dilakukan dalam batas waktu yang ditentukan</li>
                        <li>Hubungi customer service jika ada kendala pembayaran</li>
                    </ol>
                </div>
            </div>
            
            <!-- 4. Cara Tracking -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Cara Melacak Status Pesanan
                </div>
                <div class="accordion-content">
                    <ol>
                        <li>Login ke akun Anda terlebih dahulu</li>
                        <li>Masuk ke menu "Pesanan Saya" atau "My Orders"</li>
                        <li>Lihat daftar pesanan yang pernah dibuat</li>
                        <li>Klik detail pesanan untuk melihat status terkini</li>
                        <li>Status pesanan meliputi: Menunggu Pembayaran, Diproses, Dikirim, Selesai</li>
                        <li>Untuk pesanan yang sudah dikirim, akan muncul nomor resi</li>
                        <li>Copy nomor resi untuk tracking di website kurir</li>
                        <li>Kunjungi website resmi kurir (JNE, J&T, SiCepat, dll)</li>
                        <li>Masukkan nomor resi di kolom tracking</li>
                        <li>Lihat perjalanan paket dari gudang hingga alamat tujuan</li>
                        <li>Hubungi customer service jika paket terlambat atau bermasalah</li>
                        <li>Konfirmasi penerimaan barang setelah pesanan diterima</li>
                    </ol>
                </div>
            </div>
            
            <!-- 5. Cara Return -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Cara Mengembalikan/Tukar Barang (Return/Exchange)
                </div>
                <div class="accordion-content">
                    <ol>
                        <li>Pastikan barang masih dalam kondisi baru dan belum digunakan</li>
                        <li>Return/exchange hanya berlaku dalam 7 hari setelah barang diterima</li>
                        <li>Simpan semua kemasan asli, label, dan aksesoris barang</li>
                        <li>Hubungi customer service melalui WhatsApp atau email</li>
                        <li>Jelaskan alasan return (salah ukuran, cacat, tidak sesuai deskripsi)</li>
                        <li>Kirim foto barang dan bukti pembelian</li>
                        <li>Tunggu approval dari tim customer service</li>
                        <li>Jika disetujui, kirim barang ke alamat yang diberikan</li>
                        <li>Gunakan asuransi paket saat mengirim barang return</li>
                        <li>Kirim nomor resi return ke customer service</li>
                        <li>Proses refund akan dilakukan setelah barang diterima dan dicek</li>
                        <li>Refund akan masuk ke rekening dalam 3-7 hari kerja</li>
                    </ol>
                </div>
            </div>
            
            <!-- 6. FAQ Umum -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Pertanyaan yang Sering Diajukan (FAQ)
                </div>
                <div class="accordion-content">
                    <ol>
                        <li><strong>Apakah barang dijamin original?</strong> Ya, semua produk dijamin 100% original</li>
                        <li><strong>Berapa lama proses pengiriman?</strong> Pengiriman dalam kota 1-2 hari, luar kota 2-5 hari</li>
                        <li><strong>Bisakah ganti alamat setelah checkout?</strong> Bisa, selama pesanan belum diproses</li>
                        <li><strong>Apakah ada garansi untuk produk elektronik?</strong> Ya, sesuai garansi resmi dari brand</li>
                        <li><strong>Bagaimana jika barang rusak saat pengiriman?</strong> Kami akan ganti rugi 100%</li>
                        <li><strong>Apakah bisa bayar dengan kartu kredit?</strong> Saat ini belum tersedia, gunakan transfer atau e-wallet</li>
                        <li><strong>Minimal pembelian berapa?</strong> Tidak ada minimal pembelian</li>
                        <li><strong>Apakah ada program member atau loyalty?</strong> Ya, dapatkan poin setiap pembelian</li>
                        <li><strong>Bagaimana cara menggunakan kode promo?</strong> Masukkan kode di halaman checkout</li>
                        <li><strong>Apakah bisa pesan dalam jumlah besar (grosir)?</strong> Ya, hubungi kami untuk harga khusus</li>
                    </ol>
                </div>
            </div>
            
            <!-- 7. Kebijakan Toko -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Kebijakan dan Syarat Ketentuan Toko
                </div>
                <div class="accordion-content">
                    <ol>
                        <li>Semua harga sudah termasuk PPN dan dapat berubah sewaktu-waktu</li>
                        <li>Stok barang yang ditampilkan adalah real time dan terbatas</li>
                        <li>Pesanan akan diproses setelah pembayaran dikonfirmasi</li>
                        <li>Pembatalan pesanan hanya bisa dilakukan sebelum barang dikirim</li>
                        <li>Kami tidak bertanggung jawab atas keterlambatan kurir</li>
                        <li>Komplain harus disertai foto dan video unboxing</li>
                        <li>Data pelanggan dijamin keamanannya dan tidak akan disebarkan</li>
                        <li>Transaksi yang sudah selesai tidak dapat dibatalkan</li>
                        <li>Kami berhak menolak pesanan yang mencurigakan atau tidak wajar</li>
                        <li>Segala bentuk penipuan akan ditindak sesuai hukum yang berlaku</li>
                        <li>Kebijakan dapat berubah tanpa pemberitahuan sebelumnya</li>
                        <li>Dengan berbelanja di sini, Anda setuju dengan semua ketentuan</li>
                    </ol>
                </div>
            </div>
            
            <!-- 8. Cara Hubungi CS -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Cara Menghubungi Customer Service
                </div>
                <div class="accordion-content">
                    <ol>
                        <li><strong>WhatsApp:</strong> +62 812-3456-7890 (Respon cepat 24 jam)</li>
                        <li><strong>Email:</strong> cs@naskunzahra.com (Respon dalam 1x24 jam)</li>
                        <li><strong>Live Chat:</strong> Available di website jam 08:00-22:00 WIB</li>
                        <li><strong>Telepon:</strong> (021) 1234-5678 (Senin-Sabtu 09:00-17:00)</li>
                        <li>Untuk komplain urgent, gunakan WhatsApp untuk respon tercepat</li>
                        <li>Untuk pertanyaan teknis, email lebih disarankan agar bisa dijelaskan detail</li>
                        <li>Sertakan nomor pesanan saat menghubungi customer service</li>
                        <li>Jelaskan masalah dengan jelas dan lengkap</li>
                        <li>Kirimkan screenshot atau foto jika diperlukan</li>
                        <li>Bersabar menunggu respon karena volume chat yang tinggi</li>
                        <li>Jangan spam atau kirim pesan berulang-ulang</li>
                        <li>Gunakan bahasa yang sopan saat berkomunikasi dengan CS</li>
                    </ol>
                </div>
            </div>
            
            <!-- 9. Tips Belanja Aman -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Tips Belanja Online yang Aman
                </div>
                <div class="accordion-content">
                    <ol>
                        <li>Selalu belanja di website resmi Naskun Zahra</li>
                        <li>Pastikan URL website benar dan menggunakan HTTPS</li>
                        <li>Jangan pernah memberikan password kepada siapapun</li>
                        <li>Gunakan password yang kuat dan unik untuk akun</li>
                        <li>Logout setelah selesai belanja, terutama di komputer umum</li>
                        <li>Periksa detail produk, harga, dan ongkir sebelum checkout</li>
                        <li>Screenshot atau simpan bukti transaksi untuk arsip</li>
                        <li>Jangan transfer ke rekening pribadi atau tidak resmi</li>
                        <li>Waspada penipuan yang mengatasnamakan toko kami</li>
                        <li>Konfirmasi melalui customer service jika ada keraguan</li>
                        <li>Update aplikasi dan browser secara berkala</li>
                        <li>Gunakan koneksi internet yang aman saat bertransaksi</li>
                    </ol>
                </div>
            </div>
            
            <!-- 10. Panduan Ukuran -->
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                    Panduan Memilih Ukuran Pakaian
                </div>
                <div class="accordion-content">
                    <ol>
                        <li>Selalu cek size chart yang tersedia di halaman produk</li>
                        <li>Ukur lingkar dada, pinggang, dan pinggul dengan meteran</li>
                        <li>Ukur saat menggunakan underwear saja untuk akurasi</li>
                        <li>Bandingkan hasil ukuran dengan size chart yang disediakan</li>
                        <li>Jika ragu antara dua ukuran, pilih yang lebih besar</li>
                        <li>Perhatikan model pakaian (slim fit, regular fit, oversized)</li>
                        <li>Baca review pelanggan lain tentang ukuran</li>
                        <li>Tanyakan ke customer service jika masih bingung</li>
                        <li>Simpan hasil ukuran tubuh untuk referensi belanja selanjutnya</li>
                        <li>Perhatikan bahan pakaian (stretch atau non-stretch)</li>
                        <li>Ukuran dapat berbeda antar brand, jadi selalu cek ulang</li>
                        <li>Untuk anak-anak, pertimbangkan faktor pertumbuhan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleAccordion(element) {
    // Reset semua accordion
    const allHeaders = document.querySelectorAll('.accordion-header');
    const allContents = document.querySelectorAll('.accordion-content');
    
    allHeaders.forEach(header => {
        if (header !== element) {
            header.classList.remove('active');
        }
    });
    
    allContents.forEach(content => {
        if (content !== element.nextElementSibling) {
            content.classList.remove('show');
        }
    });
    
    // Toggle yang diklik
    element.classList.toggle('active');
    const content = element.nextElementSibling;
    content.classList.toggle('show');
}

// Auto open first accordion
document.addEventListener('DOMContentLoaded', function() {
    const firstHeader = document.querySelector('.accordion-header');
    if (firstHeader) {
        firstHeader.classList.add('active');
    }
});
</script>

<div style="margin-bottom: 40px;"></div>

<?php 
include 'footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>