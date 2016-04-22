<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiculeclients Controller
 *
 * @property \App\Model\Table\VehiculeclientsTable $Vehiculeclients
 */
class VehiculeclientsController extends AppController
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
        $this->paginate = [
            'contain' => ['Vehicules']
        ];
        $vehiculeclients = $this->paginate($this->Vehiculeclients);

        $this->set(compact('vehiculeclients'));
        $this->set('_serialize', ['vehiculeclients']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehiculeclient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiculeclient = $this->Vehiculeclients->get($id, [
            'contain' => ['Vehicules', 'Clients']
        ]);

        $this->set('vehiculeclient', $vehiculeclient);
        $this->set('_serialize', ['vehiculeclient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiculeclient = $this->Vehiculeclients->newEntity();
        if ($this->request->is('post')) {
            $vehiculeclient = $this->Vehiculeclients->patchEntity($vehiculeclient, $this->request->data);
            if ($this->Vehiculeclients->save($vehiculeclient)) {
                $this->Flash->success(__('The vehiculeclient has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiculeclient could not be saved. Please, try again.'));
            }
        }
        $vehicules = $this->Vehiculeclients->Vehicules->find('list', ['limit' => 200]);
        $this->set(compact('vehiculeclient', 'vehicules'));
        $this->set('_serialize', ['vehiculeclient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiculeclient id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiculeclient = $this->Vehiculeclients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiculeclient = $this->Vehiculeclients->patchEntity($vehiculeclient, $this->request->data);
            if ($this->Vehiculeclients->save($vehiculeclient)) {
                $this->Flash->success(__('The vehiculeclient has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiculeclient could not be saved. Please, try again.'));
            }
        }
        $vehicules = $this->Vehiculeclients->Vehicules->find('list', ['limit' => 200]);
        $this->set(compact('vehiculeclient', 'vehicules'));
        $this->set('_serialize', ['vehiculeclient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiculeclient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiculeclient = $this->Vehiculeclients->get($id);
        if ($this->Vehiculeclients->delete($vehiculeclient)) {
            $this->Flash->success(__('The vehiculeclient has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiculeclient could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
