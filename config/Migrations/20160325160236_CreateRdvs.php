<?php
use Migrations\AbstractMigration;

class CreateRdvs extends AbstractMigration
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
        $table = $this->table('rdvs');

        $table->addColumn('preparateur_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('client_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('vehicule_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('prestation_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('duree', 'time', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('debut', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('fin', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('lat', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('lon', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('etat', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->create();
    }
}
