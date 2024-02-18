<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Kost extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('kost');
        $table->addColumn('nama_kost', 'string');
        $table->addColumn('alamat', 'text');
        $table->addColumn('deskripsi', 'text');
        $table->addColumn('harga_tiket', 'integer');
        $table->addColumn('latitude', 'string');
        $table->addColumn('longitude', 'string');
        $table->addColumn('updated_at', 'datetime', ['null' => true]);
        $table->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP']);
        $table->create();
    }
}
