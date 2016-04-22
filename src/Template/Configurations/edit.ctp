<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-gear"></i> </span>
        <h5><?= __('Modifier la configuration de l\'application') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($configuration,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label">Nom</label>
            <div class="controls">
              <?= $this->Form->input('nom_exp',['label'=>false , 'placeholder' => 'Nom de l\'expéditeur']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
              <?= $this->Form->input('email_exp',['label'=>false , 'placeholder' => 'Mail de l\'expéditeur']) ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Taux de TVA</label>
            <div class="controls tip-right"  data-original-title="Taux en %">
            <?= $this->Form->input('taux_tva', ['options' => $tvas ,'label'=>false ]); ?>
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
