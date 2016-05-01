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
    $this->loadModel('Users');
    $this->loadModel('Adresses');
    $this->loadModel('Horraires');
    $this->loadComponent('Flash');
    $this->loadComponent('Chris48s/Geocoder.Geocoder');
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

    public function edit($id = null) /*EDITION PREPARATEUR */
    {
        $preparateur = $this->Preparateurs->get($id, [
            'contain' => []
        ]);


        /*MENU DEROULANT POUR LES SOCIETE*/
        $this->set('societys', $this->Preparateurs->Societys->find('list'));
        /*MENU DEROULANT POUR LES Prestations*/
        $this->set('prestations', $this->Preparateurs->Prestations->find('list'));

        /*RECUPERATION TABLEAU HORRAIRES DU POINT DE VENTE*/
        $this->set('horraires', $this->Preparateurs->Horraires->find('all')->where(['Preparateurs.id' => $id])->contain(['Preparateurs'])->first());
        $this->set('_serialize', ['horraires']);
        /*FIN RECUPERATION TABLEAU HORRAIRES DU POINT DE VENTE*/

        $preparateur->prestation_id = unserialize($preparateur->prestation_id) ;

         /*SOUMISSION FORMULAIRE*/
        if ($this->request->is(['patch', 'post', 'put'])) {

          /*RECUPERATION DES PRESTATIONS SERIALIZE TABLEAU*/
            $this->request->data['prestation_id'] = serialize($this->request->data['prestation_id']) ;

            $preparateur = $this->Preparateurs->patchEntity($preparateur, $this->request->data);
            if ($this->Preparateurs->save($preparateur)) {

              /*RECUPERATION LAT LONG*/
              $address = $preparateur->cp.' '.$preparateur->ville.' '.$preparateur->adresse;

              $geocodeResult = $this->Geocoder->geocode($address);

              if (count($geocodeResult) > 0) {
                  $latitude = floatval($geocodeResult[0]->geometry->location->lat);
                  $longitude = floatval($geocodeResult[0]->geometry->location->lng);
              }
              /*FIN RECUPERATION LAT LONG*/


              /*MODIFICATION DE L UTILISATEUR DANS LA BASE ADRESSE */
              $adressesTable = TableRegistry::get('Adresses');
              $adresse = $adressesTable->find('all')->where(['Preparateurs.id' => $id])->contain(['Preparateurs'])->first();

             $adresse->preparateur_id = $preparateur->id ;
             $adresse->rayon = $preparateur->rayon ;
             $adresse->lat = $latitude ;
             $adresse->lon = $longitude ;

             if ($adressesTable->save($adresse)) {  }

               /*MODIFICATION DE L UTILISATEUR DANS LA BASE HORRAIRES */
             $horrairesTable = TableRegistry::get('Horraires');
             $horraire = $horrairesTable->find('all')->where(['Preparateurs.id' => $id])->contain(['Preparateurs'])->first();

             $horraire->preparateur_id = $preparateur->id ;

             $horraire->lm1  = $preparateur->lm1 ;
             $horraire->lm2  = $preparateur->lm2 ;
             $horraire->la1  = $preparateur->la1 ;
             $horraire->la2  = $preparateur->la2 ;

             $horraire->mm1  = $preparateur->mm1 ;
             $horraire->mm2  = $preparateur->mm2 ;
             $horraire->ma1  = $preparateur->ma1 ;
             $horraire->ma2  = $preparateur->ma2 ;

             $horraire->mem1 = $preparateur->mem1 ;
             $horraire->mem2 = $preparateur->mem2 ;
             $horraire->mea1 = $preparateur->mea1 ;
             $horraire->mea2 = $preparateur->mea2 ;

             $horraire->jm1  = $preparateur->jm1 ;
             $horraire->jm2  = $preparateur->jm2 ;
             $horraire->ja1  = $preparateur->ja1 ;
             $horraire->ja2  = $preparateur->ja2 ;

             $horraire->vm1  = $preparateur->vm1 ;
             $horraire->vm2  = $preparateur->vm2 ;
             $horraire->va1  = $preparateur->va1 ;
             $horraire->va2  = $preparateur->va2 ;

             $horraire->sm1  = $preparateur->sm1 ;
             $horraire->sm2  = $preparateur->sm2 ;
             $horraire->sa1  = $preparateur->sa1 ;
             $horraire->sa2  = $preparateur->sa2 ;

             $horraire->dm1  = $preparateur->dm1 ;
             $horraire->dm2  = $preparateur->dm2 ;
             $horraire->da1  = $preparateur->da1 ;
             $horraire->da2  = $preparateur->da2 ;

             if ($horrairesTable->save($horraire)) {}

             if ($preparateur->passwordre != ''   ): /*MISE A JOUR TABLE USERS SI MOT DE PASSE EST PRESENTS*/

               $userrecups = $this->Users->find('all')
               ->where(['preparateur_id =' => $preparateur->id ]);

               foreach ($userrecups as $userrecup) {
               $id_user = $userrecup->id ;
               }

               $userstable      = TableRegistry::get('Users');
               $users           = $userstable->get($id_user);
               $users->password = $preparateur->passwordre;

               $userstable->save($users);

             endif;                              /*FIN MISE A JOUR TABLE USERS SI MOT DE PASSE EST PRESENTS*/


                $this->Flash->success(__('Le point de vente a bien été mise à jour.'));
                return $this->redirect(['action' => 'index']);
            }

            else {
                $this->Flash->error(__('The preparateur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('preparateur'));
        $this->set('_serialize', ['preparateur']);
    } /* FIN EDITION PREPARATEUR PAR LA SOCIETE */

    public function pointdevente()
    {

      $id_societys = $this->Societys->find('all')
      ->where(['mail =' => $this->Auth->User('username') ]);

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
      ->where(['mail =' => $this->Auth->User('username') ]);

      foreach ($id_societys as $id_society) {
      $id_society_rec = $id_society->id ;
      $taux = $id_society->taux_comission ;
      }

      /*RDV MOIS COURANT*/
      $pointdeventes = $this->Preparateurs->find('all')
      ->where(['society_id =' => $id_society_rec ]);
      $sommestotalwashersfinal = 0 ; /*INITIALISATION DU MONTANT TOTAL DES WASHERS*/
      $sommestotalwashersfinaln1 = 0 ;
      $sommestotalwashersfinalmois = 0;

      foreach ($pointdeventes as $pointdevente) {
        $sommestotalwashers = $this->Paiements->find('all')
        ->where(['preparateur_id =' => $pointdevente->id ]);
        $sommestotalwashersfinal = $sommestotalwashersfinal + $sommestotalwashers->sumOf('montant');
      }

      $dated =  date("Y")."-".date("m")."-01";
      $datef =  date("Y")."-".date("m")."-31";

      foreach ($pointdeventes as $pointdevente) {
        $sommestotalwashers = $this->Paiements->find('all')
        ->where(['preparateur_id =' => $pointdevente->id ])
        ->where(['date >=' => $dated ])
        ->where(['date <=' => $datef ]);
        $sommestotalwashersfinalmois = $sommestotalwashersfinalmois + $sommestotalwashers->sumOf('montant');
      }

      $anne = date("Y") - 1 ;
      $dated =  $anne."-01-01";
      $datef =  $anne."-12-31";

      foreach ($pointdeventes as $pointdevente) {
        $sommestotalwashers = $this->Paiements->find('all')
        ->where(['preparateur_id =' => $pointdevente->id ])
        ->where(['date >=' => $dated ])
        ->where(['date <=' => $datef ]);
        $sommestotalwashersfinaln1 = $sommestotalwashersfinaln1 + $sommestotalwashers->sumOf('montant');
      }

     /*CALCUL DU TAUX DE REVESERMENT*/
      $tauxtotal = ($taux * $sommestotalwashersfinal) / 100;
      /*FINCALCUL DU TAUX DE REVESERMENT*/



      $this->set('sommestotalwashersfinal', $sommestotalwashersfinal);
      $this->set('sommestotalwashersfinalmois', $sommestotalwashersfinalmois);
      $this->set('sommestotalwashersfinaln1', $sommestotalwashersfinaln1);
      $this->set('pointdeventes', $pointdeventes);
      $this->set('taux', $taux);
      $this->set('tauxtotal', $tauxtotal);

    }

}
