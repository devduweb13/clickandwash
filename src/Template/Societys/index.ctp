<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>

<span class="pull-right"> <?= $this->Html->link(__(' Ajouter'),'/societys/add/',['class' => 'btn btn-success']); ?></span>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Les sociétés</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Contact</th>
              <th>Adresse</th>
              <th>Code postal</th>
              <th>Mail</th>
              <th>Téléphone</th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($societys as $society): ?>
        <tr class="grade<?= $this->Number->format($society->id) ?>">
          <td><?= $this->Number->format($society->id) ?></td>
          <td><?= h($society->name) ?></td>
          <td><?= h($society->contact) ?></td>
          <td><?= h($society->adresse) ?></td>
          <td><?= h($society->cp) ?></td>
          <td><?= h($society->mail) ?></td>
          <td><?= h($society->tel) ?></td>
          <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $society->id],['escape' => false]) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $society->id], ['confirm' => __('Etes vous certain de vouloir supprimer {0}?', $society->name) , 'escape' => false ]) ?>
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
