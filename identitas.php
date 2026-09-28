<?php

interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    protected float $ipk;
    private int $semester;

    public function __construct(
        string $nim,
        string $nama,
        float $ipk,
        int $semester
    ) {
        $this->nim = $nim;
        $this->nama = $nama;

        if ($semester < 1 || $semester > 14) {
            throw new InvalidArgumentException(
                'Semester harus 1 sampai 14.'
            );
        }

        $this->semester = $semester;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus 0 sampai 4.'
            );
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string
    {
        return $this->nim .
            ' - ' .
            $this->nama .
            ' - Semester: ' .
            $this->semester .
            ' - IPK: ' .
            $this->ipk .
            ' - Predikat: ' .
            $this->predikat();
    }

    private function predikat(): string
    {
        if ($this->ipk >= 3.50) {
            return 'Sangat Memuaskan';
        }

        if ($this->ipk >= 3.00) {
            return 'Memuaskan';
        }

        return 'Perlu Peningkatan';
    }
}

$mhs = new Mahasiswa(
    '2026001',
    'Andi Pratama',
    3.75,
    2
);

echo $mhs->ringkasan();