<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
$bdd = new PDO('mysql:host=localhost;dbname=clickandwash;charset=utf8', 'root','');
?>
<div class="row-fluid">
<div class="span8">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Chiffre d'affaire des points de ventes</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <tr>
            <th>ID</th>
            <th>Nom du point de vente</th>
            <th>Nombre de facture</th>
            <th>CA</th>
            <th>CA reversé</th>
            <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($pointdeventes as $pointdevente): ?>
        <tr class="grade<?= $this->Number->format($pointdevente->id) ?>">
          <td><?= $this->Number->format($pointdevente->id) ?></td>
          <td><?= h($pointdevente->nom) ?></td>
          <td>
            <?php
            $reponse2 = $bdd->query("SELECT count(id) as nbrdv FROM paiements WHERE preparateur_id = '".$pointdevente->id ."' ");
            $donnees = $reponse2->fetch();
            $reponse2->closeCursor();
            echo $donnees['nbrdv'];
             ?>
          </td>
          <td>
            <?php
            $reponse2 = $bdd->query("SELECT id,SUM(montant) FROM paiements WHERE preparateur_id = '".$pointdevente->id ."' ");
            while ($donnees2 = $reponse2->fetch())
             {
               echo $donnees2['SUM(montant)']." €";
               $montantligne =  $donnees2['SUM(montant)'];
             }
             ?></td>
            <td>
              <?php echo ($taux * $montantligne) / 100 ."€" ; ?>
            </td>
          <td class="actionss">
              <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $pointdevente->id],['escape' => false]) ?>
          </td>

        </tr>
  <?php endforeach; ?>

      </tbody>
    </table>

  </div>
</div>
</div>

<div class="span4">
  <ul class="stat-boxes2">
    <li>
      <div class="left peity_bar_neutral"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">2,4,9,7,12,10,12</span><canvas width="50" height="24"></canvas></span>
        <canvas width="50" height="24"></canvas>
        </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span>+10%</div>
      <div class="right"> <strong><?php echo $sommestotalwashers ?>€</strong> CA ANNUEL </div>
    </li>

    <li>
      <div class="left peity_bar_neutral"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">2,4,9,7,12,10,12</span><canvas width="50" height="24"></canvas></span>
        <canvas width="50" height="24"></canvas>
      </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span><?php echo $taux; ?>%</div>
      <div class="right"> <strong><?php echo $tauxtotal ?>€</strong> CA ANNUEL reversé </div>
    </li>

  </ul>
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
echo $this->Html->script(['jquery.flot.min']);
echo $this->Html->script(['jquery.flot.resize.min']);
echo $this->Html->script(['matrix.dashboard']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
