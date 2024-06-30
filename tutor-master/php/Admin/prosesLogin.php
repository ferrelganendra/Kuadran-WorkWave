<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include 'koneksi.php';

// Check if form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['log-username'];
    $password = $_POST['log-password'];

    // Check if username and password are not empty
    if (!empty($username) && !empty($password)) {
        // Prepare and bind
        $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user_data = $result->fetch_assoc();
            $status = $user_data['status'];

            // Check user status
            if ($status == 'diterima') {
                // Set session
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_data['id']; // Store user ID in session

                // SweetAlert script
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js'></script>";
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire({
                            title: 'Success!',
                            text: 'Jangan lupa menambahkan Logo Perusahaan ya !',
                            icon: 'success',
                            confirmButtonText: 'OK'
                          }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href = '../../profil.php?status=diterima';
                            }
                          });
                        });
                      </script>";
                exit();
            } elseif ($status == 'menunggu') {
                // Alert 1 "menunggu"
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire({
                            title: 'Info',
                            text: 'Akun Anda sedang dalam proses verifikasi admin. Harap tunggu konfirmasi dari admin.',
                            icon: 'info',
                            confirmButtonText: 'OK'
                          }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href = '../../login.php';
                            }
                          });
                        });
                      </script>";
                exit();
            } elseif ($status == 'ditolak') {
                // Alert 2 "ditolak"
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire({
                            title: 'Error',
                            text: 'Akun Anda tidak lolos verifikasi admin. Silakan hubungi admin untuk informasi lebih lanjut.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                          }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href = '../../login.php';
                            }
                          });
                        });
                      </script>";
                exit();
            }
        } else {
            // Alert 3
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                      Swal.fire({
                        title: 'Error',
                        text: 'Username dan password salah!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = '../../login.php';
                        }
                      });
                    });
                  </script>";
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        // Alert 4
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                    title: 'Error',
                    text: 'Username atau password tidak boleh kosong.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = '../../login.php';
                    }
                  });
                });
              </script>";
        exit();
    }
}

// Tutup koneksi
$koneksi->close();
?>
