
<div class="marques view large-9 medium-8 columns content">
    <h3><?= h($marque->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($marque->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($marque->id) ?></td>
        </tr>
    </table>

    <div class="related">
        <h4><?= __('Related Vehicules') ?></h4>
        <?php if (!empty($marque->vehicules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Marque Id') ?></th>
                <th><?= __('Modele Id') ?></th>
                <th><?= __('Annee') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($marque->vehicules as $vehicules): ?>
            <tr>
                <td><?= h($vehicules->id) ?></td>
                <td><?= h($vehicules->marque_id) ?></td>
                <td><?= h($vehicules->modele_id) ?></td>
                <td><?= h($vehicules->annee) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehicules', 'action' => 'view', $vehicules->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicules', 'action' => 'edit', $vehicules->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehicules', 'action' => 'delete', $vehicules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicules->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="fa fa-user"></i></span>
    <h5>Les modèles <?= h($marque->name) ?></h5>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
<?php foreach ($marque->modeles as $modeles): ?>
        <tr class="grade<?= $this->Number->format($marque->id) ?>">
          <td><?= $this->Number->format($modeles->id) ?></td>
          <td><?= h($modeles->name) ?></td>
          <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['controller' => 'Modeles','action' => 'edit', $modeles->id],['escape' => false]) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['controller' => 'Modeles','action' => 'delete', $modeles->id], ['confirm' => __('Etes vous certain de vouloir supprimer {0}?', $modeles->name) , 'escape' => false ]) ?>
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
