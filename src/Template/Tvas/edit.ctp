<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-tasks"></i> </span>
        <h5><?= __('Modifier le taux de TVA') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($tva,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label">Taux</label>
            <div class="controls tip-right"  data-original-title="TVA en %">
              <?= $this->Form->input('taux',['label'=>false , 'placeholder' => 'Modifier le taux de cette TVA']) ?>
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
