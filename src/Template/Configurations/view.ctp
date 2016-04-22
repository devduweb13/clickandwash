<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Configuration'), ['action' => 'edit', $configuration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Configuration'), ['action' => 'delete', $configuration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configuration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Configurations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Configuration'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="configurations view large-9 medium-8 columns content">
    <h3><?= h($configuration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom Exp') ?></th>
            <td><?= h($configuration->nom_exp) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Exp') ?></th>
            <td><?= h($configuration->email_exp) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($configuration->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Taux Tva') ?></th>
            <td><?= $this->Number->format($configuration->taux_tva) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($configuration->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($configuration->modified) ?></td>
        </tr>
    </table>
</div>
