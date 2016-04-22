<?php
use Migrations\AbstractMigration;

class CreateHorraires extends AbstractMigration
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
        $table = $this->table('horraires');
        $table->addColumn('id_preparateur', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('lundi', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('mardi', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('mercredi', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('jeudi', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('vendredi', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('samedi', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('dimanche', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('heured', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('heuref', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->create();
    }
}
