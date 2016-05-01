<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\HelperRegistry;
use Cake\ORM\TableRegistry;
/**
 * Societys Controller
 *
 * @property \App\Model\Table\SocietysTable $Societys
 */
class SocietysController extends AppController
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
        $societys = $this->paginate($this->Societys);

        $this->set(compact('societys'));
        $this->set('_serialize', ['societys']);
    }

    /**
     * View method
     *
     * @param string|null $id Society id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $society = $this->Societys->get($id, [
            'contain' => []
        ]);

        $this->set('society', $society);
        $this->set('_serialize', ['society']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $society = $this->Societys->newEntity();
        if ($this->request->is('post')) {
            $society = $this->Societys->patchEntity($society, $this->request->data);


            if ($this->Societys->save($society)) {
                $this->Flash->success(__('La société a bien été ajoutée.'));

                /*INSERTION DE L UTILISATEUR DANS LA BASE USERS*/

                            $usersTable = TableRegistry::get('Users');
                            $user = $usersTable->newEntity();

                            $user->password = $society->password ;
                            $user->username = $society->mail ;
                            $user->role = 'societe' ;



                            if ($usersTable->save($user)) {  }

              /* FIN INSERTION DE L UTILISATEUR DANS LA BASE USERS*/
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La société  n\'a pas été créé. Veuillez recommencer.'));
            }
        }

        $this->set(compact('society'));
        $this->set('_serialize', ['society']);

    }



    /**
     * Edit method
     *
     * @param string|null $id Society id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $society = $this->Societys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $society = $this->Societys->patchEntity($society, $this->request->data);
            if ($this->Societys->save($society)) {
                $this->Flash->success(__('La société a été modifié.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La société  n\'a pas été modifié. Veuillez recommencer.'));
            }
        }
        $this->set(compact('society'));
        $this->set('_serialize', ['society']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Society id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $society = $this->Societys->get($id);
        if ($this->Societys->delete($society)) {
            $this->Flash->success(__('La société n\'as pas été supprimé.'));
        } else {
            $this->Flash->error(__('Impossible de supprimmer cette société'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
