<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
$bdd = new PDO('mysql:host=localhost;dbname=clickandwash;charset=utf8', 'root','');
?>

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-clock-o"></i></span>
    <h5>Mes rendez-vous</h5>
    <span class="pull-right">
       <?= $this->Html->link('<i class="fa fa-calendar"></i> Exporter ',['action' => 'exportcal'],['class' => 'btn btn-success', 'escape' => false]); ?>
     </span>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Client</th>
          <th>Téléphone</th>
          <th>Adresse</th>
          <th>Prestation</th>
          <th>Montant</th>
          <th>Paiement</th>
          <th>Note</th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($rdvwashers as $rdvwasher): ?>
        <tr class="grade<?= $this->Number->format($rdvwasher->id) ?>">
          <?php
          $dateDebut = $rdvwasher->debut;
          $dateFin = $rdvwasher->fin;
          ?>
          <td><?php echo str_replace( 'UTC', '',$this->Time->format($dateDebut, \IntlDateFormatter::TRADITIONAL) ) ?> </td>
          <td><?php echo str_replace( ';', '',$clientsNom[$rdvwasher->client_id] )?></td>
          <td><?php echo str_replace( ';', '',$clientsTel[$rdvwasher->client_id] )?></td>
          <td><?php echo str_replace( ';', '',$adresseclient[$rdvwasher->adresseclient_id] ) . ' '.str_replace( ';', '',$cpclient[$rdvwasher->adresseclient_id] ).' '.str_replace( ';', '',$villeclient[$rdvwasher->adresseclient_id] ) ?></td>
          <td><?php echo str_replace( ';', '',$prestation[$rdvwasher->prestation_id] ) ?></td>
          <td>
<?php
$reponse = $bdd->query("SELECT * FROM vehicules WHERE id = '".$rdvwasher->vehicule_id ."' ");
       while ($donnees = $reponse->fetch())
       {
         $reponse2 = $bdd->query("SELECT * FROM modeles WHERE id = '".$donnees['modele_id'] ."' ");
                while ($donnees2 = $reponse2->fetch())
                {
                     $tarif =  $donnees2['type'];
                     if ($tarif == 0): /*Si tarif pas définit en fonction du véhicule tarif 1 appliqué*/
                       $tarif = 1 ;
                     endif;

                     $reponse3 = $bdd->query("SELECT * FROM prestations WHERE id = '".$rdvwasher->prestation_id."' ");
                            while ($donnees3 = $reponse3->fetch())
                            {
                                 echo $donnees3['tarif'.$tarif]. "€";
                            }

                }
       }
?>
          </td>
          <td>
            <?php
            $reponse = $bdd->query("SELECT * FROM paiements WHERE rdv_id = '".$rdvwasher->id ."' ");
                   while ($donnees = $reponse->fetch())
                   {
                     echo $donnees["montant"]. "€";
                   }
             ?>
          </td>
          <td>
            <?php
            $reponse = $bdd->query("SELECT * FROM noterdvs WHERE rdv_id = '".$rdvwasher->id ."' ");
                   while ($donnees = $reponse->fetch())
                   {
                     echo $donnees["note"]. " / 5";
                   }
             ?>

          </td>
          <td>
            <?php
if ($rdvwasher->etat == 0): echo "A venir"; endif;
if ($rdvwasher->etat == 1): echo "Réalisé"; endif;
if ($rdvwasher->etat == 2): echo "Annulation client"; endif;
if ($rdvwasher->etat == 3): echo "Annulation préparateur"; endif;
             ?>
          </td>

        </tr>
  <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</div>

<?php
/*CHARGEMENT JAVASCRIPT SPECIFIQUE*/
$this->start('scriptBottom');
echo $this->Html->script(['select2.min']);
echo $this->Html->script(['jquery.dataTables.min']);
echo $this->Html->script(['matrix']);
echo $this->Html->script(['matrix.tables']);
echo $this->Html->script(['jquery.uniform']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
