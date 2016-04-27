<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * Preparateurs Controller
 *
 * @property \App\Model\Table\PreparateursTable $Preparateurs
 */
class PreparateursController extends AppController
{

  public function initialize()
  {

      $this->loadModel('Preparateurs');
      $this->loadModel('Adresses');
      $this->loadModel('Adresseclients');
      $this->loadModel('Vehiculeclients');
      $this->loadModel('Vehicules');
      $this->loadModel('Modeles');
      $this->loadModel('Prestations');
      $this->loadModel('Societys');
      $this->loadModel('Clients');
      $this->loadModel('Horraires');
      $this->loadModel('Rdvs');
      $this->loadModel('Indisponibilites');
      $this->loadModel('Annulationrdvs');
      parent::initialize();

  }

  public function listerdv()
  {
      $user  = $this->Auth->identify();
      $rdvsclients = $this->Rdvs->find('all')
      ->where(['Rdvs.client_id =' => $user['sub'] ])  /*CIBLE LES RDV DE L UTILISATEUR*/
      ->where(['Rdvs.etat =' => '0' ]) ; /*CIBLE LES RDV EN COURS*/

      $this->set([
          'success' => true,
          'data' => [
          'Rdv' => $rdvsclients
           ],
          '_serialize' => ['success', 'data']
      ]);
  }

  public function annulerdv()
  {
    $info_data = $this->Preparateurs->newEntity();
    $info_data = $this->Preparateurs->patchEntity($info_data, $this->request->data);

      $user  = $this->Auth->identify();
      $rdvsclients = $this->Rdvs->find('all')
      ->where(['Rdvs.client_id =' => $user['sub'] ])  /*CIBLE LES RDV DE L UTILISATEUR*/
      ->where(['Rdvs.id =' => $info_data->rdv_id ]) ; /*CIBLE LES RDV EN COURS*/

      foreach ($rdvsclients as $row) { /*RECUPERATION DES COORDONNE USERS*/
         $date = $row['date'] ;
          $datedebutrdv = $row['debut'] ;
        }
        $date = new Time($date);

        /*TEST SI ANNULATION REMBOURSEMENT DELAIS*/
        if($date->isWithinNext(0) === true ) : $remboursement = "Vous avez tous perdu !!!"; endif;
        if($date->isWithinNext(1) === true ) : $remboursement = "Vous avez perdu 50% de votre reservation"; endif;
        if($date->isWithinNext(2) === true ) : $remboursement = "Vous avez perdu 50% de votre reservation"; endif;
        if($date->isWithinNext(3) === true ) : $remboursement = "Vous avez perdu 50% de votre reservation"; endif;
        if (!isset($remboursement)) : $remboursement = "On vous rembourse intégralement"; endif;
        /*TEST SI ANNULATION REMBOURSEMENT DELAIS*/

        /*MODIFICATION ETAT RDV EN BASE*/
        $rdvTable = TableRegistry::get('Rdvs');
        $rdv = $rdvTable->get($info_data->rdv_id); // Retourne l'article avec l'id 12
        $rdv->etat = 2;
        $rdvTable->save($rdv);
        /*MODIFICATION ETAT RDV EN BASE*/

        /*MODIFICATION ETAT RDV EN BASE*/
        $rdvannuleTable = TableRegistry::get('Annulationrdvs');
        $rdvannule = $rdvannuleTable->newEntity();
        $rdvannule->rdv_id = $info_data->rdv_id;
        $rdvannule->date = $datedebutrdv;
        $rdvannule->date_annulation = date("Y-m-d H:i:s");
        $rdvannule->type = 2;
        /*MODIFICATION ETAT RDV EN BASE*/
        $rdvannuleTable->save($rdvannule);

      $this->set([
          'success' => true,
          'data' => [
          'Date' => $date,
          'rembourse' => $remboursement
           ],
          '_serialize' => ['success', 'data']
      ]);
  }

