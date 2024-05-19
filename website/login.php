<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // E-posta ve şifre alanlarını al
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Eğer e-posta alanı boşsa, kullanıcıya bir uyarı mesajı göster
    if (empty($email)) {
        echo "Lütfen e-posta adresinizi girin";
    } else {
        // Eğer e-posta alanı doluysa, giriş işlemini kontrol et
        if ($email === "G221210041@sakarya.edu.tr" && $password === "G221210041") {
            // Kullanıcı doğrulandıysa giriş başarılı mesajı göster
            echo "Giriş başarılı. Hoşgeldin " . $password;
        } else {
            // Kullanıcı adı veya şifre yanlışsa giriş başarısız mesajı göster
            echo "Kullanıcı e-postası veya şifre hatalı. Lütfen tekrar deneyin.";
        }
    }
}
?>
