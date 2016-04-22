<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>

<span class="pull-right"> <?= $this->Html->link(__(' Ajouter'),'/prestations/add/',['class' => 'btn btn-success']); ?></span>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Les prestations</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Tarif A</th>
          <th>Tarif B</th>
          <th>Tarif C</th>
          <th>Durée A</th>
          <th>Durée B</th>
          <th>Durée C</th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($prestations as $prestation): ?>
        <tr class="grade<?= $this->Number->format($prestation->id) ?>">
          <td><?= $this->Number->format($prestation->id) ?></td>
          <td><?= h($prestation->name) ?></td>
          <td><?= $this->Number->format($prestation->tarif1) ?>€</td>
          <td><?= $this->Number->format($prestation->tarif2) ?>€</td>
          <td><?= $this->Number->format($prestation->tarif3) ?>€</td>
          <td><?= $this->Number->format($prestation->duree1) ?>min</td>
          <td><?= $this->Number->format($prestation->duree2) ?>min</td>
          <td><?= $this->Number->format($prestation->duree3) ?>min</td>
          <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $prestation->id],['escape' => false]) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $prestation->id], ['confirm' => __('Etes vous certain de vouloir supprimer {0}?', $prestation->nom) , 'escape' => false ]) ?>
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
