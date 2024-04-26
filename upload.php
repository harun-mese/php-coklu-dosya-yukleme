<?php

// Dosyaların yükleneceği dizin
$upload_dir = "uploads/";

// Eğer uploads dizini yoksa oluştur
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Yüklenen dosyaların sayısı
$file_count = count($_FILES['files']['name']);

// Tüm dosyaları tek tek işle
for ($i = 0; $i < $file_count; $i++) {
    $file_name = $_FILES['files']['name'][$i];
    $file_tmp = $_FILES['files']['tmp_name'][$i];
    $file_type = $_FILES['files']['type'][$i];
    $file_size = $_FILES['files']['size'][$i];
    $file_error = $_FILES['files']['error'][$i];

    // Dosya yolunu oluştur
    $file_path = $upload_dir . $file_name;

    // Dosyayı belirlenen yola taşı
    if (move_uploaded_file($file_tmp, $file_path)) {
        echo "Dosya başarıyla yüklendi: $file_name <br>";
    } else {
        echo "Dosya yüklenirken bir hata oluştu: $file_name <br>";
    }
}
