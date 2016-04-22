<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>

<span class="pull-right"> <?= $this->Html->link(__(' Ajouter'),'/modeles/add/',['class' => 'btn btn-success']); ?></span>
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Les modèls auto</h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Marque</th>
          <th>Modele</th>
          <th>Type de tarif</th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($modeles as $modele): ?>
      <tr>
          <td><?= h($modele->id) ?></td>
          <td><?= $modele->has('marque') ? $this->Html->link($modele->marque->name, ['controller' => 'Marques', 'action' => 'view', $modele->marque->id]) : '' ?></td>
          <td><?= h($modele->name) ?></td>
          <td><?php if($modele->type == 1) echo "Tarif A" ; if($modele->type == 2) echo "Tarif B" ; if($modele->type == 3) echo "Tarif C" ;?></td>
          <td class="actions">
  <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $modele->id],['escape' => false]) ?>
  <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $modele->id], ['confirm' => __('Etes vous certain de vouloir supprimer {0}?', $modele->nom) , 'escape' => false ]) ?>

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
