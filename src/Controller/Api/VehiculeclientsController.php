<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;

/**
 * Vehiculeclients Controller
 *
 * @property \App\Model\Table\VehiculeclientsTable $Vehiculeclients
 */
class VehiculeclientsController extends AppController
{

  public function initialize()
  {

      $this->loadModel('Clients');
      $this->loadModel('Vehiculeclients');
      $this->loadModel('Vehicules');
      $this->loadModel('Modeles');
      $this->loadModel('Marques');
      parent::initialize();

  }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $user  = $this->Auth->identify();
        $vehiculeclients = $this->Vehiculeclients->find('all')
        ->where(['Vehiculeclients.client_id =' => $user['sub'] ]) ; /*CIBLE LES VEHICULES DE L UTILISATEUR*/


$i = 0 ;
$tableauVehiculeClient = array();

foreach ($vehiculeclients as $vehiculeclient ) {
  $vehicules           = $this->Vehicules->find('all')
  ->where(['id         =' => $vehiculeclient->vehicule_id ]);


foreach ($vehicules as $vehicule ) {
  $marques             = $this->Marques->find('all')
  ->where(['Marques.id =' => $vehicule->marque_id ]);
}

foreach ($marques as $marque ) {
   $modeles            = $this->Modeles->find('all')
  ->where(['Modeles.id =' => $vehicule->modele_id ]);
}
foreach ($modeles as $modele ) {
}

$tableauVehiculeClient[$i]['Marque'] = $marque->name ;
$tableauVehiculeClient[$i]['Modele'] = $modele->name ;
$tableauVehiculeClient[$i]['Annee']  = $vehiculeclient->annee ;
$tableauVehiculeClient[$i]['Type']   = $modele->type;
$i++;
}

        $this->set([
            'success' => true,
            'data' => [
            'vehiculeclients' => $tableauVehiculeClient
             ],
            '_serialize' => ['success', 'data']
        ]);


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
    $user  = $this->Auth->identify();

    $vehiule_data = $this->Vehiculeclients->newEntity();
    $vehiule_data = $this->Vehiculeclients->patchEntity($vehiule_data, $this->request->data);

    $vehiculesTable = TableRegistry::get('Vehicules');
    $vehicule = $vehiculesTable->newEntity();

    $vehiculeclientsTable = TableRegistry::get('Vehiculeclients');
    $vehiculeclient = $vehiculeclientsTable->newEntity();

    $clientsTable = TableRegistry::get('Clients');
    $client = $clientsTable->get($user['sub']); // Retourne la table de l'utilisateur en cours


    /*PREPARARATIONS DONNES INSERTION VEHICULE*/
    $vehicule->id = $vehiule_data->id ;
    $vehicule->marque_id = $vehiule_data->marque ;
    $vehicule->modele_id = $vehiule_data->modele ;
    $vehicule->annee = $vehiule_data->annee ;

    if ($vehiculesTable->save($vehicule)) {  }
    $idvehicule = $vehicule->id; // RECUPERATION ID INSERER ADRESSE

    /*PREPARARATIONS DONNES INSERTION VEHICULE CLIENT*/
    $vehiculeclient->id = $vehiule_data->id ;
    $vehiculeclient->vehicule_id = $idvehicule ;
    $vehiculeclient->annee = $vehiule_data->annee ;
    $vehiculeclient->client_id = $user['sub'];

    $vehiculeclientsTable->save($vehiculeclient);

    /*MISE A JOUR ADRESSE ID CLIENT*/
   $client->vehiculeclient_id = serialize($idvehicule);
   $clientsTable->save($client);
    /*FIN MISE A JOUR ADRESSE ID CLIENT*/

    $this->set([
        'success' => true,
        'id' => "$idvehicule",
        'Annee' => $vehiule_data->annee,
        '_serialize' => ['success', 'id' , 'Annee']
    ]);

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
