<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga,
        protected int $stok
    ) {
        if ($stok < 0) {
            throw new InvalidArgumentException(
                'Stok tidak boleh kurang dari 0.'
            );
        }
    }

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getStok(): int
    {
        return $this->stok;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        int $stok,
        private float $diskon
    ) {
        parent::__construct($nama, $harga, $stok);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000, 10),
    new ProdukDiskon('Mouse', 150000, 20, 10)
];

foreach ($daftar as $produk) {

    echo $produk->getNama() .
        ' Rp ' .
        number_format(
            $produk->hargaAkhir(),
            0,
            ',',
            '.'
        ) .
        ' | Stok: ' .
        $produk->getStok() .
        "<br>";
}