<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehiculeclients'), ['controller' => 'Vehiculeclients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehiculeclient'), ['controller' => 'Vehiculeclients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adresseclients'), ['controller' => 'Adresseclients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adresseclient'), ['controller' => 'Adresseclients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clients form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Add Client') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('name');
            echo $this->Form->input('prenom');
            echo $this->Form->input('vehiculeclient_id',['options' => $vehiculeclients, 'label'=>false , 'multiple' => true ]);
            echo $this->Form->input('adresseclient_id', ['options' => $adresseclients, 'label'=>false , 'multiple' => true]);
            echo $this->Form->input('mail');
            echo $this->Form->input('tel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php
/*CHARGEMENT JAVASCRIPT SPECIFIQUE*/
$this->start('scriptBottom');
echo $this->Html->script(['sol.js']);
echo $this->Html->script(['jquery.datetimepicker.full.min.js']);
echo $this->Html->script(['preparateur.js']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
