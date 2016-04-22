<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicule'), ['action' => 'edit', $vehicule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicule'), ['action' => 'delete', $vehicule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marques'), ['controller' => 'Marques', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marque'), ['controller' => 'Marques', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modeles'), ['controller' => 'Modeles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modele'), ['controller' => 'Modeles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicules view large-9 medium-8 columns content">
    <h3><?= h($vehicule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Marque') ?></th>
            <td><?= $vehicule->has('marque') ? $this->Html->link($vehicule->marque->name, ['controller' => 'Marques', 'action' => 'view', $vehicule->marque->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modele') ?></th>
            <td><?= $vehicule->has('modele') ? $this->Html->link($vehicule->modele->name, ['controller' => 'Modeles', 'action' => 'view', $vehicule->modele->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Annee') ?></th>
            <td><?= h($vehicule->annee) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicule->id) ?></td>
        </tr>
    </table>
</div>
