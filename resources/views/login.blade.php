<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        .container-custom {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Bagian Kiri: Konten */
        .container-fluid {
            display: flex;
            height: 100vh;
        }

        .content {
            flex: 1;
            background-color: #343a40;
            color: whitesmoke;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem 5rem;
        }

        .content h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: bold;
            margin-left: 200px;
            margin-bottom: 1.5rem;
        }

        .login-form {
            width: 100%;
            max-width: 550px;
            margin-left: 200px;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .btn {
            background-color: #0d6efd;
            color: white;
            width: 100%;
            padding: 0.8rem;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        .register-link {
            display: block;
            margin-top: 1rem;
            color: #0d6efd;
            background: none;
            border: none;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .register-link:hover {
            color: #0d6efd;
        }

        /* Bagian Kanan: Overlay */
        .overlay {
            flex: 1;
            position: relative;
            background: #343a40;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://via.placeholder.com/600x800') center center / cover no-repeat;
            clip-path: polygon(20% 0, 100% 0, 100% 100%, 0 100%);
        }

        .icon-container {
            position: absolute;
            top: 50%;
            right: 30px;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon {
            width: 50px;
            height: 50px;
            margin: 15px 0;
            border-radius: 50%;
            background-color: #495057;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            transition: transform 0.15s ease, background-color 0.2s ease;  /* Transisi lebih cepat */
        }

        .icon:hover {
            transform: scale(1.1);  /* Membuat efek zoom lebih kuat */
            background-color: #6c757d;  /* Warna berubah juga saat hover */
        }

        .back-btn {
            position: absolute;
            top: 30px;
            left: 30px;
            color: white;
            padding: 0.6rem 1rem;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-btn:hover {
            background-color: #343a40;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <div class="content">
        <a href="{{ route('welcome') }}" class="back-btn">&larr; Kembali</a>
            <h1 class="">Login</h1>

            @section('content')
            <form class="login-form" action="{{ route('login.auth') }}" method="POST">
                @csrf
                @if (Session::get('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi" >
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="submit" name="create_account" value="1" class="register-link">Buat Akun</button>
            </form>
        </div>
        <!-- Bagian Kanan: Overlay -->
        <div class="overlay">
            <div class="background-image"></div>
            <div class="icon-container">
                <div class="icon"><i class="fas fa-user"></i></div>
                <div class="icon"><i class="fas fa-exclamation"></i></div>
                <div class="icon"><i class="fas fa-pen"></i></div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
