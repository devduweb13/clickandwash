<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/

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
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($vehicules as $vehicule): ?>
      <td><?= $this->Number->format($vehicule->id) ?></td>
      <td><?= $vehicule->has('marque') ? $this->Html->link($vehicule->marque->name, ['controller' => 'Marques', 'action' => 'view', $vehicule->marque->id]) : '' ?></td>
      <td><?= $vehicule->has('modele') ? $this->Html->link($vehicule->modele->name, ['controller' => 'Modeles', 'action' => 'view', $vehicule->modele->id]) : '' ?></td>
      <td><?= h($vehicule->annee) ?></td>
          <td class="actions">
  <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $vehicule->id],['escape' => false]) ?>
  <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $vehicule->id], ['confirm' => __('Etes vous certain de vouloir supprimer {0}?', $vehicule->nom) , 'escape' => false ]) ?>

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
