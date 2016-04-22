<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehicules Controller
 *
 * @property \App\Model\Table\VehiculesTable $Vehicules
 */
class VehiculesController extends AppController
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
            'contain' => ['Marques', 'Modeles']
        ];
        $vehicules = $this->paginate($this->Vehicules);

        $this->set(compact('vehicules'));
        $this->set('_serialize', ['vehicules']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicule = $this->Vehicules->get($id, [
            'contain' => ['Marques', 'Modeles']
        ]);

        $this->set('vehicule', $vehicule);
        $this->set('_serialize', ['vehicule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicule = $this->Vehicules->newEntity();
        if ($this->request->is('post')) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->data);
            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('The vehicule has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
            }
        }
        $marques = $this->Vehicules->Marques->find('list', ['limit' => 200]);
        $modeles = $this->Vehicules->Modeles->find('list', ['limit' => 200]);
        $this->set(compact('vehicule', 'marques', 'modeles'));
        $this->set('_serialize', ['vehicule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicule = $this->Vehicules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->data);
            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('The vehicule has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
            }
        }
        $marques = $this->Vehicules->Marques->find('list', ['limit' => 200]);
        $modeles = $this->Vehicules->Modeles->find('list', ['limit' => 200]);
        $this->set(compact('vehicule', 'marques', 'modeles'));
        $this->set('_serialize', ['vehicule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicule = $this->Vehicules->get($id);
        if ($this->Vehicules->delete($vehicule)) {
            $this->Flash->success(__('The vehicule has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicule could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
