<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adresseclient'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adresseclients index large-9 medium-8 columns content">
    <h3><?= __('Adresseclients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('adresse') ?></th>
                <th><?= $this->Paginator->sort('cp') ?></th>
                <th><?= $this->Paginator->sort('ville') ?></th>
                <th><?= $this->Paginator->sort('lat') ?></th>
                <th><?= $this->Paginator->sort('lon') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adresseclients as $adresseclient): ?>
            <tr>
                <td><?= $this->Number->format($adresseclient->id) ?></td>
                <td><?= h($adresseclient->name) ?></td>
                <td><?= h($adresseclient->adresse) ?></td>
                <td><?= $this->Number->format($adresseclient->cp) ?></td>
                <td><?= h($adresseclient->ville) ?></td>
                <td><?= h($adresseclient->lat) ?></td>
                <td><?= h($adresseclient->lon) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adresseclient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adresseclient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adresseclient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adresseclient->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
