<div class="row-fluid">  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-tasks"></i> </span>
        <h5>Ajouter un véhicule</h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($vehicule,['class'=>'form-horizontal']) ?>

      <div class="control-group">
        <label class="control-label">Marque</label>
        <div class="controls">
          <?= $this->Form->input('marque_id', [ 'onchange' => 'fetch_select(this.value)','options' => $marques , 'label'=>false ]);?>
        </div>
      </div>


          <div class="control-group">
            <label class="control-label tip-right">Modèle</label>
            <div class="controls">
              <select id="modele_id" name="modele_id"></select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label tip-right">Année</label>
            <div class="controls">
              <?= $this->Form->input('annee', [ 'label'=>false]); ?>
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
echo $this->Html->script(['select.js']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
