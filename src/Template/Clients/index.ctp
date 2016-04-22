<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Clients</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>tel</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($clients as $client): ?>
        <tr class="grade<?= $this->Number->format($client->id) ?>">
          <td><?= $this->Number->format($client->id) ?></td>
          <td><?= h($client->name) ?></td>
          <td><?= h($client->prenom) ?></td>
        
          <td><?= h($client->mail) ?></td>
          <td><?= h($client->tel) ?></td>
          <td class="actions">
            <?= $this->Html->link(__('<i class="fa fa-search"></i>'), ['action' => 'edit', $client->id],['escape' => false]) ?>
            <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $client->id], ['confirm' => __('Etes vous certain de vouloir supprimer {0}?', $client->name) , 'escape' => false ]) ?>

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
