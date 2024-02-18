<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class RecomendationsTableSeeder extends AbstractSeed
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
                "kost_id" => 1,
                "rating" => 5,
                "nama" => "Muhammad Bintang",
                "ulasan" => "bagus tawwa kostnya, mantap!!!",
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "kost_id" => 2,
                "rating" => 3,
                "nama" => "Fery",
                "ulasan" => "Murah, tapi agak kotor lantainya",
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "kost_id" => 3,
                "rating" => 5,
                "nama" => "Salim Abduh",
                "ulasan" => "Mantap!!",
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "kost_id" => 4,
                "rating" => 5,
                "nama" => "Nanohosi",
                "ulasan" => "Sughoii!!, ini mhi kost yang saya cari-cari",
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "kost_id" => 8,
                "rating" => 5,
                "nama" => "Abduh",
                "ulasan" => "Gila!!, bagus sekali kostnya, tapi agak mahal ki",
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "kost_id" => 9,
                "rating" => 5,
                "nama" => "Muhammad Abduh",
                "ulasan" => "Bagus, sama murah juga",
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "kost_id" => 10,
                "rating" => 5,
                "nama" => "Kentaro",
                "ulasan" => "Nyaman kostnya, bersih juga!!",
                "updated_at" => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($items as $item) {
            $recomendation = $this->table('recomendations');
            $recomendation->insert($item);
            $recomendation->save();
        }
    }
}
