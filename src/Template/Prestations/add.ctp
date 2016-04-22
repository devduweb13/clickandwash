  <div class="row-fluid">
    <div class="span3"></div>
<div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fa fa-tasks"></i> </span>
          <h5><?= __('Ajouter une prestation') ?></h5>
        </div>
        <div class="widget-content nopadding">
        <?= $this->Form->create($prestation,['class'=>'form-horizontal']) ?>

            <div class="control-group">
              <label class="control-label tip-right">Nom</label>
              <div class="controls">
                <?= $this->Form->input('nom',['label'=>false , 'placeholder' => 'Titre de la prestation']) ?>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tarif A</label>
              <div class="controls">
                <?= $this->Form->input('tarif1',['label'=>false , 'placeholder' => 'Tarif de la prestation A']) ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tarif B</label>
              <div class="controls">
                <?= $this->Form->input('tarif2',['label'=>false , 'placeholder' => 'Tarif de la prestation B']) ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tarif C</label>
              <div class="controls">
                <?= $this->Form->input('tarif3',['label'=>false , 'placeholder' => 'Tarif de la prestation C']) ?>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Durée A</label>
                <div class="controls tip-right"  data-original-title="Durée en min">
                <?= $this->Form->input('duree1',['label'=>false , 'placeholder' => 'Durée de la prestation A']) ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Durée B</label>
                <div class="controls tip-right"  data-original-title="Durée en min">
                <?= $this->Form->input('duree2',['label'=>false , 'placeholder' => 'Durée de la prestation B']) ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Durée C</label>
                <div class="controls tip-right"  data-original-title="Durée en min">
                <?= $this->Form->input('duree3',['label'=>false , 'placeholder' => 'Durée de la prestation C']) ?>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <?= $this->Form->input('description',['label'=>false , 'placeholder' => 'Prestation ']) ?>
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
