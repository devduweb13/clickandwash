<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Preparateurs Controller
 *
 * @property \App\Model\Table\PreparateursTable $Preparateurs
 */
class PreparateursController extends AppController
{

  public $paginate = [
      'limit' => 100,
      'order' => [
          'Preparateurs.nom' => 'asc'
      ]
  ];

  public function initialize()
  {
      parent::initialize();
      $this->loadComponent('Chris48s/Geocoder.Geocoder');
      $this->loadComponent('Flash');
      parent::initialize();
      $this->loadModel('Societys');
      $this->loadModel('Prestations');

  }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $preparateurs = $this->paginate($this->Preparateurs);
        $this->set(compact('preparateurs'));
        $this->set('_serialize', ['preparateurs']);

        /*RECUPERER NON SOCIETE */
        $societys = $this->set('societys', $this->Preparateurs->Societys->find('list', ['fields' => [ 'id','name']])->toArray());


    }

    /**
     * View method
     *
     * @param string|null $id Preparateur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $preparateur = $this->Preparateurs->get($id, [
            'contain' => []
        ]);

        $this->set('preparateur', $preparateur);
        $this->set('_serialize', ['preparateur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */




    public function add()
    {
        $preparateur = $this->Preparateurs->newEntity();

        /*MENU DEROULANT POUR LES SOCIETE*/
        $this->set('societys', $this->Preparateurs->Societys->find('list'));
        /*MENU DEROULANT POUR LES Prestations*/
        $this->set('prestations', $this->Preparateurs->Prestations->find('list'));


        if ($this->request->is('post')) {
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



              /*INSERTION DE L UTILISATEUR DANS LA BASE ADRESSE */
                         $adressesTable = TableRegistry::get('Adresses');
                         $adresse = $adressesTable->newEntity();

                         $adresse->preparateur_id = $preparateur->id ;
                         $adresse->rayon = $preparateur->rayon ;
                         $adresse->lat = $latitude ;
                         $adresse->lon = $longitude ;

                         if ($adressesTable->save($adresse)) {  }

                         $horrairesTable = TableRegistry::get('Horraires');
                         $horraire = $horrairesTable->newEntity();

                         $horraire->preparateur_id = $preparateur->id ;

                         $horraire->lm1 = $preparateur->lm1 ;
                         $horraire->lm2 = $preparateur->lm2 ;
                         $horraire->la1 = $preparateur->la1 ;
                         $horraire->la2 = $preparateur->la2 ;

                         $horraire->mm1 = $preparateur->mm1 ;
                         $horraire->mm2 = $preparateur->mm2 ;
                         $horraire->ma1 = $preparateur->ma1 ;
                         $horraire->ma2 = $preparateur->ma2 ;

                         $horraire->mem1 = $preparateur->mem1 ;
                         $horraire->mem2 = $preparateur->mem2 ;
                         $horraire->mea1 = $preparateur->mea1 ;
                         $horraire->mea2 = $preparateur->mea2 ;

                         $horraire->jm1 = $preparateur->jm1 ;
                         $horraire->jm2 = $preparateur->jm2 ;
                         $horraire->ja1 = $preparateur->ja1 ;
                         $horraire->ja2 = $preparateur->ja2 ;

                         $horraire->vm1 = $preparateur->vm1 ;
                         $horraire->vm2 = $preparateur->vm2 ;
                         $horraire->va1 = $preparateur->va1 ;
                         $horraire->va2 = $preparateur->va2 ;

                         $horraire->sm1 = $preparateur->sm1 ;
                         $horraire->sm2 = $preparateur->sm2 ;
                         $horraire->sa1 = $preparateur->sa1 ;
                         $horraire->sa2 = $preparateur->sa2 ;

                         $horraire->dm1 = $preparateur->dm1 ;
                         $horraire->dm2 = $preparateur->dm2 ;
                         $horraire->da1 = $preparateur->da1 ;
                         $horraire->da2 = $preparateur->da2 ;

                         if ($horrairesTable->save($horraire)) {}


             /* FIN INSERTION DE L UTILISATEUR DANS LA BASE HORRAIRE*/

             /*INSERTION DE L UTILISATEUR DANS LA BASE USERS*/

                         $usersTable = TableRegistry::get('Users');
                         $user = $usersTable->newEntity();

                         $user->password = $preparateur->password  ;
                         $user->preparateur_id = $preparateur->id ;
                         $user->username = $preparateur->id ;
                         $user->role = 'preparateur' ;
                         if ($usersTable->save($user)) {  }

           /* FIN INSERTION DE L UTILISATEUR DANS LA BASE USERS*/

                $this->Flash->success(__('Le point de vente a bien été créé.'));
                return $this->redirect(['action' => 'index']);

            } else {
                $this->Flash->error(__('Le point de vente n\' a pas été créé.'));
            }


        }
        $this->set(compact('preparateur'));
        $this->set('_serialize', ['preparateur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Preparateur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
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

             $horraire->lm1 = $preparateur->lm1 ;
             $horraire->lm2 = $preparateur->lm2 ;
             $horraire->la1 = $preparateur->la1 ;
             $horraire->la2 = $preparateur->la2 ;

             $horraire->mm1 = $preparateur->mm1 ;
             $horraire->mm2 = $preparateur->mm2 ;
             $horraire->ma1 = $preparateur->ma1 ;
             $horraire->ma2 = $preparateur->ma2 ;

             $horraire->mem1 = $preparateur->mem1 ;
             $horraire->mem2 = $preparateur->mem2 ;
             $horraire->mea1 = $preparateur->mea1 ;
             $horraire->mea2 = $preparateur->mea2 ;

             $horraire->jm1 = $preparateur->jm1 ;
             $horraire->jm2 = $preparateur->jm2 ;
             $horraire->ja1 = $preparateur->ja1 ;
             $horraire->ja2 = $preparateur->ja2 ;

             $horraire->vm1 = $preparateur->vm1 ;
             $horraire->vm2 = $preparateur->vm2 ;
             $horraire->va1 = $preparateur->va1 ;
             $horraire->va2 = $preparateur->va2 ;

             $horraire->sm1 = $preparateur->sm1 ;
             $horraire->sm2 = $preparateur->sm2 ;
             $horraire->sa1 = $preparateur->sa1 ;
             $horraire->sa2 = $preparateur->sa2 ;

             $horraire->dm1 = $preparateur->dm1 ;
             $horraire->dm2 = $preparateur->dm2 ;
             $horraire->da1 = $preparateur->da1 ;
             $horraire->da2 = $preparateur->da2 ;

             if ($horrairesTable->save($horraire)) {}




                $this->Flash->success(__('Le point de vente a bien été mise à jour.'));
                return $this->redirect(['action' => 'index']);
            }

            else {
                $this->Flash->error(__('The preparateur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('preparateur'));
        $this->set('_serialize', ['preparateur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Preparateur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preparateur = $this->Preparateurs->get($id);
        if ($this->Preparateurs->delete($preparateur)) {

            $this->Flash->success(__('The preparateur has been deleted.'));
        } else {
            $this->Flash->error(__('The preparateur could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
