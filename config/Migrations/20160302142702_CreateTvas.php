<?php
use Migrations\AbstractMigration;

class CreateTvas extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('tvas');
        $table->addColumn('taux', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
