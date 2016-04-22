<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Adresseclients Controller
 *
 * @property \App\Model\Table\AdresseclientsTable $Adresseclients
 */
class AdresseclientsController extends AppController
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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $adresseclients = $this->paginate($this->Adresseclients);

        $this->set(compact('adresseclients'));
        $this->set('_serialize', ['adresseclients']);
    }

    /**
     * View method
     *
     * @param string|null $id Adresseclient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adresseclient = $this->Adresseclients->get($id, [
            'contain' => ['Clients']
        ]);

        $this->set('adresseclient', $adresseclient);
        $this->set('_serialize', ['adresseclient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adresseclient = $this->Adresseclients->newEntity();
        if ($this->request->is('post')) {
            $adresseclient = $this->Adresseclients->patchEntity($adresseclient, $this->request->data);
            if ($this->Adresseclients->save($adresseclient)) {
                $this->Flash->success(__('The adresseclient has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adresseclient could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('adresseclient'));
        $this->set('_serialize', ['adresseclient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adresseclient id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adresseclient = $this->Adresseclients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adresseclient = $this->Adresseclients->patchEntity($adresseclient, $this->request->data);
            if ($this->Adresseclients->save($adresseclient)) {
                $this->Flash->success(__('The adresseclient has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adresseclient could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('adresseclient'));
        $this->set('_serialize', ['adresseclient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adresseclient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adresseclient = $this->Adresseclients->get($id);
        if ($this->Adresseclients->delete($adresseclient)) {
            $this->Flash->success(__('The adresseclient has been deleted.'));
        } else {
            $this->Flash->error(__('The adresseclient could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
