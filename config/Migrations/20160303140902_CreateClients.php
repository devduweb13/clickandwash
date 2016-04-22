<?php
use Migrations\AbstractMigration;

class CreateClients extends AbstractMigration
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
        $table = $this->table('clients');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('prenom', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('vehiculeclient_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('adresseclient_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('mail', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('tel', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ]);
        $table->addIndex([
            'mail',
        ], [
            'name' => 'EMAIL_INDEX',
            'unique' => true,
        ]);
        $table->create();
    }
}
