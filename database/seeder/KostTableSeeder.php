<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class KostTableSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $items = [
            [
                "nama_kost" => "Kost Permata Indah",
                "alamat" => "Jl Tamanlanrea Lorong 1",
                "deskripsi" => "Kost murah, aman dan terjangkau dengan fasilitas lengkap",
                "harga" => 200000,
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "nama_kost" => "Kost Permai Tamanlanrea",
                "alamat" => "Jl Tamanlanrea Lorong 2",
                "deskripsi" => "Singahki, di kost permai tamanlanrea, murahki dan nayaman",
                "harga" => 250000,
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "nama_kost" => "Mami Kost",
                "alamat" => "Jl Tamanlanrea Lorong 3",
                "deskripsi" => "Kost Terbaik, murah dan aman",
                "harga" => 250000,
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "nama_kost" => "Papa Kost",
                "alamat" => "Jl Tamanlanrea Lorong Kiri 3",
                "deskripsi" => "Kost paling aman di tamanlanrea",
                "harga" => 250000,
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "nama_kost" => "Kost Murah",
                "alamat" => "Jl Tamanlanrea Lorong Kiri 4",
                "deskripsi" => "Kost terdepan untuk mahasiswa",
                "harga" => 350000,
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "nama_kost" => "Kost Hidayat",
                "alamat" => "Jl Tamanlanrea Lorong Kiri 6",
                "deskripsi" => "Kost paling murah di makassar",
                "harga" => 100000,
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "nama_kost" => "Kost Hidayat",
                "alamat" => "Jl Tamanlanrea Lorong Kiri 6",
                "deskripsi" => "Kost paling murah di makassar",
                "harga" => 100000,
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "nama_kost" => "Kost Fery",
                "alamat" => "Jl Tamanlanrea Lorong Kiri 6",
                "deskripsi" => "Menerima kost untuk wanita",
                "harga" => 300000,
                "updated_at" => date('Y-m-d H:i:s'),
            ]
        ];

        foreach ($items as $item) {
            $kost = $this->table('kost');
            $kost->insert($item)
                ->save();
        }
    }
}
