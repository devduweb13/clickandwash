<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\HelperRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
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
          'contain' => [],
            'limit' => 1500,
      ];

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);


    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('L\'utilisateur a bien été ajouté'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'utilisateur n\'a pas été créé. Veuillez recommencer'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Mise a jour effectuée.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La mise à jour n\'a pas été prise en compte veuillez recommencer'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('L\'utilisateur a été supprimé '));
        } else {
            $this->Flash->error(__('L\'utilisateur n\'a pas été supprimé. Veuillez recommencer'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Permet aux utilisateurs de s'enregistrer et de se déconnecter.
        $this->Auth->allow(['login', 'logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->_getRedirectionPath());
            }
            else {
            $this->Flash->error(__('Nom d\'utilisateur ou mot de passe incorrect'), [
                'key' => 'auth'
            ]);
        }
        }
    }


/*FONCTION REDIRECTION URL APRES LOGIN EN FONCTION DU ROLE USER*/
private function _getRedirectionPath() {
    if($this->Auth->User('role') == 'preparateur'){
        $redirect = array('controller' => 'washers', 'action' => 'index');
    }
    if($this->Auth->User('role') == 'societe'){
        $redirect = array('controller' => 'comptasocietys', 'action' => 'index');
    }
     else if($this->Auth->User('role') == 'admin') {
        $redirect = array('controller' => 'pages', 'action' => 'index', 'admin' => true);
    }

    return $redirect;
}









    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}
