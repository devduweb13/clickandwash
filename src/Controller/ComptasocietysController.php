<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class comptasocietysController extends AppController
{

  public function initialize()
  {

    $this->loadModel('Preparateurs');
    $this->loadModel('Societys');
    $this->loadModel('Paiements');
    $this->loadComponent('Flash');
      parent::initialize();


  }

/*PROTECTION DES ACCES UNIQUEMENT ADMIN !!!!!!!!!!!!!!! */
  public function isAuthorized($user)
  {
      // Admin peuvent accéder à chaque action
      if (isset($user['role']) && $user['role'] === 'societe') {
          return true;
      }

      // Par défaut refuser
      return false;
  }
/*PROTECTION DES ACCES UNIQUEMENT ADMIN !!!!!!!!!!!!!!! */

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

    }
    public function pointdevente()
    {

      $id_societys = $this->Societys->find('all')
      ->where(['name =' => $this->Auth->User('username') ]);

foreach ($id_societys as $id_society) {
$id_society = $id_society->id ;
}

      /*RDV MOIS COURANT*/
      $pointdeventes = $this->Preparateurs->find('all')
      ->where(['society_id =' => $id_society ]);
      $pointdeventeNb = $pointdeventes->count();
      $this->set('pointdevente', $pointdeventeNb);
      $this->set('pointdeventes', $pointdeventes);
    }
    public function moncompte()
    {

    }
    public function compta()
    {
      $id_societys = $this->Societys->find('all')
      ->where(['name =' => $this->Auth->User('username') ]);

      foreach ($id_societys as $id_society) {
      $id_society = $id_society->id ;
      }

      /*RDV MOIS COURANT*/
      $pointdeventes = $this->Preparateurs->find('all')
      ->where(['society_id =' => $id_society ]);

      foreach ($pointdeventes as $pointdevente) {
        $sommestotalwashers = $this->Paiements->find('all')
        ->where(['preparateur_id =' => $pointdevente->id ]);
        $sommestotalwashers = $sommestotalwashers->sumOf('montant');
      }

      $this->set('sommestotalwashers', $sommestotalwashers);
      $this->set('pointdeventes', $pointdeventes);

    }

}
