<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modele'), ['action' => 'edit', $modele->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modele'), ['action' => 'delete', $modele->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modele->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modeles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modele'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marques'), ['controller' => 'Marques', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marque'), ['controller' => 'Marques', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modeles view large-9 medium-8 columns content">
    <h3><?= h($modele->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($modele->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Marque') ?></th>
            <td><?= $modele->has('marque') ? $this->Html->link($modele->marque->name, ['controller' => 'Marques', 'action' => 'view', $modele->marque->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($modele->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vehicules') ?></h4>
        <?php if (!empty($modele->vehicules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Marque Id') ?></th>
                <th><?= __('Modele Id') ?></th>
                <th><?= __('Annee') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modele->vehicules as $vehicules): ?>
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
