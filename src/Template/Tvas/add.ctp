<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-bar-chart"></i> </span>
        <h5><?= __('Ajouter un taux de TVA') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($tva,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label tip-right">Taux de la tva</label>
            <div class="controls tip-right"  data-original-title="TVA en %">
              <?= $this->Form->input('taux',['label'=>false , 'placeholder' => 'Taux de la tva']) ?>
            </div>
          </div>

          <div class="form-actions">
          <div class="pull-left"><?= $this->Html->link(__('Retour'), ['action' => 'index'], ['class' => 'btn btn-primary pull-left ']) ?></div>
            <div class="pull-right"><?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success pull-left']); ?></div>
            <?= $this->Form->end() ?>
          </div>
        </form>
      </div>
    </div>


  </div>
</div>
<?php
/*CHARGEMENT JAVASCRIPT SPECIFIQUE*/
$this->start('scriptBottom');
echo $this->Html->script(['matrix.popover.js']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
