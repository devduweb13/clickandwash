<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adresseclient'), ['action' => 'edit', $adresseclient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adresseclient'), ['action' => 'delete', $adresseclient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adresseclient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adresseclients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adresseclient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adresseclients view large-9 medium-8 columns content">
    <h3><?= h($adresseclient->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($adresseclient->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($adresseclient->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Ville') ?></th>
            <td><?= h($adresseclient->ville) ?></td>
        </tr>
        <tr>
            <th><?= __('Lat') ?></th>
            <td><?= h($adresseclient->lat) ?></td>
        </tr>
        <tr>
            <th><?= __('Lon') ?></th>
            <td><?= h($adresseclient->lon) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($adresseclient->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cp') ?></th>
            <td><?= $this->Number->format($adresseclient->cp) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($adresseclient->clients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Prenom') ?></th>
                <th><?= __('Vehiculeclient Id') ?></th>
                <th><?= __('Adresseclient Id') ?></th>
                <th><?= __('Mail') ?></th>
                <th><?= __('Tel') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adresseclient->clients as $clients): ?>
            <tr>
                <td><?= h($clients->id) ?></td>
                <td><?= h($clients->name) ?></td>
                <td><?= h($clients->prenom) ?></td>
                <td><?= h($clients->vehiculeclient_id) ?></td>
                <td><?= h($clients->adresseclient_id) ?></td>
                <td><?= h($clients->mail) ?></td>
                <td><?= h($clients->tel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clients', 'action' => 'view', $clients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clients', 'action' => 'edit', $clients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clients', 'action' => 'delete', $clients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
