<?php
function boucle100(){
 $i = 1;
 while ($i <= 100) :
    $tab1[] = $i;
   $i++;
 endwhile;
return $tab1;
}
 ?>
<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-tasks"></i> </span>
        <h5><?= __('Ajouter une société') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($society,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label tip-right">Nom <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('name',['label'=>false , 'placeholder' => 'Nom de la société']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Contact <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('contact',['label'=>false , 'placeholder' => 'Nom du contact']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Email <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('mail',['label'=>false , 'placeholder' => 'mail'])  ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Adresse <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('adresse',['label'=>false , 'placeholder' => 'Adresse de la société']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Ville <span class="champ_requis"> * </span></label>
              <div class="controls">
              <?= $this->Form->input('ville',['label'=>false , 'placeholder' => 'Ville de la société']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Code postal <span class="champ_requis"> * </span></label>
              <div class="controls">
              <?= $this->Form->input('cp',['label'=>false , 'placeholder' => 'Code postal de la société']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Téléphone <span class="champ_requis"> * </span></label>
              <div class="controls">
              <?= $this->Form->input('tel',['label'=>false , 'placeholder' => 'Téléphone de la société']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Fax </label>
              <div class="controls">
              <?= $this->Form->input('fax',['label'=>false , 'placeholder' => 'Fax de la société']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Taux de commission <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?=
              $this->Form->select('taux_comission', ['En pourcentage' => boucle100()]);?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Société Cosméticar ? <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->checkbox('soc_c') ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Assujetie à la TVA ? <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->checkbox('tva_ass', ['hiddenField' => false]) ?>
            </div>
          </div>

          <div class="control-group tva_ass">
            <label class="control-label">TVA </label>
            <div class="controls">
              <?= $this->Form->input('tva',['label'=>false , 'placeholder' => 'TVA']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">IBAN <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('iban',['label'=>false , 'placeholder' => 'IBAN de la société']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">SIRET <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('siret',['label'=>false , 'placeholder' => '14 chiffres']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Mot de passe <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('password',['label'=>false , 'placeholder' => 'Mot de passe']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Confirmation mot de passe <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('passwordconfirm',['label'=>false , 'placeholder' => 'Confirmer le mot de passe','type'=>'password']) ?>
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
echo $this->Html->script(['preparateur.js']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
