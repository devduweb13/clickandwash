<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-tasks"></i> </span>
        <h5><?= __('Modifier la prestation') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($prestation,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label">Nom</label>
            <div class="controls">
              <?= $this->Form->input('name',['label'=>false , 'placeholder' => 'Titre de la prestation']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Tarif A</label>
            <div class="controls">
              <?= $this->Form->input('tarif1',['label'=>false , 'placeholder' => 'Tarif de la prestation 1']) ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tarif B</label>
            <div class="controls">
              <?= $this->Form->input('tarif2',['label'=>false , 'placeholder' => 'Tarif de la prestation 2']) ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tarif C</label>
            <div class="controls">
              <?= $this->Form->input('tarif3',['label'=>false , 'placeholder' => 'Tarif de la prestation 3']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Durée A</label>
            <div class="controls">
              <?= $this->Form->input('duree1',['label'=>false , 'placeholder' => 'Durée de la prestation 1']) ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Durée B</label>
            <div class="controls">
              <?= $this->Form->input('duree2',['label'=>false , 'placeholder' => 'Durée de la prestation 2']) ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Durée C</label>
            <div class="controls">
              <?= $this->Form->input('duree3',['label'=>false , 'placeholder' => 'Durée de la prestation 3']) ?>
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
            <div class="pull-right"><?= $this->Form->button(__('Modifier'),['class'=>'btn btn-success pull-left']); ?></div>
            <?= $this->Form->end() ?>
          </div>
        </form>
      </div>
    </div>


  </div>
</div>
