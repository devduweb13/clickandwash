<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>

<span class="pull-right"> <?= $this->Html->link(__(' Ajouter'),'/preparateurs/add/',['class' => 'btn btn-success']); ?></span>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Les points de vente</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <tr>
            <th>ID</th>
            <th>Société</th>
            <th>Nom du point de vente</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code postal</th>
            <th>Téléphone</th>
            <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($preparateurs as $preparateur): ?>
        <tr class="grade<?= $this->Number->format($preparateur->id) ?>">
          <td><?= $this->Number->format($preparateur->id) ?></td>
          <td><?= h($societys[$preparateur->society_id]) ?></td>
          <td><?= h($preparateur->nom) ?></td>
          <td><?= h($preparateur->adresse) ?></td>
          <td><?= h($preparateur->ville) ?></td>
          <td><?= h($preparateur->cp) ?></td>
          <td><?= h($preparateur->tel) ?></td>
          <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $preparateur->id],['escape' => false]) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $preparateur->id], ['confirm' => __('Etes vous certain de vouloir supprimer {0}?', $preparateur->nom) , 'escape' => false ]) ?>
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
