<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .register-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 40px;
            margin: 50px auto;
            max-width: 800px;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .register-header h2 {
            color: #4a5568;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
        }
        
        .register-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }
        
        .register-subtitle {
            color: #718096;
            font-size: 1.1rem;
            margin-top: 20px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
            outline: none;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            z-index: 10;
        }
        
        .btn-register {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 12px;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            background: linear-gradient(45deg, #5a67d8, #6b46c1);
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-col {
            flex: 1;
        }
        
        .security-info {
            background: linear-gradient(45deg, #f0fff4, #e6fffa);
            border: 1px solid #9ae6b4;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
        }
        
        .security-info i {
            color: #38a169;
            font-size: 1.2rem;
            margin-right: 8px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .register-container {
                margin: 20px;
                padding: 30px 20px;
            }
            
            .register-header h2 {
                font-size: 2rem;
            }
        }
        
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <div class="register-container">
            <div class="register-header">
                <h2><i class="fas fa-user-plus"></i> Register</h2>
                <p class="register-subtitle">Buat akun baru untuk mengakses semua fitur</p>
            </div>
            
            <form action="proses/register.php" method="POST">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user"></i> Nama Lengkap
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Masukkan nama lengkap" name="nama" required>
                                <i class="fas fa-user input-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="nama@gmail.com" name="email" required 
                                       pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" 
                                       title="Email harus menggunakan format lengkap seperti nama@gmail.com">
                                <i class="fas fa-envelope input-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-at"></i> Username
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Username unik" name="username" required>
                                <i class="fas fa-at input-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-phone"></i> No Telepon
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="+62 812-3456-7890" name="telp" required>
                                <i class="fas fa-phone input-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Minimal 8 karakter" name="password" required>
                                <i class="fas fa-lock input-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-shield-alt"></i> Konfirmasi Password
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Ulangi password" name="konfirmasi" required>
                                <i class="fas fa-shield-alt input-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="security-info">
                    <i class="fas fa-shield-check"></i>
                    <span>Data Anda akan dienkripsi dan disimpan dengan aman</span>
                </div>

                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>
                
                <div class="text-center mt-3">
                    <p class="text-muted">Sudah punya akun? <a href="user_login.php" style="color: #667eea; text-decoration: none; font-weight: 600;">Login disini</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>