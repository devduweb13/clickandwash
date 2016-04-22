<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Horraires Controller
 *
 * @property \App\Model\Table\HorrairesTable $Horraires
 */
class HorrairesController extends AppController
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
        $horraires = $this->paginate($this->Horraires);

        $this->set(compact('horraires'));
        $this->set('_serialize', ['horraires']);

        /*MENU DEROULANT POUR LES SOCIETE*/
        $this->set('preparateur', $this->Horraires->Preparateurs->find('list'));

    }

    /**
     * View method
     *
     * @param string|null $id Horraire id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $horraire = $this->Horraires->get($id, [
            'contain' => []
        ]);

        $this->set('horraire', $horraire);
        $this->set('_serialize', ['horraire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $horraire = $this->Horraires->newEntity();
        if ($this->request->is('post')) {
            $horraire = $this->Horraires->patchEntity($horraire, $this->request->data);
            if ($this->Horraires->save($horraire)) {
                $this->Flash->success(__('The horraire has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The horraire could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('horraire'));
        $this->set('_serialize', ['horraire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Horraire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $horraire = $this->Horraires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $horraire = $this->Horraires->patchEntity($horraire, $this->request->data);
            if ($this->Horraires->save($horraire)) {
                $this->Flash->success(__('The horraire has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The horraire could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('horraire'));
        $this->set('_serialize', ['horraire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Horraire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $horraire = $this->Horraires->get($id);
        if ($this->Horraires->delete($horraire)) {
            $this->Flash->success(__('The horraire has been deleted.'));
        } else {
            $this->Flash->error(__('The horraire could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
