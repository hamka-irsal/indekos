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
        
    }
    // {
    //     $kostNames = [
    //         "Kost Bersama",
    //         "Kost Gembira",
    //         "Kost Harmoni",
    //         "Kost Inspirasi",
    //         "Kost Jelita",
    //         "Kost Karya",
    //         "Kost Lestari",
    //         "Kost Mewah",
    //         "Kost Nagari",
    //         "Kost One",
    //         "Kost Permata",
    //         "Kost Qlassic",
    //         "Kost Rasa",
    //         "Kost Sentosa",
    //         "Kost Terang",
    //         "Kost Unik",
    //         "Kost Vista",
    //         "Kost Warna",
    //         "Kost Xtra",
    //         "Kost Yasmin",
    //         "Kost Zest",
    //         "Kost Aman",
    //         "Kost Bagus",
    //         "Kost Ceria",
    //         "Kost Damai",
    //         "Kost Elegant",
    //         "Kost Fenomena",
    //         "Kost Gardenia",
    //         "Kost Harmoni",
    //         "Kost Iris",
    //         "Kost Jaz",
    //         "Kost Kita",
    //         "Kost Luminosa",
    //         "Kost Mascot",
    //         "Kost Nusa",
    //         "Kost Optima",
    //         "Kost Pandawa",
    //         "Kost Qris",
    //         "Kost Rasa",
    //         "Kost Sukses",
    //         "Kost Terang",
    //         "Kost Ubud",
    //         "Kost Vibrant",
    //         "Kost Wiranta",
    //         "Kost Xenia",
    //         "Kost Yasmin",
    //         "Kost Zamrud",
    //         "Kost Edelweis",
    //         "Kost Puspa",
    //         "Kost Elite 51"
    //     ];

    //     $kosts = [];

    //     for ($i = 0; $i < 50; $i++) {
    //         $kost = [
    //             "nama_kost" =>  $kostNames[$i],
    //             "alamat" => "Jl Tamanlanrea Lorong " . ($i + 1),
    //             "deskripsi" => "Kost " . $kostNames[$i] . ", murah, aman dan terjangkau dengan fasilitas lengkap",
    //             "harga" => rand(100000, 500000),
    //             "updated_at" => date('Y-m-d H:i:s'),
    //         ];

    //         $kosts[] = $kost;
    //     }

    //     foreach ($kosts as $kost) {
    //         $this->table('kost')->insert($kost)
    //             ->save();
    //     }
    
    // }
}
