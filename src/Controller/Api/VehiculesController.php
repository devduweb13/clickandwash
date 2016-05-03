<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Preparateurs Controller
 *
 * @property \App\Model\Table\PreparateursTable $Preparateurs
 */
class VehiculesController extends AppController
{

  public function initialize()
  {

    $this->loadModel('Modeles');
    $this->loadModel('Marques');
    $this->loadModel('Annulationrdvs');
    parent::initialize();

  }

  public function listemarque()
  {
    $marques = $this->Marques->find('all');
    $this->set([
        'success' => true,
        'data' => [
        'Marques' => $marques
         ],
        '_serialize' => ['success', 'data']
    ]);
  }

  public function listemodele()
  {
    $modeles = $this->Modeles->find('all');
    $this->set([
        'success' => true,
        'data' => [
        'Modeles' => $modeles
         ],
        '_serialize' => ['success', 'data']
    ]);
  }



  public $paginate = [
         'page' => 1,
         'limit' => 10,
         'maxLimit' => 100

     ];
}
