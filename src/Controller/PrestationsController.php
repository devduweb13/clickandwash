<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prestations Controller
 *
 * @property \App\Model\Table\PrestationsTable $Prestations
 */
class PrestationsController extends AppController
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
        $prestations = $this->paginate($this->Prestations);

        $this->set(compact('prestations'));
        $this->set('_serialize', ['prestations']);
    }

    /**
     * View method
     *
     * @param string|null $id Prestation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prestation = $this->Prestations->get($id, [
            'contain' => []
        ]);

        $this->set('prestation', $prestation);
        $this->set('_serialize', ['prestation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prestation = $this->Prestations->newEntity();
        if ($this->request->is('post')) {
            $prestation = $this->Prestations->patchEntity($prestation, $this->request->data);
            if ($this->Prestations->save($prestation)) {
                $this->Flash->success(__('The prestation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The prestation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('prestation'));
        $this->set('_serialize', ['prestation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prestation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prestation = $this->Prestations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prestation = $this->Prestations->patchEntity($prestation, $this->request->data);
            if ($this->Prestations->save($prestation)) {
                $this->Flash->success(__('The prestation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The prestation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('prestation'));
        $this->set('_serialize', ['prestation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prestation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prestation = $this->Prestations->get($id);
        if ($this->Prestations->delete($prestation)) {
            $this->Flash->success(__('The prestation has been deleted.'));
        } else {
            $this->Flash->error(__('The prestation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
