<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modeles Controller
 *
 * @property \App\Model\Table\ModelesTable $Modeles
 */
class ModelesController extends AppController
{

  public function initialize()
          {
              parent::initialize();
              $this->loadComponent('Flash');
              $this->loadComponent('RequestHandler');

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
            'contain' => ['Marques'],
              'limit' => 1500,
        ];
        $modeles = $this->paginate($this->Modeles);

        $this->set(compact('modeles'));
        $this->set('_serialize', ['modeles']);
    }

    /**
     * View method
     *
     * @param string|null $id Modele id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modele = $this->Modeles->get($id, [
            'contain' => ['Marques', 'Vehicules']
        ]);

        $this->set('modele', $modele);
        $this->set('_serialize', ['modele']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modele = $this->Modeles->newEntity();
        if ($this->request->is('post')) {
            $modele = $this->Modeles->patchEntity($modele, $this->request->data);
            if ($this->Modeles->save($modele)) {
                $this->Flash->success(__('The modele has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modele could not be saved. Please, try again.'));
            }
        }
        $marques = $this->Modeles->Marques->find('list', ['limit' => 200]);
        $this->set(compact('modele', 'marques'));
        $this->set('_serialize', ['modele']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modele id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modele = $this->Modeles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modele = $this->Modeles->patchEntity($modele, $this->request->data);
            if ($this->Modeles->save($modele)) {
                $this->Flash->success(__('The modele has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modele could not be saved. Please, try again.'));
            }
        }
        $marques = $this->Modeles->Marques->find('list', ['limit' => 200]);
        $this->set(compact('modele', 'marques'));
        $this->set('_serialize', ['modele']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modele id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modele = $this->Modeles->get($id);
        if ($this->Modeles->delete($modele)) {
            $this->Flash->success(__('The modele has been deleted.'));
        } else {
            $this->Flash->error(__('The modele could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function liste()
    {

        $state = $this->request->data['get_option'];

        $modeles = $this->Modeles->find('all')
                           ->where(['marque_id =' => $state]);
$this->set('modeles', $modeles);

        debug($state);

    }


}
