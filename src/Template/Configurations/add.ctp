<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Configurations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="configurations form large-9 medium-8 columns content">
    <?= $this->Form->create($configuration) ?>
    <fieldset>
        <legend><?= __('Add Configuration') ?></legend>
        <?php
            echo $this->Form->input('nom_exp');
            echo $this->Form->input('email_exp');
            echo $this->Form->input('taux_tva');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
