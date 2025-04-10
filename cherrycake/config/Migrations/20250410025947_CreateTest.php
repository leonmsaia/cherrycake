<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateTest extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('test');
        $table->addColumn('Array', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
