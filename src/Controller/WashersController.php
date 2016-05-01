<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class WashersController  extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

     public function initialize()
     {
         $this->loadComponent('Chris48s/Geocoder.Geocoder');
         $this->loadModel('Indisponibilites');
         $this->loadModel('Preparateurs');
         $this->loadModel('Societys');
         $this->loadModel('Horraires');
         $this->loadModel('Clients');
         $this->loadModel('Adresseclients');
         $this->loadModel('Prestations');
         $this->loadModel('Rdvs');
         $this->loadModel('Paiements');
         $this->loadComponent('Flash');
         parent::initialize();

         $rdvavenircount = $this->Rdvs->find('all')
         ->where(['preparateur_id' => $this->Auth->User('preparateur_id')])
         ->where(['etat =' => 0 ]);
         $rdvavenircountNb = $rdvavenircount->count();
         $this->set('rdvavenircountNb', $rdvavenircountNb);

     }


     public function isAuthorized($user)
     {
         // Admin peuvent accéder à chaque action
         if (isset($user['role']) && $user['role'] === 'preparateur') {
             return true;
         }

         // Par défaut refuser
         return false;
     }


    public function index()
    {

      $Datedujour = Time::now();
      $Datedujour = $Datedujour->i18nFormat('yyyy-MM-dd');

      $Datefinsem = Time::now();
      $Datefinsem = $Datefinsem->modify('+7 days');
      $Datefinsem = $Datefinsem->i18nFormat('yyyy-MM-dd');

      $daterecup = Time::now();
      $moisencours = $daterecup->i18nFormat('MM');
      $jourencours = $daterecup->i18nFormat('dd');
      $anneencours = $daterecup->i18nFormat('yyyy');

      $jourdebdumois = $anneencours."-".$moisencours."-01" ;
      $jourfindumois = $anneencours."-".$moisencours."-31" ;

      $jourdeban = $anneencours."-01-01" ;
      $jourfinan = $anneencours."01-31" ;

      $id_preparateur = $this->Auth->User('preparateur_id') ;
      $this->set('id_preparateur', $id_preparateur);

      /*RDV A VENIR DU JOUR*/
      $rdvjours = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
      ->where(['date =' => $Datedujour ])
      ->where(['preparateur_id' => $this->Auth->User('preparateur_id')])
      ->where(['etat >=' => 0 ]);
      $rdvjoursNb = $rdvjours->count();
      $this->set('rdvjoursNb', $rdvjoursNb);

      /*RDV A VENIR DE LA SEMAINE*/
      $rdvsem = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
      ->where(['date >=' => $Datedujour ])
      ->where(['preparateur_id' => $this->Auth->User('preparateur_id')])
      ->where(['etat >=' => 0 ])
      ->where(['date <=' => $Datefinsem ]);
      $rdvsemNb = $rdvsem->count();
      $this->set('rdvsemNb', $rdvsemNb);

      /*RDV MOIS COURANT*/
      $rdvmois = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
      ->where(['date >=' => $jourdebdumois ])
      ->where(['preparateur_id' => $this->Auth->User('preparateur_id')])
      ->where(['date <=' => $jourfindumois ]);
      $rdvmoisNb = $rdvmois->count();
      $this->set('rdvmoisNb', $rdvmoisNb);

      /*RDV ANNEE COURANT*/
      $rdvan = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
      ->where(['date >=' => $jourdeban ])
      ->where(['preparateur_id' => $this->Auth->User('preparateur_id')])
      ->where(['date <=' => $jourfinan ]);
      $rdvanNb = $rdvan->count();
      $this->set('rdvanNb', $rdvanNb);

      /*RDV MOIS COURANT*/
      $rdvmoisan = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
      ->where(['date >=' => $jourdebdumois ])
      ->where(['preparateur_id' => $this->Auth->User('preparateur_id')])
      ->where(['etat =' => 3 ])
      ->orWhere(['etat =' => 2 ])
      ->where(['date <=' => $jourfindumois ]);
      $rdvmoisanNb = $rdvmoisan->count();
      $this->set('rdvmoisanNb', $rdvmoisanNb);

      /*RDV ANNEE COURANT*/
      $rdvanan = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
      ->where(['date >=' => $jourdeban ])
      ->where(['preparateur_id' => $this->Auth->User('preparateur_id')])
      ->where(['etat =' => 3 ])
      ->orWhere(['etat =' => 2 ])
      ->where(['date <=' => $jourfinan ]);
      $rdvananNb = $rdvanan->count();
      $this->set('rdvananNb', $rdvananNb);

      $rdvwashers = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
      ->where(['preparateur_id =' => $this->Auth->User('preparateur_id') ])
      ->where(['date =' => $Datedujour ]);
      $this->set('rdvwashers', $rdvwashers);

      $clientsNom = $this->Clients->find('list', ['fields' => ['id','name'] ])->toArray(); /*Nom du client*/
      $this->set('clientsNom', $clientsNom);

      $clientsTel = $this->Clients->find('list', ['fields' => ['id','tel'] ])->toArray();  /*Téléphone du client*/
      $this->set('clientsTel',$clientsTel);

      $prestation = $this->Prestations->find('list', ['fields' => ['id','name'] ])->toArray();  /*Téléphone du client*/
      $this->set('prestation',$prestation);

      $adresseclient = $this->Adresseclients->find('list', ['fields' => ['id','adresse'] ])->toArray();  /*Téléphone du client*/
      $this->set('adresseclient',$adresseclient);

      $cpclient = $this->Adresseclients->find('list', ['fields' => ['id','cp'] ])->toArray();  /*Téléphone du client*/
      $this->set('cpclient',$cpclient);

      $villeclient = $this->Adresseclients->find('list', ['fields' => ['id','ville'] ])->toArray();  /*Téléphone du client*/
      $this->set('villeclient',$villeclient);

      $paiementwashers = $this->Paiements->find('all')
      ->where(['preparateur_id =' => $this->Auth->User('preparateur_id') ]);
      $paiementwashers = $paiementwashers->sumOf('montant');
      $this->set('paiementwashers', $paiementwashers);

    }

    public function mesinfo() /*INFOS WASHERS + MODIFICATIONS DES DONNESS*/
    {
      $infopreparateurs =  $this->Preparateurs->get($this->Auth->User('preparateur_id'), [
          'contain' => []
      ]);
      $this->set('infopreparateurs', $infopreparateurs);


      /*MENU DEROULANT POUR LES SOCIETE*/
      $this->set('societys', $this->Preparateurs->Societys->find('list'));
      /*MENU DEROULANT POUR LES Prestations*/
      $this->set('prestations', $this->Preparateurs->Prestations->find('list'));

      /*RECUPERATION TABLEAU HORRAIRES DU POINT DE VENTE*/
      $this->set('horraires', $this->Preparateurs->Horraires->find('all')->where(['Preparateurs.id' =>  $this->Auth->User('preparateur_id')])->contain(['Preparateurs'])->first());
      $this->set('_serialize', ['horraires']);
      /*FIN RECUPERATION TABLEAU HORRAIRES DU POINT DE VENTE*/

      $infopreparateurs->prestation_id = unserialize($infopreparateurs->prestation_id) ;



      if ($this->request->is(['patch', 'post', 'put'])) {


        /*RECUPERATION DES PRESTATIONS SERIALIZE TABLEAU*/
          $this->request->data['prestation_id'] = serialize($this->request->data['prestation_id']) ;

          $infopreparateurs = $this->Preparateurs->patchEntity($infopreparateurs, $this->request->data);
          if ($this->Preparateurs->save($infopreparateurs)) {

            /*RECUPERATION LAT LONG*/
            $address = $infopreparateurs->cp.' '.$infopreparateurs->ville.' '.$infopreparateurs->adresse;

            $geocodeResult = $this->Geocoder->geocode($address);

            if (count($geocodeResult) > 0) {
                $latitude = floatval($geocodeResult[0]->geometry->location->lat);
                $longitude = floatval($geocodeResult[0]->geometry->location->lng);
            }
            /*FIN RECUPERATION LAT LONG*/


            /*MODIFICATION DE L UTILISATEUR DANS LA BASE ADRESSE */
            $adressesTable = TableRegistry::get('Adresses');
            $adresse = $adressesTable->find('all')->where(['Preparateurs.id' => $this->Auth->User('preparateur_id')])->contain(['Preparateurs'])->first();

           $adresse->preparateur_id = $infopreparateurs->id ;
           $adresse->rayon          = $infopreparateurs->rayon ;
           $adresse->lat            = $latitude ;
           $adresse->lon            = $longitude ;

           if ($adressesTable->save($adresse)) {  }

             /*MODIFICATION DE L UTILISATEUR DANS LA BASE HORRAIRES */
           $horrairesTable = TableRegistry::get('Horraires');
           $horraire = $horrairesTable->find('all')->where(['Preparateurs.id' => $this->Auth->User('preparateur_id')])->contain(['Preparateurs'])->first();

           $horraire->preparateur_id = $infopreparateurs->id ;

           $horraire->lm1  = $infopreparateurs->lm1 ;
           $horraire->lm2  = $infopreparateurs->lm2 ;
           $horraire->la1  = $infopreparateurs->la1 ;
           $horraire->la2  = $infopreparateurs->la2 ;

           $horraire->mm1  = $infopreparateurs->mm1 ;
           $horraire->mm2  = $infopreparateurs->mm2 ;
           $horraire->ma1  = $infopreparateurs->ma1 ;
           $horraire->ma2  = $infopreparateurs->ma2 ;

           $horraire->mem1 = $infopreparateurs->mem1 ;
           $horraire->mem2 = $infopreparateurs->mem2 ;
           $horraire->mea1 = $infopreparateurs->mea1 ;
           $horraire->mea2 = $infopreparateurs->mea2 ;

           $horraire->jm1  = $infopreparateurs->jm1 ;
           $horraire->jm2  = $infopreparateurs->jm2 ;
           $horraire->ja1  = $infopreparateurs->ja1 ;
           $horraire->ja2  = $infopreparateurs->ja2 ;

           $horraire->vm1  = $infopreparateurs->vm1 ;
           $horraire->vm2  = $infopreparateurs->vm2 ;
           $horraire->va1  = $infopreparateurs->va1 ;
           $horraire->va2  = $infopreparateurs->va2 ;

           $horraire->sm1  = $infopreparateurs->sm1 ;
           $horraire->sm2  = $infopreparateurs->sm2 ;
           $horraire->sa1  = $infopreparateurs->sa1 ;
           $horraire->sa2  = $infopreparateurs->sa2 ;

           $horraire->dm1  = $infopreparateurs->dm1 ;
           $horraire->dm2  = $infopreparateurs->dm2 ;
           $horraire->da1  = $infopreparateurs->da1 ;
           $horraire->da2  = $infopreparateurs->da2 ;

           if ($horrairesTable->save($horraire)) {}




              $this->Flash->success(__('Le point de vente a bien été mise à jour.'));
              return $this->redirect(['action' => 'mesinfo']);
          }

          else {
              $this->Flash->error(__('The preparateur could not be saved. Please, try again.'));
          }
      }


    }

    public function moncompte()
    {

    }

    public function indispo() /*AFFICHAGE DES INDISPONIBILITES*/
    {
      $indisponibilitewashers = $this->Indisponibilites->find('all')
      ->where(['preparateur_id =' => $this->Auth->User('preparateur_id') ]) ; /*CIBLE LES INDISPONIBILITE DE L UTILISATEUR*/
      $this->set('indisponibilitewashers', $indisponibilitewashers);
    }


    public function addIndispo() /*AJOUT DES INDISPONIBILITES*/
    {
      $indispo = $this->Indisponibilites->newEntity();
      if ($this->request->is('post')) {
          $indispo = $this->Indisponibilites->patchEntity($indispo, $this->request->data);
          if ($this->Indisponibilites->save($indispo)) {
              $this->Flash->success(__('L\'indisponibilité a bien été ajouté'));
              return $this->redirect(['action' => 'indispo']);
          } else {
              $this->Flash->error(__('L\'indisponibilité n\'a pas été créé. Veuillez recommencer'));
          }
      }
      $this->set(compact('indispo'));
      $this->set('_serialize', ['indispo']);
    }




    public function rdv() /*AFFICHAGE DES RDV WASHERS*/
    {
      $rdvwashers = $this->Rdvs->find('all', [
        'contain' => ['Prestations', 'Clients'] 
     ])
      ->where(['preparateur_id =' => $this->Auth->User('preparateur_id') ])
      ->where(['etat !=' => 0 ]);
      $this->set('rdvwashers', $rdvwashers);

      $clientsNom = $this->Clients->find('list', ['fields' => ['id','name'] ])->toArray(); /*Nom du client*/
      $this->set('clientsNom', $clientsNom);

      $clientsTel = $this->Clients->find('list', ['fields' => ['id','tel'] ])->toArray();  /*Téléphone du client*/
      $this->set('clientsTel',$clientsTel);

      $prestation = $this->Prestations->find('list', ['fields' => ['id','name'] ])->toArray();  /*Téléphone du client*/
      $this->set('prestation',$prestation);

      $adresseclient = $this->Adresseclients->find('list', ['fields' => ['id','adresse'] ])->toArray();  /*Téléphone du client*/
      $this->set('adresseclient',$adresseclient);

      $cpclient = $this->Adresseclients->find('list', ['fields' => ['id','cp'] ])->toArray();  /*Téléphone du client*/
      $this->set('cpclient',$cpclient);

      $villeclient = $this->Adresseclients->find('list', ['fields' => ['id','ville'] ])->toArray();  /*Téléphone du client*/
      $this->set('villeclient',$villeclient);
   }

   public function rdvavenir() /*AFFICHAGE DES RDV WASHERS*/
   {
     $rdvwashers = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
     ->where(['preparateur_id =' => $this->Auth->User('preparateur_id') ])
     ->where(['etat =' => 0 ]);
     $this->set('rdvwashers', $rdvwashers);

     $clientsNom = $this->Clients->find('list', ['fields' => ['id','name'] ])->toArray(); /*Nom du client*/
     $this->set('clientsNom', $clientsNom);

     $clientsTel = $this->Clients->find('list', ['fields' => ['id','tel'] ])->toArray();  /*Téléphone du client*/
     $this->set('clientsTel',$clientsTel);

     $prestation = $this->Prestations->find('list', ['fields' => ['id','name'] ])->toArray();  /*Téléphone du client*/
     $this->set('prestation',$prestation);

     $adresseclient = $this->Adresseclients->find('list', ['fields' => ['id','adresse'] ])->toArray();  /*Téléphone du client*/
     $this->set('adresseclient',$adresseclient);

     $cpclient = $this->Adresseclients->find('list', ['fields' => ['id','cp'] ])->toArray();  /*Téléphone du client*/
     $this->set('cpclient',$cpclient);

     $villeclient = $this->Adresseclients->find('list', ['fields' => ['id','ville'] ])->toArray();  /*Téléphone du client*/
     $this->set('villeclient',$villeclient);
  }


