<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Horraires'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="horraires form large-9 medium-8 columns content">
    <?= $this->Form->create($horraire) ?>
    <fieldset>
        <legend><?= __('Add Horraire') ?></legend>
        <?php
            echo $this->Form->input('preparateur_id');
            echo $this->Form->input('lm1');
            echo $this->Form->input('lm2');
            echo $this->Form->input('la1');
            echo $this->Form->input('la2');
            echo $this->Form->input('mm1');
            echo $this->Form->input('mm2');
            echo $this->Form->input('ma1');
            echo $this->Form->input('ma2');
            echo $this->Form->input('mem1');
            echo $this->Form->input('mem2');
            echo $this->Form->input('mea1');
            echo $this->Form->input('mea2');
            echo $this->Form->input('jm1');
            echo $this->Form->input('jm2');
            echo $this->Form->input('ja1');
            echo $this->Form->input('ja2');
            echo $this->Form->input('vm1');
            echo $this->Form->input('vm2');
            echo $this->Form->input('va1');
            echo $this->Form->input('va2');
            echo $this->Form->input('sm1');
            echo $this->Form->input('sm2');
            echo $this->Form->input('sa1');
            echo $this->Form->input('sa2');
            echo $this->Form->input('dm1');
            echo $this->Form->input('dm2');
            echo $this->Form->input('da1');
            echo $this->Form->input('da2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
