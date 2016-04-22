<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Horraire'), ['action' => 'edit', $horraire->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Horraire'), ['action' => 'delete', $horraire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horraire->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Horraires'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horraire'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="horraires view large-9 medium-8 columns content">
    <h3><?= h($horraire->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Lm1') ?></th>
            <td><?= h($horraire->lm1) ?></td>
        </tr>
        <tr>
            <th><?= __('Lm2') ?></th>
            <td><?= h($horraire->lm2) ?></td>
        </tr>
        <tr>
            <th><?= __('La1') ?></th>
            <td><?= h($horraire->la1) ?></td>
        </tr>
        <tr>
            <th><?= __('La2') ?></th>
            <td><?= h($horraire->la2) ?></td>
        </tr>
        <tr>
            <th><?= __('Mm1') ?></th>
            <td><?= h($horraire->mm1) ?></td>
        </tr>
        <tr>
            <th><?= __('Mm2') ?></th>
            <td><?= h($horraire->mm2) ?></td>
        </tr>
        <tr>
            <th><?= __('Ma1') ?></th>
            <td><?= h($horraire->ma1) ?></td>
        </tr>
        <tr>
            <th><?= __('Ma2') ?></th>
            <td><?= h($horraire->ma2) ?></td>
        </tr>
        <tr>
            <th><?= __('Mem1') ?></th>
            <td><?= h($horraire->mem1) ?></td>
        </tr>
        <tr>
            <th><?= __('Mem2') ?></th>
            <td><?= h($horraire->mem2) ?></td>
        </tr>
        <tr>
            <th><?= __('Mea1') ?></th>
            <td><?= h($horraire->mea1) ?></td>
        </tr>
        <tr>
            <th><?= __('Mea2') ?></th>
            <td><?= h($horraire->mea2) ?></td>
        </tr>
        <tr>
            <th><?= __('Jm1') ?></th>
            <td><?= h($horraire->jm1) ?></td>
        </tr>
        <tr>
            <th><?= __('Jm2') ?></th>
            <td><?= h($horraire->jm2) ?></td>
        </tr>
        <tr>
            <th><?= __('Ja1') ?></th>
            <td><?= h($horraire->ja1) ?></td>
        </tr>
        <tr>
            <th><?= __('Ja2') ?></th>
            <td><?= h($horraire->ja2) ?></td>
        </tr>
        <tr>
            <th><?= __('Vm1') ?></th>
            <td><?= h($horraire->vm1) ?></td>
        </tr>
        <tr>
            <th><?= __('Vm2') ?></th>
            <td><?= h($horraire->vm2) ?></td>
        </tr>
        <tr>
            <th><?= __('Va1') ?></th>
            <td><?= h($horraire->va1) ?></td>
        </tr>
        <tr>
            <th><?= __('Va2') ?></th>
            <td><?= h($horraire->va2) ?></td>
        </tr>
        <tr>
            <th><?= __('Sm1') ?></th>
            <td><?= h($horraire->sm1) ?></td>
        </tr>
        <tr>
            <th><?= __('Sm2') ?></th>
            <td><?= h($horraire->sm2) ?></td>
        </tr>
        <tr>
            <th><?= __('Sa1') ?></th>
            <td><?= h($horraire->sa1) ?></td>
        </tr>
        <tr>
            <th><?= __('Sa2') ?></th>
            <td><?= h($horraire->sa2) ?></td>
        </tr>
        <tr>
            <th><?= __('Dm1') ?></th>
            <td><?= h($horraire->dm1) ?></td>
        </tr>
        <tr>
            <th><?= __('Dm2') ?></th>
            <td><?= h($horraire->dm2) ?></td>
        </tr>
        <tr>
            <th><?= __('Da1') ?></th>
            <td><?= h($horraire->da1) ?></td>
        </tr>
        <tr>
            <th><?= __('Da2') ?></th>
            <td><?= h($horraire->da2) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($horraire->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Preparateur Id') ?></th>
            <td><?= $this->Number->format($horraire->preparateur_id) ?></td>
        </tr>
    </table>
</div>
