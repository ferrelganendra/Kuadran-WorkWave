<?php
function getLokerDetails($koneksi) {
    $query = "SELECT l.id, l.posisi, l.tingkat_pendidikan, l.gender, l.status_kerja, l.besaran_gaji, l.lokasi_bekerja, l.syarat_pekerjaan, l.foto_loker, k.nama_kategori 
              FROM loker l
              JOIN kategori_pekerjaan k ON l.kategori_pekerjaan_id = k.id";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return[];
    }
}
?>