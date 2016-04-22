<?php
$bdd = new PDO('mysql:host=localhost;dbname=clickandwash;charset=utf8', 'root','');

$id_users = $_POST['id_users'];
$jours = $_POST['jours'];
if ($jours <= 9):
$jours = "0".$jours;
endif;
$date_test = date("Y-".$jours."-01") ;
$date_test2 = date("Y-".$jours."-31") ;
$reponse = $bdd->query("SELECT preparateur_id,date,SUM(montant) FROM paiements WHERE (preparateur_id = '".$id_users."') AND (date BETWEEN  '".$date_test."' AND '".$date_test2."') ");
       while ($donnees = $reponse->fetch())
       {
        $data = $donnees['SUM(montant)'] ;
       }
       echo $data;
?>
