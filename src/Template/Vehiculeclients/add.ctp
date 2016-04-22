<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehiculeclients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiculeclients form large-9 medium-8 columns content">
    <?= $this->Form->create($vehiculeclient) ?>
    <fieldset>
        <legend><?= __('Add Vehiculeclient') ?></legend>
        <?php
            echo $this->Form->input('vehicule_id', ['options' => $vehicules]);
            echo $this->Form->input('annee');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
