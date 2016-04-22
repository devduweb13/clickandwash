
<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>

<span class="pull-right"> <?= $this->Html->link('Ajouter','/users/add',['class' => 'btn btn-success'],['escape' => false]); ?></span>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Utilisateurs</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Role</th>
          <th>Créé le</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($users as $user): ?>
        <tr class="grade<?= $this->Number->format($user->id) ?>">
          <td><?= h($user->username) ?></td>
          <td><?= h($user->role) ?></td>
          <td><?= h($user->created) ?></td>
          <td class="center">
            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
