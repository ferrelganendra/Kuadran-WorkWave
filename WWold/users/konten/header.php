<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO LOKER</title>
    <link rel="stylesheet" type="text/css" href="css/Dashbor.css">
    <script src="js/ScDashboard.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<header>
        <img id='img-click' src="users/assets/reject.png">
        <ul>
            <li><button id="home" onclick="kehome()">Dashboard</button><li>
            <li><button id="home" onclick="keevent()">Event</button></li>
            <li><button id="home" onclick="keloker()">Loker</button></li>
            <li><button id="home" onclick="kegrafik()">Grafik</button></li>
            <li><button onclick="kelogin()">Login</button></li>
            <li><button id="registerbaru" onclick="registerhead()">Register</button></li>
        </ul>
    </header>

    <div id="masking" class="mask"></div>

    <!-- LOGIN -->
    <div id="log" class="form">
        <form method="post" action="login.php">
            <img onclick="exit()" src="css/assets/reject.png">
            <h3>Please Sign In</h3>
            <input name="log-username" type="text" placeholder="Username"><br>
            <input name="log-password" type="password" placeholder="Password"><br>
            <input id="login" type="submit" value="Login"><br>
        </form>
    </div>

    

<!-- REGISTER -->
    <div id="reg-info-perusahaan" class="form">
        <form method="post" action="register.php">
            <img onclick="exitRegister()" src="css/assets/reject.png">
            <h3>Please Sign Up</h3>
            <input name="nama_perusahaan" type="text" placeholder="Nama Perusahaan"><br>
            <input name="industri" type="text" placeholder="Industri"><br>
            <textarea name="deskripsi_perusahaan" placeholder="Deskripsi Perusahaan"></textarea><br>
            <input name="media_sosial" type="text" placeholder="Media Sosial"><br>
            <input name="website" type="text" placeholder="Website"><br>
            <textarea name="alamat_perusahaan" placeholder="Alamat Perusahaan"></textarea><br>
            <input name="logo_perusahaan" type="text" placeholder="Logo Perusahaan"><br>
            <input name="username" type="text" placeholder="Username"><br>
            <input name="password" type="password" placeholder="Password"><br>
            <input id="register" onclick="mendaftar()" type="submit" value="Daftar"><br>
        </form>
    </div>



    <div id="aler" class="alert">
        <h1>Silakan Login Terlebih Dahulu</h1>
    </div>
