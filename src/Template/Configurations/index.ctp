<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Configuration'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="configurations index large-9 medium-8 columns content">
    <h3><?= __('Configurations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nom_exp') ?></th>
                <th><?= $this->Paginator->sort('email_exp') ?></th>
                <th><?= $this->Paginator->sort('taux_tva') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($configurations as $configuration): ?>
            <tr>
                <td><?= $this->Number->format($configuration->id) ?></td>
                <td><?= h($configuration->nom_exp) ?></td>
                <td><?= h($configuration->email_exp) ?></td>
                <td><?= $this->Number->format($configuration->taux_tva) ?></td>
                <td><?= h($configuration->created) ?></td>
                <td><?= h($configuration->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $configuration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $configuration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $configuration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configuration->id)]) ?>
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
