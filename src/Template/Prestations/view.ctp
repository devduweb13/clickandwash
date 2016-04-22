<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prestation'), ['action' => 'edit', $prestation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prestation'), ['action' => 'delete', $prestation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prestation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prestations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prestation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prestations view large-9 medium-8 columns content">
    <h3><?= h($prestation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($prestation->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($prestation->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($prestation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tarif1') ?></th>
            <td><?= $this->Number->format($prestation->tarif1) ?></td>
        </tr>
        <tr>
            <th><?= __('Tarif2') ?></th>
            <td><?= $this->Number->format($prestation->tarif2) ?></td>
        </tr>
        <tr>
            <th><?= __('Tarif3') ?></th>
            <td><?= $this->Number->format($prestation->tarif3) ?></td>
        </tr>
        <tr>
            <th><?= __('Duree1') ?></th>
            <td><?= h($prestation->duree1) ?></td>
        </tr>
        <tr>
            <th><?= __('Duree2') ?></th>
            <td><?= h($prestation->duree2) ?></td>
        </tr>
        <tr>
            <th><?= __('Duree3') ?></th>
            <td><?= h($prestation->duree3) ?></td>
        </tr>
    </table>
</div>
