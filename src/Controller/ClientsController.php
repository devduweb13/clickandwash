<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ClientsController extends AppController
{

  public function initialize()
  {

    parent::initialize();
    $this->loadComponent('Flash');
      parent::initialize();
      $this->loadModel('Adresseclients');
      $this->loadModel('Vehiculeclients');
      $this->loadModel('Vehicules');
      $this->loadModel('Marques');
      $this->loadModel('Modeles');

  }

/*PROTECTION DES ACCES UNIQUEMENT ADMIN !!!!!!!!!!!!!!! */
  public function isAuthorized($user)
  {
      // Admin peuvent accéder à chaque action
      if (isset($user['role']) && $user['role'] === 'admin') {
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
        $this->paginate = [
            'contain' => []
        ];
        $clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
        $this->set('_serialize', ['clients']);

        $this->set('adresseclients', $this->Clients->Adresseclients->find('list', ['fields' => [ 'id','adresse']])->toArray());
        $this->set('vehiculeclients', $this->Clients->Vehiculeclients->find('list', ['fields' => [ 'id','annee']])->toArray());
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);

        $this->set('client', $client);
        $this->set('_serialize', ['client']);


    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();

        if ($this->request->is('post')) {

       $this->request->data['adresseclient_id'] = serialize($this->request->data['adresseclient_id']) ;
       $this->request->data['vehiculeclient_id'] = serialize($this->request->data['vehiculeclient_id']) ;

            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $vehiculeclients = $this->Clients->Vehiculeclients->find('list', ['limit' => 200]);
        $adresseclients = $this->Clients->Adresseclients->find('list', ['limit' => 200]);
        $this->set(compact('client', 'vehiculeclients', 'adresseclients'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);


/*RECUPERATION DES INFO ADRESSE DETAIL ET VEHICULE DETAIL*/
        $this->set('adresseclientsnom', $this->Clients->Adresseclients->find('list', ['fields' => [ 'id','name']])->toArray());
        $this->set('adresseclients', $this->Clients->Adresseclients->find('list', ['fields' => [ 'id','adresse']])->toArray());
        $this->set('adresseclientscp', $this->Clients->Adresseclients->find('list', ['fields' => [ 'id','cp']])->toArray());
        $this->set('adresseclientsville', $this->Clients->Adresseclients->find('list', ['fields' => [ 'id','ville']])->toArray());


        $this->set('vehiculeclients', $this->Clients->Vehiculeclients->find('list', ['fields' => [ 'id','annee']])->toArray());
        $this->set('vehiculeclients_lienid', $this->Clients->Vehiculeclients->find('list', ['fields' => [ 'id','vehicule_id']])->toArray());


        $this->set('vehicules', $this->Clients->Vehiculeclients->find('all')->first());




        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__(''));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }

           /*RECUPERATION ET SERIALISATION DES ADRESSES ET VEHICULE CLIENT*/
        $client->adresseclient_id = unserialize($client->adresseclient_id) ;
        $client->vehiculeclient_id = unserialize($client->vehiculeclient_id) ;



        $this->set(compact('client', 'vehiculeclients', 'adresseclients'));
        $this->set('_serialize', ['client']);





    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
