<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class DispoComponent extends Component
{
  public function AffichageHorraire($FnHeure_deb_retour,$FnLimite_q ,$FnDateAffichage,$FnLat_wash,$FnLon_wash,$Fnlat,$Fnlon,$Fndelais,$FnindispoPreparateur)
  {

    /*TEST SI INDISPO*/
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
    /*FIN TEST SI INDISPO*/

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
         $delais =  $data['routes'][0]['legs'][0]['duration']['text'] . '---------';
         /*------------------------------------------FIN CALCUL ITINERAIRE ENTRE LES POINTS DE RDV LAT ET LONG VIA API GOOGLE*/

         $delais = (int)$delais; /*RECUPERATION EN MINUTE DELAIS TRAJET*/
         $debutDispoTest  = new Time($test_indispo_fin);
         $debutDispoTest->addMinutes($delais );
         $debutDispoTest = $debutDispoTest->i18nFormat('HH:mm'); /*HEURE DE RETOUR PLUS TRAJET DU RDV */

        endif;  /*FIN TEST SI INDISPO MAJ COORDONNE LAT LON DU DERNIER RDV*/



       if($heure_deb_retour2 > $debutDispoTest):
        echo ' RDV Possible à '.$heure_deb_retour2;
        echo  " Lat Départ : ".$FnLat_wash. " Lon Départ : ".$FnLon_wash." --- Lat Arrivee : ".$Fnlat." Lon Arrivee : ".$Fnlon." --- Delais : ".$delais ."Min Retour --- ".$debutDispoTest."<br/>";
       endif;

      }

    } /*FIN DE BOUCLE HORRAIRE FOR*/
  } /*--------------------------------------------------------------------FIN function AffichageHorraire */

}