public function annulrdv($id = null) /*ANNULATION RDV WASHERS*/
{
  /*MODIFICATION TABLE RDV*/
 $rdvsTable = TableRegistry::get('Rdvs');
 $rdv       = $rdvsTable->get($id);
 $rdv->etat ='3';
 $rdvsTable->save($rdv);
 /*FIN MODIFICATION TABLE RDV*/

  /*INSERTION TABLE ANNULATION*/
$annulationrdvsTable         = TableRegistry::get('Annulationrdvs');
$annulation                  = $annulationrdvsTable->newEntity();
$annulation->rdv_id          = $id;
$annulation->date            = $rdv->debut;
$annulation->date_annulation = Time::now();;
$annulation->type            = '3';
  /*FIN INSERTION TABLE ANNULATION*/

if ($annulationrdvsTable->save($annulation)):

/*DEBUT REMBOURSEMENT CLIENTS*/
/*
logique du remboursement client ici !!!!
*/
/*FIN REMBOURSEMENT CLIENTS*/

return $this->redirect(['action' => 'rdv']);
endif;
}

public function comptabilite() {

}

public function exportcal() {
  $rdvwashers = $this->Rdvs->find('all', ['contain' => ['Prestations', 'Clients']])
  ->where(['preparateur_id =' => $this->Auth->User('preparateur_id') ])
  ->where(['etat =' => 0 ]);

  $clientsNom = $this->Clients->find('list', ['fields' => ['id','name'] ])->toArray(); /*Nom du client*/
  $this->set('clientsNom', $clientsNom);

  $prestation = $this->Prestations->find('list', ['fields' => ['id','name'] ])->toArray();  /*Téléphone du client*/
  $this->set('prestation',$prestation);

  $adresseclient = $this->Adresseclients->find('list', ['fields' => ['id','adresse'] ])->toArray();  /*Téléphone du client*/
  $this->set('adresseclient',$adresseclient);

  $cpclient = $this->Adresseclients->find('list', ['fields' => ['id','cp'] ])->toArray();  /*Téléphone du client*/
  $this->set('cpclient',$cpclient);

  $villeclient = $this->Adresseclients->find('list', ['fields' => ['id','ville'] ])->toArray();  /*Téléphone du client*/
  $this->set('villeclient',$villeclient);

define('DATE_ICAL', 'Ymd\THis\Z'); // DEFINITION DU FORMAT DE LA DATE ICAL


$output = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//CLICKANDWASH//CALENDRIER WASH A VENIR//FR\r\n";
  foreach ($rdvwashers as $rdvwasher):
    $output .=
   "BEGIN:VEVENT
SUMMARY:".str_replace( ';', '',$clientsNom[$rdvwasher->client_id] )." ". str_replace( ';', '',$prestation[$rdvwasher->prestation_id] )."
UID:".$rdvwasher->id."
DTSTART:" . date(DATE_ICAL, strtotime($rdvwasher->debut)) . "
DTEND:" . date(DATE_ICAL, strtotime($rdvwasher->fin)) . "
LOCATION:".str_replace( ';', '',$adresseclient[$rdvwasher->adresseclient_id] ). " ". str_replace( ';', '',$cpclient[$rdvwasher->adresseclient_id] ) ." ". str_replace( ';', '',$villeclient[$rdvwasher->adresseclient_id] )."
END:VEVENT\r\n";
  endforeach;

  // close calendar
  $output .= "END:VCALENDAR";

$dir = new Folder('/wamp/www/clickandwash/documents/ical',true,0777);
$file = new File("/wamp/www/clickandwash/documents/ical/".$this->Auth->User('preparateur_id').".ics", true, 0777);
$file->write($output);

$this->response->file(
    "/wamp/www/clickandwash/documents/ical/".$this->Auth->User('preparateur_id').".ics",
    ['download' => true, 'name' => 'iCal-calendrier.ics']
);
return $this->response;
}


}
