<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gönderilen Veriler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tablo stilleri */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Gönderilen Veriler</h2>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>İsim</th>
                    <th>Email</th>
                    <th>Başlık</th>
                    <th>Mesaj</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
// Veritabanı bağlantısı bilgileri
$servername = "localhost";
$username = "root"; // XAMPP'ın varsayılan kullanıcı adı
$password = ""; // XAMPP'ın varsayılan şifresi (boş)
$dbname = "bana_ulasin"; // Veritabanı adı
$table = "users";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

// Formdan gelen verileri al
$isim = isset($_POST['isim']) ? $_POST['isim'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$baslik = isset($_POST['baslik']) ? $_POST['baslik'] : '';
$mesaj = isset($_POST['mesaj']) ? $_POST['mesaj'] : '';


// SQL sorgusu ile veritabanına veri ekle
$sql = "INSERT INTO $table (isim, email, baslik, mesaj) VALUES ('$isim', '$email', '$baslik', '$mesaj')";

if ($conn->query($sql) === TRUE) {
    echo "Bilgileriniz başarıyla kaydedildi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Tüm kayıtları al
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

// Alınan verileri tablo halinde göster
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["isim"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>" . $row["baslik"]. "</td>
                <td>" . $row["mesaj"]. "</td>
              </tr>";
    }
} else {
    echo "Kayıt bulunamadı.";
}

// Veritabanı bağlantısını kapat
$conn->close();

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>




