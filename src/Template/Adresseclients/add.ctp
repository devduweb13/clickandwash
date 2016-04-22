<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adresseclients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adresseclients form large-9 medium-8 columns content">
    <?= $this->Form->create($adresseclient) ?>
    <fieldset>
        <legend><?= __('Add Adresseclient') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('adresse');
            echo $this->Form->input('cp');
            echo $this->Form->input('ville');
            echo $this->Form->input('lat');
            echo $this->Form->input('lon');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
