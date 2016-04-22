<div class="row-fluid">  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-tasks"></i> </span>
        <h5>Modifier un modele</h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($modele,['class'=>'form-horizontal']) ?>

      <div class="control-group">
        <label class="control-label">Marque</label>
        <div class="controls">
          <?= $this->Form->input('marque_id', ['options' => $marques , 'label'=>false ]);?>
        </div>
      </div>

          <div class="control-group">
            <label class="control-label tip-right">Modele</label>
            <div class="controls">
              <?= $this->Form->input('name',['label'=>false , 'placeholder' => 'Nom du model']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Catégorie</label>
            <div class="controls">
              <?= $this->Form->input('type', [
                  'label'=>false ,
                  'options' => ['1' => 'Tarif A', '2' => 'Tarif B', '3' => 'Tarif C']
              ]) ?>
            </div>
          </div>


          <div class="form-actions">
          <div class="pull-left"><?= $this->Html->link(__('Retour'), ['action' => 'index'], ['class' => 'btn btn-primary pull-left ']) ?></div>
            <div class="pull-right"><?= $this->Form->button(__('Modifier'),['class'=>'btn btn-success pull-left']); ?></div>
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
