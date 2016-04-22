<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-automobile"></i> </span>
        <h5><?= __('Ajouter une marque Auto') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($marque,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label tip-right">Nom</label>
            <div class="controls">
              <?= $this->Form->input('name',['label'=>false , 'placeholder' => 'Nom de la marque']) ?>
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
