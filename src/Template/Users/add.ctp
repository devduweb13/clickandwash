<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fa fa-users"></i> </span>
          <h5><?= __('Ajouter un utilisateur') ?></h5>
        </div>
        <div class="widget-content nopadding">
        <?= $this->Form->create($user,['class'=>'form-horizontal']) ?>
            <div class="control-group">
              <label class="control-label">Identifiant</label>
              <div class="controls">
                <?= $this->Form->input('username',['label'=>false , 'placeholder' => 'Identifiant']) ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mot de passe</label>
              <div class="controls">
              <?= $this->Form->input('password',['label'=>false , 'placeholder' => 'Mot de passe']) ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Role</label>
              <div class="controls">
                <?= $this->Form->input('role', [
                    'label'=>false ,
                    'options' => ['admin' => 'Admin', 'preparateur' => 'Préparateur', 'client' => 'Client']
                ]) ?>
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
