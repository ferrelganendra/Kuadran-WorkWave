// Fungsi untuk menampilkan form pendaftaran perusahaan
function registerhead() {
    document.getElementById("reg-info-perusahaan").style.display = "block";
    document.getElementById("masking").style.display = "block";
}

// Fungsi untuk menutup form pendaftaran
function exitRegister() {
    document.getElementById("reg-info-perusahaan").style.display = "none";
    document.getElementById("masking").style.display = "none";
}
function showFormInfoLogin() {
    // Menyimpan data dari formulir pertama ke dalam variabel JavaScript
    var nama_perusahaan = document.getElementById("nama_perusahaan").value;
    var industri = document.getElementById("industri").value;
    var deskripsi_perusahaan = document.getElementById("deskripsi_perusahaan").value;
    var media_sosial = document.getElementById("media_sosial").value;
    var website = document.getElementById("website").value;
    var alamat_perusahaan = document.getElementById("alamat_perusahaan").value;
    var logo_perusahaan = document.getElementById("logo_perusahaan").value;

    if (nama_perusahaan == "" || industri == "" || deskripsi_perusahaan == "" || media_sosial == "" || website == "" || alamat_perusahaan == "" || logo_perusahaan == "") {
        alert("Harap lengkapi semua kolom Info Perusahaan terlebih dahulu.");
        return; // Menghentikan fungsi jika ada kolom yang kosong
    }

    // Menampilkan formulir kedua dan menyembunyikan formulir pertama
    document.getElementById("reg-info-perusahaan").style.display = "none";
    document.getElementById("reg-info-login").style.display = "block";
    
    // Menetapkan data dari formulir pertama ke dalam formulir kedua (opsional)
    document.getElementById("nama_perusahaan_info_login").value = namaPerusahaan;
    document.getElementById("industri_info_login").value = industri;
    // ...

    // Fokus pada field pertama di formulir kedua (opsional)
    document.getElementById("username").focus();
}

function submitRegistrationForm() {
    // Menggabungkan data dari kedua formulir
    var nama_perusahaan = document.getElementById("nama_perusahaan").value;
    var industri = document.getElementById("industri").value;
    var deskripsi_perusahaan = document.getElementById("deskripsi_perusahaan").value;
    var media_sosial = document.getElementById("media_sosial").value;
    var website = document.getElementById("website").value;
    var alamat_perusahaan = document.getElementById("alamat_perusahaan").value;
    var logo_perusahaan = document.getElementById("logo_perusahaan").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    if (nama_perusahaan == "" || industri == "" || deskripsi_perusahaan == "" || media_sosial == "" || website == "" || alamat_perusahaan == "" || logo_perusahaan == "" || username == "" || password == "" || confirm_password == "") {
        alert("Harap lengkapi semua kolom Info Perusahaan terlebih dahulu.");
        return; // Menghentikan fungsi jika ada kolom yang kosong
    }
    // Lakukan validasi data (opsional)

    // Kirim data ke server (Anda bisa menggunakan AJAX atau mengubah action formulir)
    // Anda juga perlu memasukkan validasi di sisi server
    // atau mengirimkan request AJAX untuk memvalidasi data

    // Contoh: Mengubah action formulir dan submit formulir
    document.getElementById("form-info-login").action = "register.php";
    document.getElementById("form-info-login").submit() ;
}


// Fungsi untuk memproses login
function hasil(event) {
    event.preventDefault(); // Mencegah form untuk dikirim

    // Lakukan logika login di sini
    // Anda dapat menggunakan AJAX untuk mengirim data login ke server dan menerima respons

    // Contoh sederhana
    var username = document.getElementById("log-username").value;
    var password = document.getElementById("log-password").value;

    // Lakukan validasi username dan password di sini
    if (username === "admin" && password === "admin") {
        alert("Login berhasil!");
        exit(); // Tutup form login
    } else {
        alert("Login gagal. Silakan coba lagi.");
    }
}

function mendaftar() {
    // Ambil nilai dari semua input
    var nama_perusahaan = document.getElementsByName("nama_perusahaan")[0].value;
    var industri = document.getElementsByName("industri")[0].value;
    var deskripsi_perusahaan = document.getElementsByName("deskripsi_perusahaan")[0].value;
    var media_sosial = document.getElementsByName("media_sosial")[0].value;
    var website = document.getElementsByName("website")[0].value;
    var alamat_perusahaan = document.getElementsByName("alamat_perusahaan")[0].value;
    var logo_perusahaan = document.getElementsByName("logo_perusahaan")[0].value;
    var username = document.getElementsByName("username")[0].value;
    var password = document.getElementsByName("password")[0].value;

    // Periksa apakah semua kolom sudah terisi
    if (nama_perusahaan === "" || industri === "" || deskripsi_perusahaan === "" || media_sosial === "" || website === "" || alamat_perusahaan === "" || logo_perusahaan === "" || username === "" || password === "") {
        alert("Silakan isi semua kolom sebelum mendaftar!");
        return false; // Mencegah pengiriman formulir jika ada kolom yang kosong
    }

    // Jika semua kolom terisi, formulir akan dikirim
    return true;
}

// Fungsi untuk menampilkan form login
function kelogin() {
    document.getElementById("log").style.display = "block";
    document.getElementById("masking").style.display = "block";
}

// Fungsi untuk menutup form login
function exit() {
    document.getElementById("log").style.display = "none";
    document.getElementById("masking").style.display = "none";
}

// Fungsi untuk memvalidasi password pada form pendaftaran
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
        alert("Konfirmasi password tidak cocok.");
        return false;
    }

    return true;
}
// Fungsi untuk memvalidasi formulir pendaftaran
function validateRegistrationForm() {
    var nama_perusahaan = document.getElementById("nama_perusahaan").value;
    var industri = document.getElementById("industri").value;
    var deskripsi_perusahaan = document.getElementById("deskripsi_perusahaan").value;
    var media_sosial = document.getElementById("media_sosial").value;
    var website = document.getElementById("website").value;
    var alamat_perusahaan = document.getElementById("alamat_perusahaan").value;
    var logo_perusahaan = document.getElementById("logo_perusahaan").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    // Validasi apakah semua kolom telah diisi
    if (nama_perusahaan == "" || industri == "" || deskripsi_perusahaan == "" || media_sosial == "" || website == "" || alamat_perusahaan == "" || logo_perusahaan == "" || username == "" || password == "" || confirm_password == "") {
        alert("Harap lengkapi semua kolom yang ada.");
        return false;
    }

    // Validasi apakah password dan konfirmasi password cocok
    if (password !== confirm_password) {
        alert("Konfirmasi password tidak cocok.");
        return false;
    }

    // Validasi panjang password minimal 8 karakter
    if (password.length < 8) {
        alert("Password harus terdiri dari minimal 8 karakter.");
        return false;
    }

    // Validasi username hanya mengandung huruf, angka, dan underscore
    var usernameRegex = /^[a-zA-Z0-9_]+$/;
    if (!usernameRegex.test(username)) {
        alert("Username hanya boleh mengandung huruf, angka, dan underscore.");
        return false;
    }

    // Validasi tambahan lainnya bisa ditambahkan di sini

    return true;
}
// fungsi NAVBAR
function keevent() {
    window.location.href = "dashboardEvent.php";
}

function kehome() {
    window.location.href = "Dashboard.php";
}

function kegrafik() {
    window.location.href = "grafik1.php";
}

