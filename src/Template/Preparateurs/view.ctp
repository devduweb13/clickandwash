<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Preparateur'), ['action' => 'edit', $preparateur->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Preparateur'), ['action' => 'delete', $preparateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preparateur->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Preparateurs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Preparateur'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="preparateurs view large-9 medium-8 columns content">
    <h3><?= h($preparateur->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($preparateur->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($preparateur->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Ville') ?></th>
            <td><?= h($preparateur->ville) ?></td>
        </tr>
        <tr>
            <th><?= __('Tel') ?></th>
            <td><?= h($preparateur->tel) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($preparateur->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Prestation') ?></th>
            <td><?= h($preparateur->prestation) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($preparateur->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($preparateur->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Society') ?></th>
            <td><?= $this->Number->format($preparateur->id_society) ?></td>
        </tr>
        <tr>
            <th><?= __('Cp') ?></th>
            <td><?= $this->Number->format($preparateur->cp) ?></td>
        </tr>
        <tr>
            <th><?= __('Rayon') ?></th>
            <td><?= $this->Number->format($preparateur->rayon) ?></td>
        </tr>
    </table>
</div>
