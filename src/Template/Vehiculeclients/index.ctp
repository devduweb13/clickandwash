<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
$bdd = new PDO('mysql:host=localhost;dbname=clickandwash;charset=utf8', 'root','');
?>

<span class="pull-right"> <?= $this->Html->link(__(' Ajouter'),'/vehicules/add/',['class' => 'btn btn-success']); ?></span>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Listes des véhicules</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Marque</th>
          <th>Model</th>
          <th>Année</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($vehiculeclients as $vehiculeclient): ?>
      <td><?= $vehiculeclient->vehicule_id ;?></td>
      <?php
      $reponse = $bdd->query("SELECT * FROM vehicules WHERE id = '".$vehiculeclient->vehicule_id ."' ");
      while ($donnees = $reponse->fetch())
       {
         $marque =  $donnees['marque_id'] ;

         $reponse2 = $bdd->query("SELECT * FROM marques WHERE id = '".$marque."' ");
         while ($donnees2 = $reponse2->fetch())
          {
            echo "<td>".$donnees2['name'].'</td> ';
          }

         $modele = $donnees['modele_id'] ;

         $reponse3 = $bdd->query("SELECT * FROM modeles WHERE id = '".$modele."' ");
         while ($donnees3 = $reponse3->fetch())
          {
            echo "<td>".$donnees3['name']."</td>";
          }

       }
       ?>
      <td><?= $vehiculeclient->annee ?></td>

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
