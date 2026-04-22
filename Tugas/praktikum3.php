<?php
class Produk {

    public static $jumlahProduk = 0;

    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function tambahProduk() {
        self::$jumlahProduk++;
    }
}

class Transaksi {

    final public function prosesTransaksi($produk) {
        $total = 0;

        foreach ($produk as $p) {
            $total += $p->harga;
        }

        return $total;
    }
}


$p1 = new Produk("Buku", 10000);
$p1->tambahProduk();

$p2 = new Produk("Pulpen", 5000);
$p2->tambahProduk();

$p3 = new Produk("Tas", 50000);
$p3->tambahProduk();

$produkList = [$p1, $p2, $p3];


$t = new Transaksi();
$totalBayar = $t->prosesTransaksi($produkList);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Final Class</title>

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
            width: 360px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            animation: fadeIn 0.6s ease;
        }

        h3 {
            text-align: center;
            margin-bottom: 8px;
            color: #1e293b;
            font-size: 22px;
        }

        .total {
            text-align: center;
            margin-bottom: 20px;
            color: #64748b;
            font-size: 14px;
        }

        .box {
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            padding: 18px;
            border-radius: 15px;
        }

        .box strong {
            display: block;
            margin-bottom: 10px;
            color: #4338ca;
        }

        .box p {
            margin: 8px 0;
            padding: 8px 10px;
            background: white;
            border-radius: 8px;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        hr {
            margin: 12px 0;
            border: none;
            border-top: 1px dashed #a5b4fc;
        }

        .total-bayar {
            text-align: right;
            font-weight: 600;
            font-size: 16px;
            color: #4f46e5;
        }

        .total-bayar span {
            display: block;
            font-size: 13px;
            color: #64748b;
            font-weight: normal;
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
    <h3> Sistem Produk</h3>

    <div class="total">
        Total Produk: <?php echo Produk::$jumlahProduk; ?>
    </div>

    <div class="box">
        <strong>Daftar Produk</strong>

        <?php foreach ($produkList as $p): ?>
            <p> <?php echo $p->nama . " - Rp" . $p->harga; ?></p>
        <?php endforeach; ?>

        <hr>

        <div class="total-bayar">
            <span>Total Bayar</span>
            Rp<?php echo $totalBayar; ?>
        </div>
    </div>
</div>

</body>
</html>