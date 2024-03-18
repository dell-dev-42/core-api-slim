<?php

declare(strict_types=1);

use Phoenix\Database\Element\Index;
use Phoenix\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('users')
        ->addColumn('id', 'integer', ['autoincrement' => true])
        ->addColumn('name', 'string')
        ->addColumn('email', 'string')
        ->addColumn('password', 'string')
        ->addColumn('created_at', 'datetime')
        ->addColumn('updated_at', 'datetime')
        ->addIndex('email', Index::TYPE_UNIQUE)
        ->create();
    }

    protected function down(): void
    {
        $this->table('users')->drop();
    }
}
