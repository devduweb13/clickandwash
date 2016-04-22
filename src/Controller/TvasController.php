<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tvas Controller
 *
 * @property \App\Model\Table\TvasTable $Tvas
 */
class TvasController extends AppController
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
        $tvas = $this->paginate($this->Tvas);

        $this->set(compact('tvas'));
        $this->set('_serialize', ['tvas']);
    }

    /**
     * View method
     *
     * @param string|null $id Tva id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tva = $this->Tvas->get($id, [
            'contain' => []
        ]);

        $this->set('tva', $tva);
        $this->set('_serialize', ['tva']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tva = $this->Tvas->newEntity();
        if ($this->request->is('post')) {
            $tva = $this->Tvas->patchEntity($tva, $this->request->data);
            if ($this->Tvas->save($tva)) {
                $this->Flash->success(__('The tva has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tva could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tva'));
        $this->set('_serialize', ['tva']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tva id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tva = $this->Tvas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tva = $this->Tvas->patchEntity($tva, $this->request->data);
            if ($this->Tvas->save($tva)) {
                $this->Flash->success(__('The tva has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tva could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tva'));
        $this->set('_serialize', ['tva']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tva = $this->Tvas->get($id);
        if ($this->Tvas->delete($tva)) {
            $this->Flash->success(__('The tva has been deleted.'));
        } else {
            $this->Flash->error(__('The tva could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
