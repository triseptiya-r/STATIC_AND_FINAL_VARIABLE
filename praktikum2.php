<?php

class Matematika {

    public static function tambah($a, $b) {
        return $a + $b;
    }

    public static function kurang($a, $b) {
        return $a - $b;
    }

    public static function kali($a, $b) {
        return $a * $b;
    }

    public static function bagi($a, $b) {
        return $b != 0 ? $a / $b : "Error (÷0)";
    }

    public static function luasPersegi($sisi) {
        return $sisi * $sisi;
    }
}

$hasil = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $sisi = $_POST['sisi'];

    $hasil = [
        "tambah" => Matematika::tambah($a, $b),
        "kurang" => Matematika::kurang($a, $b),
        "kali" => Matematika::kali($a, $b),
        "bagi" => Matematika::bagi($a, $b),
        "luas" => Matematika::luasPersegi($sisi)
    ];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Modern</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 340px;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            text-align: left;
            outline: none;
        }

        input:focus {
            border-color: #74ebd5;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #74ebd5;
            border: none;
            color: #333;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #4fd1c5;
        }

        .hasil {
            margin-top: 15px;
            background: #f6f6f6;
            padding: 12px;
            border-radius: 10px;
            text-align: left;
        }

        .hasil p {
            margin: 5px 0;
        }
    </style>

</head>
<body>

<div class="card">
    <h2>Kalkulator</h2>

    <form method="post">
        <input type="number" name="a" placeholder="Angka 1" required>
        <input type="number" name="b" placeholder="Angka 2" required>
        <input type="number" name="sisi" placeholder="Sisi Persegi" required>
        <button type="submit">Hitung</button>
    </form>

    <?php if ($hasil): ?>
        <div class="hasil">
            <p>➕ Tambah: <?= $hasil['tambah'] ?></p>
            <p>➖ Kurang: <?= $hasil['kurang'] ?></p>
            <p>✖️ Kali: <?= $hasil['kali'] ?></p>
            <p>➗ Bagi: <?= $hasil['bagi'] ?></p>
            <p>⬛ Luas Persegi: <?= $hasil['luas'] ?></p>
        </div>
    <?php endif; ?>

</div>

</body>
</html>