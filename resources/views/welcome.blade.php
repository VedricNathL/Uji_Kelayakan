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
        .content {
            flex: 1;
            background-color: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem 5rem;
        }

        .content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .content p {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .content a {
            margin-top: 2rem;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            transition: background-color 0.5s ease;  /* Perpanjang durasi transisi */
        }

        .content a:hover {
            background-color: #5a6268;
        }

        .back-button:hover {
            background-color: #5a6268;
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

    </style>
</head>
<body>
    <div class="container-custom">
        <!-- Bagian Kiri: Konten -->
        <div class="content">
            <h1>Pengaduan <br> Masyarakat</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi perspiciatis aut pariatur doloremque labor quis in praesentium at, recusandae obcaecati dicta accusantium delectus asperiores illum minima veritatis iure quidem amet rerum fugit quaerat illo!</p>
            <a href="{{ route('login') }}">Bergabung!</a>
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
