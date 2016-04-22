<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Horraire'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horraires index large-9 medium-8 columns content">
    <h3><?= __('Horraires') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('preparateur_id') ?></th>
                <th><?= $this->Paginator->sort('lm1') ?></th>
                <th><?= $this->Paginator->sort('lm2') ?></th>
                <th><?= $this->Paginator->sort('la1') ?></th>
                <th><?= $this->Paginator->sort('la2') ?></th>
                <th><?= $this->Paginator->sort('mm1') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horraires as $horraire): ?>
            <tr>
                <td><?= $this->Number->format($horraire->id) ?></td>
                <td><?= $this->Number->format($horraire->preparateur_id) ?></td>
                <td><?= h($horraire->lm1) ?></td>
                <td><?= h($horraire->lm2) ?></td>
                <td><?= h($horraire->la1) ?></td>
                <td><?= h($horraire->la2) ?></td>
                <td><?= h($horraire->mm1) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $horraire->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $horraire->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $horraire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horraire->id)]) ?>
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
