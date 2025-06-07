<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.3);
            padding: 50px;
            margin: 50px auto;
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradientShift 3s ease infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .login-header h2 {
            color: #4a5568;
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 15px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .login-header h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }
        
        .login-subtitle {
            color: #718096;
            font-size: 1.2rem;
            margin-top: 25px;
            font-weight: 300;
        }
        
        .form-group {
            margin-bottom: 30px;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }
        
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 18px 25px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8fafc;
            width: 100% !important;
            position: relative;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: white;
            outline: none;
            transform: translateY(-2px);
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 1.2rem;
            z-index: 10;
            transition: all 0.3s ease;
        }
        
        .form-control:focus + .input-icon {
            color: #667eea;
            transform: translateY(-50%) scale(1.1);
        }
        
        .btn-login {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 15px;
            padding: 18px 40px;
            font-size: 18px;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            background: linear-gradient(45deg, #5a67d8, #6b46c1);
        }
        
        .btn-register {
            background: linear-gradient(45deg, #48bb78, #38a169);
            border: none;
            border-radius: 15px;
            padding: 18px 40px;
            font-size: 18px;
            font-weight: 30;
            color: white;
            width: 100%;
			height: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-register:hover::before {
            left: 100%;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(72, 187, 120, 0.4);
            background: linear-gradient(45deg, #38a169, #2f855a);
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .security-badge {
            background: linear-gradient(45deg, #f0fff4, #e6fffa);
            border: 1px solid #9ae6b4;
            border-radius: 12px;
            padding: 15px;
            margin: 25px 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .security-badge i {
            color: #38a169;
            font-size: 1.3rem;
        }
        
        .security-badge span {
            color: #2d3748;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .login-container {
                
                padding: 40px 30px;
            }
            
            .login-header h2 {
                font-size: 2.2rem;
            }
            
            .button-group {
                flex-direction: column;
            }
        }
        
        .floating-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }
        
        .particle:nth-child(1) {
            width: 60px;
            height: 60px;
            top: 10%;
            left: 15%;
            animation-delay: 0s;
        }
        
        .particle:nth-child(2) {
            width: 100px;
            height: 100px;
            top: 70%;
            right: 15%;
            animation-delay: 3s;
        }
        
        .particle:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 15%;
            left: 25%;
            animation-delay: 6s;
        }
        
        .particle:nth-child(4) {
            width: 80px;
            height: 80px;
            top: 40%;
            right: 30%;
            animation-delay: 1.5s;
        }
        
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg) scale(1); 
                opacity: 0.7;
            }
            50% { 
                transform: translateY(-30px) rotate(180deg) scale(1.1); 
                opacity: 0.3;
            }
        }
        
        .welcome-text {
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h2>
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </h2>
                <p class="login-subtitle welcome-text">Selamat datang kembali!</p>
                <p class="login-subtitle">Masuk ke akun Anda untuk melanjutkan</p>
            </div>
            
            <form action="proses/login.php" method="POST">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user"></i>
                        Username
                    </label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukkan username Anda" name="username" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i>
                        Password
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Masukkan password Anda" name="pass" required>
                        <i class="fas fa-lock input-icon"></i>
                    </div>
                </div>

                <div class="security-badge">
                    <i class="fas fa-shield-check"></i>
                    <span>Koneksi aman dengan enkripsi SSL</span>
                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk
                    </button>
                    <a href="register.php" class="btn btn-register">
                        <i class="fas fa-user-plus"></i>
                        Daftar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>