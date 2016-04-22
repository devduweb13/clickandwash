<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehiculeclients'), ['controller' => 'Vehiculeclients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiculeclient'), ['controller' => 'Vehiculeclients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adresseclients'), ['controller' => 'Adresseclients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adresseclient'), ['controller' => 'Adresseclients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clients view large-9 medium-8 columns content">
    <h3><?= h($client->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($client->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Prenom') ?></th>
            <td><?= h($client->prenom) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehiculeclient') ?></th>
            <td><?= $client->has('vehiculeclient') ? $this->Html->link($client->vehiculeclient->id, ['controller' => 'Vehiculeclients', 'action' => 'view', $client->vehiculeclient->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Adresseclient') ?></th>
            <td><?= $client->has('adresseclient') ? $this->Html->link($client->adresseclient->name, ['controller' => 'Adresseclients', 'action' => 'view', $client->adresseclient->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Mail') ?></th>
            <td><?= h($client->mail) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tel') ?></th>
            <td><?= $this->Number->format($client->tel) ?></td>
        </tr>
    </table>
</div>
