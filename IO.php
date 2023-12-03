<?php
$pilihan = '';
$jenis_k = '';
$nama = '';
$usia = '';
$berat_badan = '';
$tinggi_badan = '';
$bmi = '';
$bmr_pria = '';
$bmr_wanita = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jenis_k = $_POST["jenis_k"];
    $usia = $_POST["usia"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];

    $bmi = $berat_badan / (($tinggi_badan / 100) * ($tinggi_badan / 100));
    $bmr_pria = 88.362 + (13.397 * $berat_badan) + (4.799 * $tinggi_badan) - (5.677 * $usia);
    $bmr_wanita = 447.593 + (9.247 * $berat_badan) + (3.098 * $tinggi_badan) - (4.330 * $usia);

    echo "<div style='text-align: center;'>";
    echo "<h1>Hasil BMI Calculator</h1>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Usia: $usia</p>";
    echo "<p>Berat Badan: $berat_badan kg</p>";
    echo "<p>Tinggi Badan: $tinggi_badan cm</p>";
    echo "<p>BMI Anda: $bmi</p>";

    if ($bmi < 18.5) {
        echo "<p>Anda termasuk kategori kurus.</p>";
        echo "<p>Kebutuhan dasar kalori harian anda: " . ($jenis_k == '1' ? $bmr_pria : $bmr_wanita) . "</p>";
        echo "<p>Apakah anda ingin menaikan massa otot?</p>";
        echo "<form method='post' action='result.php'> 
                <input type='radio' name='pilihan' value='y'> Ya 
                <input type='radio' name='pilihan' value='n'> Tidak 
                <input type='submit' value='Submit'> 
              </form>";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        echo "<p>Anda termasuk kategori normal atau sehat.</p>";
        echo "<p>Kebutuhan dasar kalori harian anda: " . ($jenis_k == '1' ? $bmr_pria : $bmr_wanita) . "</p>";
    } else {
        echo "<p>Anda termasuk kategori gendut.</p>";
        echo "<p>Kebutuhan dasar kalori harian anda: " . ($jenis_k == '1' ? $bmr_pria : $bmr_wanita) . "</p>";
    }

    echo "</div>";
}
?>
