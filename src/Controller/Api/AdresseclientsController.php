<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;
/**
 * Adresseclients Controller
 *
 * @property \App\Model\Table\AdresseclientsTable $Adresseclients
 */
class AdresseclientsController extends AppController
{
  public function initialize()
  {

      $this->loadModel('Adresseclients');
      $this->loadModel('Clients');
      $this->loadComponent('Chris48s/Geocoder.Geocoder');
      parent::initialize();

  }

public function mesadresse()
{
  $user  = $this->Auth->identify(); /*Recupere les adresses clients*/
  $Adresses = $this->Adresseclients->find('all')
  ->where(['Adresseclients.client_id =' => $user['sub'] ]);

  $this->set([
      'success' => true,
      'data' => [
      'AdressesClient' => $Adresses
       ],
      '_serialize' => ['success', 'data']
  ]);

}

  /**
   * Add method
   *
   * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
   */
  public function add()
  {

      $user  = $this->Auth->identify();

      $adresse_client = $this->Adresseclients->newEntity();
      $adresse_client = $this->Adresseclients->patchEntity($adresse_client, $this->request->data);

      $adressesTable = TableRegistry::get('Adresseclients');
      $adresseclients = $adressesTable->newEntity();

      $clientsTable = TableRegistry::get('Clients');
      $client = $clientsTable->get($user['sub']); // Retourne la table de l'utilisateur en cours

    /*RECUPERATION LAT LONG*/
    $address_geo = $adresse_client->cp.' '.$adresse_client->ville.' '.$adresse_client->adresse;

    $geocodeResult = $this->Geocoder->geocode($address_geo);

    if (count($geocodeResult) > 0) {
        $latitude = floatval($geocodeResult[0]->geometry->location->lat);
        $longitude = floatval($geocodeResult[0]->geometry->location->lng);
    }

    /*FIN RECUPERATION LAT LONG*/

    /*PREPARARATIONS DONNES INSERTION ADRESSES CLIENT*/
    $adresseclients->id = $adresse_client->id ;
    $adresseclients->name = $adresse_client->name ;
    $adresseclients->adresse = $adresse_client->adresse ;
    $adresseclients->cp = $adresse_client->cp ;
    $adresseclients->ville = $adresse_client->ville ;
    $adresseclients->lat = $latitude;
    $adresseclients->lon = $longitude;
    $adresseclients->client_id = $user['sub'];

   if ($adressesTable->save($adresseclients)) {  }
   $idadresseclients = $adresseclients->id; // RECUPERATION ID INSERER ADRESSE

   /*FIN  INSERTION ADRESSES CLIENT*/

    /*MISE A JOUR ADRESSE ID CLIENT*/
   $client->adresseclient_id = serialize($idadresseclients);
   $clientsTable->save($client);
    /*FIN MISE A JOUR ADRESSE ID CLIENT*/

    $this->set([
        'success' => true,
        'cp' => $adresse_client->cp,
        'ville' => $adresse_client->ville,
        'adresse' => $adresse_client->adresse,
        'lat' => $latitude,
        'lon' => $longitude,
        '_serialize' => ['success', 'cp' , 'adresse', 'ville' ,'lat','lon']
    ]);

  }


}
