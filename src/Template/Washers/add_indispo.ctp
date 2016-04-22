<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['jquery.datetimepicker']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>
<?= $this->Form->create($indispo,['class'=>'form-horizontal']) ?>
<input type="hidden" name="preparateur_id" value="111">
<div class="row-fluid">

<div class="span3"></div>

<div class="span6">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="fa fa-clock-o"></i> </span>
      <h5><?= __('Ajouter une indisponibilité') ?></h5>
    </div>
    <div class="widget-content nopadding">



        <div class="control-group">
          <label class="control-label tip-right">Heure début <span class="champ_requis"> * </span></label>
          <div class="controls">
          <input type="text" name="debut" class="input_h" id="debut"></input>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label tip-right">Heure de fin <span class="champ_requis"> * </span></label>
          <div class="controls">
          <input type="text" name="fin" id="fin" class="fin"></input>
          </div>
        </div>



        <div class="form-actions">
        <div class="pull-left"><?= $this->Html->link(__('Retour'), ['action' => 'indispo'], ['class' => 'btn btn-primary pull-left ']) ?></div>
          <div class="pull-right"><?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success pull-left']); ?></div>
          <?= $this->Form->end() ?>
        </div>

    </div>
  </div>
</div>


</div>
<?php
/*CHARGEMENT JAVASCRIPT SPECIFIQUE*/
$this->start('scriptBottom');
echo $this->Html->script(['jquery.datetimepicker.full.min.js']);
echo $this->Html->script(['indispo.js']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
