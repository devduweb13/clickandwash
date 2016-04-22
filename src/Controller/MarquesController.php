<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Marques Controller
 *
 * @property \App\Model\Table\MarquesTable $Marques
 */
class MarquesController extends AppController
{

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


  public $paginate = [
      'limit' => 100,
      'order' => [
          'Marques.name' => 'asc'
      ]
  ];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $marques = $this->paginate($this->Marques);

        $this->set(compact('marques'));
        $this->set('_serialize', ['marques']);
    }

    /**
     * View method
     *
     * @param string|null $id Marque id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marque = $this->Marques->get($id, [
            'contain' => ['Modeles', 'Vehicules']
        ]);

        $this->set('marque', $marque);
        $this->set('_serialize', ['marque']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marque = $this->Marques->newEntity();
        if ($this->request->is('post')) {
            $marque = $this->Marques->patchEntity($marque, $this->request->data);
            if ($this->Marques->save($marque)) {
                $this->Flash->success(__('The marque has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The marque could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('marque'));
        $this->set('_serialize', ['marque']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Marque id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marque = $this->Marques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marque = $this->Marques->patchEntity($marque, $this->request->data);
            if ($this->Marques->save($marque)) {
                $this->Flash->success(__('The marque has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The marque could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('marque'));
        $this->set('_serialize', ['marque']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marque id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marque = $this->Marques->get($id);
        if ($this->Marques->delete($marque)) {
            $this->Flash->success(__('The marque has been deleted.'));
        } else {
            $this->Flash->error(__('The marque could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
