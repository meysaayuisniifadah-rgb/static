<?php

class Matematika {
    public static function kali($a, $b) {
        return $a * $b;
    }

    public static function bagi($a, $b) {
        return $a / $b;
    }

    
    public static function luasPersegi($sisi) {
        return $sisi * $sisi;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Static Method</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            padding: 30px;
            width: 320px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            animation: fadeIn 0.6s ease-in-out;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e293b;
        }

        label {
            font-size: 14px;
            color: #475569;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #cbd5f5;
            border-radius: 8px;
            outline: none;
        }

        input:focus {
            border-color: #6366f1;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #6366f1;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #4f46e5;
        }

        .hasil {
            margin-top: 20px;
            padding: 12px;
            border-radius: 10px;
            background: #eef2ff;
            color: #1e293b;
            font-size: 14px;
        }

        .hasil strong {
            color: #4f46e5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h3> Kalkulator Sederhana</h3>

    <form method="POST">
        <label>Nilai A</label>
        <input type="number" name="a" required>

        <label>Nilai B</label>
        <input type="number" name="b" required>

       
        <label>Sisi</label>
        <input type="number" name="sisi">

        <button type="submit">Hitung</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $sisi = $_POST['sisi'] ?? 0; // FIX ERROR

        echo "<div class='hasil'>";
        echo "<strong>Hasil Perhitungan:</strong><br><br>";
        echo " Kali: " . Matematika::kali($a, $b) . "<br>";

        if ($b != 0) {
            echo " Bagi: " . Matematika::bagi($a, $b) . "<br>";
        } else {
            echo " Tidak bisa dibagi 0<br>";
        }

        
        echo " Luas Persegi: " . Matematika::luasPersegi($sisi);

        echo "</div>";
    }
    ?>
</div>

</body>
</html>