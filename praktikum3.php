<?php
class Produk {
    public static $jumlahProduk = 0;

    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
        self::$jumlahProduk++;
    }

    public function tampilkanProduk() {
        echo "Produk: {$this->nama} | Harga: Rp{$this->harga}<br>";
    }
}

class Transaksi {
    final public function prosesTransaksi($produkList) {
        $total = 0;
        echo "<h3>Daftar Transaksi:</h3>";

        foreach ($produkList as $produk) {
            echo "- {$produk->nama} (Rp{$produk->harga})<br>";
            $total += $produk->harga;
        }

        echo "<strong>Total Bayar: Rp{$total}</strong><br>";
        echo "Transaksi diproses.<br>";
    }
}

// Membuat minimal 3 produk
$p1 = new Produk("Laptop", 7000000);
$p2 = new Produk("Mouse", 150000);
$p3 = new Produk("Keyboard", 300000);

// Menampilkan Produk
echo "<h3>Daftar Produk:</h3>";
$p1->tampilkanProduk();
$p2->tampilkanProduk();
$p3->tampilkanProduk();

// Menampilkan total produk
echo "<br>Total Produk: " . Produk::$jumlahProduk . "<br><br>";

// Simulasi transaksi
$transaksi = new Transaksi();
$transaksi->prosesTransaksi([$p1, $p2, $p3]);

?>