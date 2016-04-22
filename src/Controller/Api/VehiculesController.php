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


      parent::initialize();

  }

  public $paginate = [
         'page' => 1,
         'limit' => 10,
         'maxLimit' => 100

     ];
}
