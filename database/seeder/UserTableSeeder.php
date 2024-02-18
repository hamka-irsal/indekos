<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UserTableSeeder extends AbstractSeed
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
                'nama' => "Muhammad Bintang",
                'username' => "BintangKun",
                'email' => 'muhbintang650@gmail.com',
                'updated_at' =>  date('Y-m-d H:i:s'),
                'password' => password_hash('bintang123', PASSWORD_DEFAULT)
            ],
            [
                'nama' => "Fery Fadul",
                'username' => "FeryAdmin",
                'email' => 'feryfadul@gmail.com',
                'updated_at' =>  date('Y-m-d H:i:s'),
                'password' => password_hash('fery123', PASSWORD_DEFAULT)
            ],
            [
                'nama' => "Hamka",
                'username' => "HamkaAdmin",
                'email' => 'hamka@gmail.com',
                'updated_at' =>  date('Y-m-d H:i:s'),
                'password' => password_hash('hamka123', PASSWORD_DEFAULT)
            ],
        ];

        foreach ($items as $item) {
            $user = $this->table('users');
            $user->insert($item)
                ->save();
        }
    }
}