  public function add()
  {
    $info_data = $this->Preparateurs->newEntity();
    $info_data = $this->Preparateurs->patchEntity($info_data, $this->request->data);


    $adresseclients = $this->Adresseclients->find('all')
    ->where(['Adresseclients.id =' => $info_data->adresse_id ]) ; /*CIBLE LES ADRESSE DE L UTILISATEUR*/

    foreach ($adresseclients as $row) { /*RECUPERATION DES COORDONNE USERS*/
       $lon = $row['lon'] ;
       $lat = $row['lat'] ;
      }

    $vehiculeclients = $this->Vehiculeclients->find('all')
    ->where(['Vehiculeclients.id =' => $info_data->vehicule_id ]) ; /*CIBLE LES VEHICULE DE L UTILISATEUR*/

    foreach ($vehiculeclients as $row) { /*RECUPERATION DES INFOS DU VEHICULE*/
       $id_vehicule = $row['vehicule_id'] ;
      }

      $vehicule= $this->Vehicules->find('all')
      ->where(['Vehicules.id =' => $id_vehicule ]) ; /*CIBLE LES VEHICULE DE L UTILISATEUR*/

      foreach ($vehicule as $row) { /*RECUPERATION DES INFOS DU VEHICULE*/
         $modele_vehicule = $row['modele_id'] ;
        }

        $modele= $this->Modeles->find('all')
        ->where(['Modeles.id =' => $modele_vehicule ]) ; /*CIBLE LE MODELE DE VEHICULE DE L UTILISATEUR*/

        foreach ($modele as $row) { /*RECUPERATION DU TYPE DE VEHICULE*/
           $type_vehicule = $row['type'] ;
          }

          $prestation= $this->Prestations->find('all')
          ->where(['Prestations.id =' => $info_data->prestation_id ]) ; /*CIBLE LE MODELE DE VEHICULE DE L UTILISATEUR*/

          foreach ($prestation as $row) { /*RECUPERATION DU TYPE DE VEHICULE*/
             $tarif_presta = $row['tarif'.$type_vehicule] ;
              $duree_presta = $row['duree'.$type_vehicule] ;
            }

/*CALCUL DES WATCHERS DANS UN RAYON DE 50 KM*/

            $adresse_rec = TableRegistry::get('Adresses'); /*RECUPERATION DE LA TABLE Adresses*/

            $adresserecupwacher = $adresse_rec
            ->find()
            ->select(['preparateur_id', 'lon','lat', 'distance'=>'( 3959 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lon ) - radians('.$lon.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) )' ])
            ->having(['distance <' => 50])
            ->order(['distance ' => 'ASC']);


/*--------------------------------- GESTION DATE SOUHAITE----------------------------------------------------*/
date_default_timezone_set('Europe/Paris');
$dateUSer = $info_data->date ; /* ASSIGNATION DE L'HEURE ET DU JOUR RECU */

if(empty ($info_data->date) or !isset($info_data->date)  ) :
$dateUSer =  Time::now();
 /* SI VIDE  ASSIGNATION DE L'HEURE ET JOURS EN COURS */
endif;

/*Formatage Date ET HEURE*/

$debutDate = new Time($dateUSer,'Europe/Paris', 'fr-FR');

$HeureDebut = $debutDate->i18nFormat('HH:mm');
$MinuteDebut = $debutDate->i18nFormat('mm');

/*Heure arrondi pour le premier jour a 30 minutes supérieur*/


if ($HeureDebut <= "12:00")
{
  $matin = "m1";
}
else {
  $matin ="a1" ;
}

$HeureDebut = $debutDate->i18nFormat('HH');
$finDate = new Time($dateUSer);
$finDate->addDays(21); /*AJOUT DE A LA DATE SELECTIONNE  */

if( ($MinuteDebut >= 1) and ($MinuteDebut <= 15) )
{
$MinuteDebut = 15;
}
if( ($MinuteDebut >= 16) and ($MinuteDebut <= 30) )
{
$MinuteDebut = 30;
}
if( ($MinuteDebut >= 31) and ($MinuteDebut <= 45) )
{
$MinuteDebut = 45;
}
if( ($MinuteDebut >= 46) and ($MinuteDebut <= 59) )
{
$MinuteDebut = 00;
$HeureDebut = $debutDate->addHours(1)->i18nFormat('HH');
}

function LimiteCreneau($Fnheure_deb_retour,$Fnheure_fin_retour)
{
  $date1 = date("H:i", strtotime($Fnheure_deb_retour));
  $date2 = date("H:i", strtotime($Fnheure_fin_retour));
  $delai = strtotime($date2) - strtotime($date1);
  $Limite_q = ($delai/15)/60; /*LIMITE RECUPERER INTEGRER DANS LA BOUCLE*/
  return $Limite_q;
}


/*---------------------------------------------------------------------function AffichageHorraire */
function AffichageHorraire($FnHeure_deb_retour,$FnLimite_q ,$FnDateAffichage,$FnLat_wash,$FnLon_wash,$Fnlat,$Fnlon,$Fndelais,$FnindispoPreparateur,$Fncompteur,$FnidPrepa,$Fntableau,$Fni,$FnClick,$fnIndispovacant)
{




  /*TEST SI EN RDV*/
  foreach($FnindispoPreparateur as $row4)
  {
  $test_indispo_deb = $row4['debut']->i18nFormat("HH:mm");
  $test_indispo_fin = $row4['fin']->i18nFormat("HH:mm");
  $test_indispo_jour = $row4['date']->i18nFormat("dd-MM-YYYY");
  $lat_indispo = $row4['lat'];
  $lon_indispo = $row4['lon'];


  if($test_indispo_jour == $FnDateAffichage ):
  $indispo = true ;
  endif;

  if (!isset($test_indispo_deb)):
  $test_indispo_deb = "";
  $test_indispo_fin = "";
  $test_indispo_jour = "";
  $lat_indispo = "";
  $lon_indispo = "";
  endif;
  }
  /*FIN TEST SI EN RDV*/

  $retourLatRdv = $FnLat_wash ; /*DEFINITION DE LA LAT ORIFGINE*/
  $retourLonRdv = $FnLon_wash ; /*DEFINITION DE LA LON ORIFGINE*/
  $newsAdresse = false ;
  for ($minot= 0 ; $minot <= $FnLimite_q ; $minot++ )
   {

  $heure_deb_retour2  = new Time($FnHeure_deb_retour);
  $heure_deb_retour2->addMinutes(15 * $minot );
  $heure_deb_retour2 = $heure_deb_retour2->i18nFormat('HH:mm');

  if((isset($indispo)) and ($heure_deb_retour2 >= $test_indispo_deb ) and ($heure_deb_retour2 <= $test_indispo_fin ) and ($test_indispo_jour == $FnDateAffichage)) /*Si Indispo*/
  {
   $newsAdresse = true ;
   $HeureRetourCon  = new Time($test_indispo_fin);
   $HeureRetourCon->addMinutes(45);
   $HeureRetourCon = $HeureRetourCon->i18nFormat('HH:mm'); /*HEURE DE RETOUR PLUS TRAJET DU RDV */
  }

  else /*Si Dispo*/
    {
     $debutDispoTest ="";
     $delais = $Fndelais ; /*DELAIS TEMPS DE TRAJET PASSER EN PARAMETRE CALCULE EN DEBUT DE BOUCLE WATCHER*/

     $FnLat_wash = $retourLatRdv;  /*DEFINITION DE LA LAT */
     $FnLon_wash = $retourLonRdv;  /*DEFINITION DE LA LON */

      if(($newsAdresse == true) && ($heure_deb_retour2 <= $HeureRetourCon)): /*TEST SI TEMPS EST SUPERIEUR A 45min PAR RAPPORT A LA FIN DU RDV */


        $FnLat_wash = $lat_indispo; /*MAJ DE LA LAT */
        $FnLon_wash = $lon_indispo; /*MAJ  DE LA LON */

      /*------------------------------------------CALCUL ITINERAIRE ENTRE LES POINTS DE RDV LAT ET LONG VIA API GOOGLE*/
       $url_ApiMapIti="https://maps.googleapis.com/maps/api/directions/json?origin=".$FnLat_wash.",".$FnLon_wash."&destination=".$Fnlat.",".$Fnlon."&region=fr&sensor=false&key=AIzaSyC2Pd7rsiUXdbaYLXbA18shKNFe0mySGkc";
       $json_ApiMapIti = file_get_contents($url_ApiMapIti);
       $data = json_decode($json_ApiMapIti, TRUE);
       $delais =  $data['routes'][0]['legs'][0]['duration']['text'];
       /*------------------------------------------FIN CALCUL ITINERAIRE ENTRE LES POINTS DE RDV LAT ET LONG VIA API GOOGLE*/

       $delais = (int)$delais; /*RECUPERATION EN MINUTE DELAIS TRAJET*/
       $debutDispoTest  = new Time($test_indispo_fin);
       $debutDispoTest->addMinutes($delais);
       $debutDispoTest = $debutDispoTest->i18nFormat('HH:mm'); /*HEURE DE RETOUR PLUS TRAJET DU RDV */

      endif;  /*FIN TEST SI INDISPO MAJ COORDONNE LAT LON DU DERNIER RDV*/


      /*TEST SI EN VACANCES*/

      $dateUnique = Time::parse($FnDateAffichage.' '.$heure_deb_retour2) ; /*INITILISATION DATE DE TEST VACANCE*/
      $ValeurUnique = strtotime($dateUnique->i18nFormat('yyyy-MM-dd HH:mm:ss') ); /*STROTIME DATE TEST*/
      $test_indispo_deb_vac = ""; /* INITILISATION DATE DEBUT SI PAS DE CONGE */
      $test_indispo_fin_vac = ""; /* INITILISATION DATE FIN SI PAS DE CONGE */
      $vacant = 0; /* INITILISATION PAS DE CONGE */

      foreach($fnIndispovacant as $row5) /*BOUCLE INDISPO WASHER CONGES*/
      {
      $test_indispo_deb_vac = new Time($row5['debut']);
      $test_indispo_deb_vac = strtotime($test_indispo_deb_vac->i18nFormat("yyyy-MM-dd HH:mm:s") );
      $test_indispo_fin_vac = new Time( $row5['fin']);
      $test_indispo_fin_vac =   strtotime($test_indispo_fin_vac->i18nFormat("yyyy-MM-dd HH:mm:s") );

      if (($test_indispo_deb_vac < $ValeurUnique) && ($test_indispo_fin_vac >  $ValeurUnique) ) : /*TEST SI EN CONGE*/
      $vacant = 1; /*INITIALISATION VARIABLE TEST CONGE*/
      endif;
      }
      /*FIN TEST SI EN VACANCES*/


     if($heure_deb_retour2 > $debutDispoTest):

      $dateUnique = Time::parse($FnDateAffichage.' '.$heure_deb_retour2) ;
      $ValeurUnique = strtotime($dateUnique->i18nFormat('yyyy-MM-dd HH:mm:ss') );
      $dateTest = strtotime(date('Y-m-d H:i')) ;
      $dateTest = $dateTest + $delais*60;


     if($ValeurUnique > $dateTest ):

       if ($vacant == 1 ) /*TEST SI WASHER EST EN CONGE $vacant 1 = EN CONGE PAS D AFFICHAGE */
       {
       }
       else /*SI PAS EN CONGE NI RDV ON GENERE LE TABLEAU FINAL*/
       {
      $Fntableau[$ValeurUnique]['ClickAndWash'] = $FnClick ;
      $Fntableau[$ValeurUnique]['id']           = $FnidPrepa ;
      $Fntableau[$ValeurUnique]['Duree trajet'] = $delais ;
      $Fntableau[$ValeurUnique]['Jour']         = $FnDateAffichage ;
      $Fntableau[$ValeurUnique]['Heure']        = $heure_deb_retour2 ;
      $Fntableau[$ValeurUnique]['Unique']       = $ValeurUnique;
       }

      endif;

      endif;

    }

  } /*FIN DE BOUCLE HORRAIRE FOR*/

return $Fntableau ;
} /*--------------------------------------------------------------------FIN function AffichageHorraire */

/*--------------------------------------------------------------------FUNCTION RECHERCHE DE DOUBLON TABLEAU UNIQUE */
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
/*--------------------------------------------------------------------FIN FUNCTION RECHERCHE DE DOUBLON TABLEAU UNIQUE */

/*--------------------------------------------------------------------FUNCTION TRI TABLEAU VIA UNE CLE */
function TriTableau()
{
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}
/*--------------------------------------------------------------------FIN FUNCTION TRI TABLEAU VIA UNE CLE */

/*--------------------------------- FUNCTION MELANGE TABLEAU----------------------------------------------------*/
function melange($array) {
 $val = array();
 $keys = array_keys($array);
 shuffle($keys);
    foreach($keys as $key) $val[] = $array[$key];
      return $val;
    }
/*--------------------------------- FIN FUNCTION MELANGE TABLEAU----------------------------------------------------*/

$debutDate =  $HeureDebut.':'.$MinuteDebut ;

$tableauRetour = array (); /*Initialisation tableau retour vide*/

                          foreach ($adresserecupwacher as $row2) {
                             $preparateur = $this->Preparateurs->get($row2->preparateur_id);
                              if ($preparateur->rayon > $row2->distance  ) /*TEST EN FONCTION DU RAYON SI CORRESPONDANT AU RAYONNAGE DU PRESTATEUR*/
                              {

                                $data = unserialize($preparateur->prestation_id);

                                foreach($data as $key => $value):
                                        if($value == $info_data->prestation_id ) /*TEST SI LE PRESTATAIRE PROPOSSE LE SERVICE DEMANDEE*/
                                        {


                                          $LatWash = $row2->lat ; /*ATTRIBUTION DE LA LAT DU RDV*/
                                          $LonWash = $row2->lon ; /*ATTRIBUTION DE LA LON DU RDV*/

                                          /*------------------------------------------CALCUL ITINERAIRE ENTRE LES POINTS DE RDV LAT ET LONG VIA API GOOGLE*/
                                          $url_ApiMapIti="https://maps.googleapis.com/maps/api/directions/json?origin=".$LatWash.",".$LonWash."&destination=".$lat.",".$lon."&region=fr&sensor=false&key=AIzaSyC2Pd7rsiUXdbaYLXbA18shKNFe0mySGkc";
                                          $json_ApiMapIti = file_get_contents($url_ApiMapIti);
                                          $data = json_decode($json_ApiMapIti, TRUE);
                                          $delais =  $data['routes'][0]['legs'][0]['duration']['text'];
                                          $delais = (int)$delais;
                                          /*------------------------------------------FIN CALCUL ITINERAIRE ENTRE LES POINTS DE RDV LAT ET LONG VIA API GOOGLE*/


                                      /*RECUPERATION TABLE HORRAIRE PREPARATEUR*/
                                      $horraire = $this->Horraires->find('all')
                                      ->where(['Horraires.preparateur_id =' => $row2->preparateur_id ]) ; /*CIBLE LES HORRAIRES DU PRESTATAIRE*/
                                       /*FIN RECUPERATION TABLE HORRAIRE PREPARATEUR*/

                                       /*RECUPERATION TABLE HORRAIRE PREPARATEUR*/
                                       $indisponibiliteVacant = $this->Indisponibilites->find('all')
                                       ->where(['Indisponibilites.preparateur_id =' => $row2->preparateur_id  ]) ; /*CIBLE LES HORRAIRES DU PRESTATAIRE*/
                                        /*FIN RECUPERATION TABLE HORRAIRE PREPARATEUR*/

                                       $TableauHorraire = array ();

                                          for ($i = 0 ; $i <= 21 ; $i++ ) /*DECOUPAGE 21 JOURS CRENEAU A AFFICHER PAR DEFAUT*/
                                          {
                                            /*DEFINITIONS DE L ESPACE TEMPS ( CRENEAU HORRAIRES) */
                                            $debutDate  = new Time($dateUSer);
                                            $debutDate->addDays($i); /*INCREMENTATIONS DATE A TESTER  */
                                            $date_affichage  = $debutDate->i18nFormat("dd-MM-YYYY");

                                            $DateTestRdv = $debutDate->i18nFormat("YYYY-MM-dd");

                                            $indispo = false;

                                            /*CONNEXION TABLE RDV */
                                            $indispoPreparateur = $this->Rdvs->find('all')
                                            ->where(['Rdvs.preparateur_id =' => $row2->preparateur_id ])
                                            ->andWhere(['Rdvs.etat =' => 0])
                                            ->andWhere(['Rdvs.date =' => $DateTestRdv]);
                                             /*CIBLE LES VEHICULE DE L UTILISATEUR*/
                                            /*FIN CONNEXION TABLE RDV */

                                            /*EXTRACTION JOUR POINTAGE DEBUT TABLE*/
                                            $JoursDebut    = $debutDate->i18nFormat(\IntlDateFormatter::TRADITIONAL, 'Europe/Paris', 'fr-FR'); /*FORMATAGE DATE JOUR FRANCAIS*/
                                            $JoursDebut    = substr($JoursDebut,0,2); /*RECUPERATION DES DEUX PREMIERS CARACTERES DU JOUR ET TEST QUEL TABLE UTILISE*/
                                            if($JoursDebut == "lu"): $debTable = "l"; endif;
                                            if($JoursDebut == "ma"): $debTable = "m"; endif;
                                            if($JoursDebut == "me"): $debTable = "me"; endif;
                                            if($JoursDebut == "je"): $debTable = "j"; endif;
                                            if($JoursDebut == "ve"): $debTable = "v"; endif;
                                            if($JoursDebut == "sa"): $debTable = "s"; endif;
                                            if($JoursDebut == "di"): $debTable = "d"; endif;
                                            /*FIN EXTRACTION JOUR POINTAGE DEBUT TABLE*/

                                            if ($i == 0): /*TEST SI PREMIERE BOUCLE PREMIER JOUR */

                                          if($matin == "a1") : /*SI LA DEMANDE CONCERNE l APRES MIDI */
                                             $fin = "a2" ; /*LIMITE HORRAIRE */


                                          foreach ($horraire as $row)
                                          { /*BOUCLE SUR LES HORRAIRE DU JOURS*/

                                             /*------- VARIABLE DEBUT ET FIN HORRAIRE ---------------*/
                                             $debutA = $row[$debTable.$matin] ;
                                             $finA = $row[$debTable.$fin] ;
                                             /*------- VARIABLE DEBUT ET FIN HORRAIRE ---------------*/

                                            if ($debutA != "") :



                                            $horraireDebut = $HeureDebut.":".$MinuteDebut ; /*DEFINIT L'HEURE D'AFFICHAGE + 15 a 30 MIN*/


$heure_deb_retour  = new Time($horraireDebut) ;
$heure_fin_retour  = new Time($finA) ;

$heure_deb_retour = $heure_deb_retour->i18nFormat('HH:mm');
$heure_fin_retour = $heure_fin_retour->i18nFormat('HH:mm');

/*NOMBRE DE 1/4 HEURE A RECUPERER POUR LIMITER LA BOUCLE*/
$Limite_q = LimiteCreneau($heure_deb_retour,$heure_fin_retour);

array_push( $tableauRetour , AffichageHorraire($heure_deb_retour,$Limite_q, $date_affichage,$LatWash,$LonWash,$lat,$lon,$delais,$indispoPreparateur,$i,$row2->preparateur_id,$TableauHorraire,$i,$preparateur->click,$indisponibiliteVacant) );


endif; /*FIN TEST SI DISPONIBLE HORRAIRE*/

} /* FIN BOUCLE SUR LES HORRAIRE DU JOURS*/

endif; /*FIN TEST APRES MIDI */

if($matin == "m1") :  /*SI LA DEMANDE CONCERNE lE MATIN */
$fin = "m2" ;

foreach ($horraire as $row)
{ /*BOUCLE SUR LES HORRAIRE DU JOURS*/

/*------- VARIABLE DEBUT ET FIN HORRAIRE ---------------*/
$debutA = $row[$debTable.'a1'] ;
$finA = $row[$debTable.'a2'] ;
$debutM = $row[$debTable.$matin] ;
$finM = $row[$debTable.$fin] ;
/*------- VARIABLE DEBUT ET FIN HORRAIRE ---------------*/

if ($debutM != "") :



$horraireDebut = $HeureDebut.":".$MinuteDebut ; /*DEFINIT L'HEURE D'AFFICHAGE + 15 a 30 MIN*/



/*---------------------------------------------DEBUT BOUCLE CRENEAU HORRAIRE */
$heure_deb_retour  = new Time($horraireDebut) ;
$heure_fin_retour  = new Time($finM) ;

$heure_deb_retour = $heure_deb_retour->i18nFormat('HH:mm');
$heure_fin_retour = $heure_fin_retour->i18nFormat('HH:mm');

/*NOMBRE DE 1/4 HEURE A RECUPERER POUR LIMITER LA BOUCLE*/
$Limite_q = LimiteCreneau($heure_deb_retour,$heure_fin_retour);

array_push( $tableauRetour , AffichageHorraire($heure_deb_retour,$Limite_q, $date_affichage,$LatWash,$LonWash,$lat,$lon,$delais,$indispoPreparateur,$i,$row2->preparateur_id,$TableauHorraire,$i,$preparateur->click,$indisponibiliteVacant) );

/*---------------------------------------------FIN BOUCLE CRENEAU HORRAIRE */

endif; /*FIN TEST SI DISPONIBLE HORRAIRE MATIN*/

if ($debutA != "") :



/*---------------------------------------------DEBUT BOUCLE CRENEAU HORRAIRE */
$heure_deb_retour  = new Time($debutA) ;
$heure_fin_retour  = new Time($finA) ;

$heure_deb_retour = $heure_deb_retour->i18nFormat('HH:mm');
$heure_fin_retour = $heure_fin_retour->i18nFormat('HH:mm');

/*NOMBRE DE 1/4 HEURE A RECUPERER POUR LIMITER LA BOUCLE*/
$Limite_q = LimiteCreneau($heure_deb_retour,$heure_fin_retour);

array_push( $tableauRetour , AffichageHorraire($heure_deb_retour,$Limite_q, $date_affichage,$LatWash,$LonWash,$lat,$lon,$delais,$indispoPreparateur,$i,$row2->preparateur_id,$TableauHorraire,$i,$preparateur->click,$indisponibiliteVacant) );

/*---------------------------------------------FIN BOUCLE CRENEAU HORRAIRE */

endif; /*FIN TEST SI DISPONIBLE HORRAIRE APRES MIDI*/

} /* FIN BOUCLE SUR LES HORRAIRE DU JOURS*/

endif; /*FIN TEST MATIN */

endif; /* FIN TEST SI PREMIERE BOUCLE PREMIER JOUR */

if ($i != 0): /*TEST SI JOUR 2 */
$matin = "m1";
$fin = "m2" ;

foreach ($horraire as $row)
{ /*BOUCLE SUR LES HORRAIRE DU JOURS*/

/*------- VARIABLE DEBUT ET FIN HORRAIRE ---------------*/
$debutA = $row[$debTable.'a1'] ;
$finA = $row[$debTable.'a2'] ;
$debutM = $row[$debTable.$matin] ;
$finM = $row[$debTable.$fin] ;
/*------- VARIABLE DEBUT ET FIN HORRAIRE ---------------*/

if ($debutM != "") :



/*---------------------------------------------DEBUT BOUCLE CRENEAU HORRAIRE */
$heure_deb_retour  = new Time($debutM) ;
$heure_fin_retour  = new Time($finM) ;

$heure_deb_retour = $heure_deb_retour->i18nFormat('HH:mm');
$heure_fin_retour = $heure_fin_retour->i18nFormat('HH:mm');

/*NOMBRE DE 1/4 HEURE A RECUPERER POUR LIMITER LA BOUCLE*/
$Limite_q = LimiteCreneau($heure_deb_retour,$heure_fin_retour);

array_push( $tableauRetour , AffichageHorraire($heure_deb_retour,$Limite_q, $date_affichage,$LatWash,$LonWash,$lat,$lon,$delais,$indispoPreparateur,$i,$row2->preparateur_id,$TableauHorraire,$i,$preparateur->click,$indisponibiliteVacant) );
/*---------------------------------------------FIN BOUCLE CRENEAU HORRAIRE */

                                              endif; /*FIN TEST SI DISPONIBLE HORRAIRE MATIN*/

if ($debutA != "") :




/*---------------------------------------------DEBUT BOUCLE CRENEAU HORRAIRE */


$heure_deb_retour = $debutA;
$heure_fin_retour = $finA;

/*NOMBRE DE 1/4 HEURE A RECUPERER POUR LIMITER LA BOUCLE*/
$Limite_q = LimiteCreneau($debutA,$finA);

array_push( $tableauRetour , AffichageHorraire($heure_deb_retour,$Limite_q, $date_affichage,$LatWash,$LonWash,$lat,$lon,$delais,$indispoPreparateur,$i,$row2->preparateur_id,$TableauHorraire,$i,$preparateur->click,$indisponibiliteVacant) );
/*---------------------------------------------FIN BOUCLE CRENEAU HORRAIRE */

endif; /*FIN TEST SI DISPONIBLE HORRAIRE APRES MIDI*/

                                             } /* FIN BOUCLE SUR LES HORRAIRE DU JOURS*/


                                            endif;


                                          } /*FIN BOUCLE DES 21 JOURS*/

                                        }  /*FIN DU TEST SI PRESTATIONS ID EST OK */

                                endforeach;

                              }

                            }



$result = count($tableauRetour);  /*Calcul le nombre d'entree dans le tableau*/

/*------------------- CREATION DU TABLEAU UNIQUE --------------------------*/
$TableauFinalHoraire = array();
for ($i=0; $i < $result; $i++) {
  $TableauFinalHoraire = array_merge($TableauFinalHoraire+$tableauRetour[$i]);
}
/*------------------- FIN CREATION DU TABLEAU UNIQUE --------------------------*/


/*------------------- TRI TABLEAU WACHER CLICKAND WASH --------------------------*/
$TableauWasherClick = array();
foreach($TableauFinalHoraire as $cle1 => $valeur1)
{


    foreach ($valeur1 as $cle2)

    {
      if ($cle2 == 1) /*Si le preparateur est un cosmeticar*/
      {
        $GroupeClick = 1 ;
        break;
      }
      else {
          $GroupeClick = 0 ;
          break;
      }
    }

if ($GroupeClick == 1):
    foreach ($valeur1 as $cle2=>$valeur2)

    {
      $TableauWasherClick[$cle1][$cle2] = $valeur2 ;
    }
endif;
}
/*------------------- FIN TABLEAU WACHER CLICKAND WASH --------------------------*/

/*------------------- TRI TABLEAU WACHER CLICKAND WASH --------------------------*/
$TableauWasherNoClick = array();
foreach($TableauFinalHoraire as $cle1 => $valeur1)
{


    foreach ($valeur1 as $cle2)

    {
      if ($cle2 == 0) /*Si le preparateur n'est pas un cosmeticar*/
      {
        $GroupeClick = 1 ;
        break;
      }
      else {
          $GroupeClick = 0 ;
          break;
      }
    }

if ($GroupeClick == 1):
    foreach ($valeur1 as $cle2=>$valeur2)

    {
      $TableauWasherNoClick[$cle1][$cle2] = $valeur2 ;
    }
endif;
}
/*------------------- FIN TABLEAU WACHER CLICKAND WASH --------------------------*/

$TableauWasherClick = melange($TableauWasherClick); /*MELANGE TABLEAU COSMETICAR WASHER*/
$TableauWasherClick = unique_multidim_array($TableauWasherClick,'Unique'); /*SUPPRESSION DOUBLON TABLEAU COSMETICAR WASHER*/



$TableauWasherNoClick = melange($TableauWasherNoClick); /*MELANGE TABLEAU NON COSMETICAR WASHER*/
$TableauWasherNoClick = unique_multidim_array($TableauWasherNoClick,'Unique'); /*SUPPRESSION DOUBLON TABLEAU NON COSMETICAR WASHER*/


$TableauWacherR = array_merge($TableauWasherClick,$TableauWasherNoClick); /*FUSION DES TABLEAU COSMETICAR WASHER ET NON COSMETICAR =======> $TableauWacherR = TABLEAU FINAL*/
$TableauWacherR = unique_multidim_array($TableauWacherR,'Unique'); /*SUPPRESSION DOUBLON $TableauWacherR*/
$TableauWacherR = TriTableau($TableauWacherR,'Unique', SORT_ASC);  /*TRI $TableauWacherR*/

echo json_encode($TableauWacherR); /*TABLEAU FORMAT JSON*/

exit();



/*CALCUL DES WATCHERS DANS UN RAYON DE 50 KM*/

    $this->set([
        'success' => true,
        'data' => [
        'Vehicule' => $info_data->vehicule_id,
        'Adresse' => $info_data->adresse_id ,
        'lat' => $lat,
        'lon' => $lon,
        'Prestation ' => $info_data->prestation_id,
        'Duree ' => $duree_presta,
        'Tarif ' => $tarif_presta,
        'Type' => $type_vehicule
         ],
        'preparateur' => [
        'AdresseLat' => $adresseLat
         ],
        '_serialize' => ['success', 'data','preparateur']
    ]);
  }


     public function recherche()
     {

       $preparateurs = $this->Preparateurs->find('all');

       $user  = $this->Auth->identify();

       $client = $this->Clients->get($user['sub']);


       $success_v = true ;
       $success_a = true ;
       if ($client['vehiculeclient_id'] == "")
       {
         $success_v = false ;
       }
       if ($client['adresseclient_id'] == "")
       {
         $success_a = false ;
       }

       $this->set([
           'success' => true,
           'vehicule' => $success_v,
           'adresse' => $success_a,
           'data' => [
           'infoclient' =>
           [
           'name' => $client['name'] ,
           'prenom' => $client['prenom'] ,
           'mail' => $client['mail'] ,
           'adresse' => $client['adresseclient_id']
           ] ,
           'preparateurs' => $preparateurs
            ],

           '_serialize' => ['success', 'vehicule' , 'adresse' , 'data']
       ]);


     }

}
