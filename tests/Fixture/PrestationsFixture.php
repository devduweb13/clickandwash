<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrestationsFixture
 *
 */
class PrestationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nom' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'tarif1' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'tarif2' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'tarif3' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'duree1' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'duree2' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'duree3' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'nom' => 'Lorem ipsum dolor sit amet',
            'tarif1' => 1,
            'tarif2' => 1,
            'tarif3' => 1,
            'duree1' => '15:23:34',
            'duree2' => '15:23:34',
            'duree3' => '15:23:34',
            'description' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
