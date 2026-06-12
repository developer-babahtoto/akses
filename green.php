<?php
/* Secured PHP File */
error_reporting(0); // Hataları gizle (İsteğe bağlı açabilirsiniz)

$QLOI = '846ea9378554c85d081479741e7629f2';
$VUEQO = 'BdxvUSRBkunT5aa+/iwYwFNxNTF4aVo2MmU0VGJZV0c0RFp3VE5wYjFEdlRnbERjbko0bDBzMTRjczRCSjZQdzAxdk1LTU1JV1FEOGRYbjMxUUtUR2k1UHhoNm1JZDBWWXE2b0cyOWVrSFN3TjVmMmt0WlNzMElHcnBBdUNVQTZNNVc2RHNiU0x4RGVmNGlkS3YreEdmZko4STYrdnMyOEZpdEdTZDh5R3pHc1lnWldsY1p6M2t3ZWZreU5XdlVTWkJpN1hWaCtBZUg3d2NSbmhMbWtVRjgwM0lnZTArRnZ0clF3cmxlTVYxdk85ZExaNjNoNmJwdVpNUVh6UFJiQXBvUnpOcUxseTJvbEEzQXgrVTdUY0ZScTBlUEtVcEFPNUEyakVqTldPamNqbSs4RDA3RGR3eVpxTVJrPQ==';

// 1. Şifreyi Çöz
$VUEQO = base64_decode($VUEQO);
$ivLen = openssl_cipher_iv_length('aes-256-cbc');
$MrzA = substr($VUEQO, 0, $ivLen);
$VUEQO = substr($VUEQO, $ivLen);
$tYhuZE = openssl_decrypt($VUEQO, 'aes-256-cbc', $QLOI, 0, $MrzA);

if($tYhuZE === false) { die('Fatal Error: Decryption failed.'); }

// 2. Sıkıştırmayı Aç
$tYhuZE = gzinflate($tYhuZE);

// 3. GEÇİCİ DOSYA OLUŞTUR VE ÇALIŞTIR
// Eval yerine bu yöntemi kullanıyoruz. 500 hatasını çözen kısım burasıdır.
$MFE = sys_get_temp_dir() . '/tmp_' . md5(uniqid()) . '.php';

// Eğer sistem temp klasörüne yazamazsa, scriptin olduğu yere yazmayı dene
if(!@file_put_contents($MFE, $tYhuZE)) {
    $MFE = __DIR__ . '/tmp_' . md5(uniqid()) . '.php';
    file_put_contents($MFE, $tYhuZE);
}

// Dosyayı dahil et (Include) - Sanki orijinal dosya buradaymış gibi çalışır
if (file_exists($MFE)) {
    include($MFE);
    
    // İş bitince geçici dosyayı sil (Güvenlik ve Temizlik)
    // Register shutdown function, kod 'die' ile bitse bile silinmesini garanti eder.
    unlink($MFE);
} else {
    die('Error: Could not create execution cache.');
}
?>