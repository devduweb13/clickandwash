<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['sol']);
echo $this->Html->css(['jquery.datetimepicker']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>
<div class="row-fluid">
  <div class="span3"></div>
<div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-automobile"></i> </span>
        <h5><?= __('Ajouter un point de vente') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($preparateur,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label tip-right">Nom de la société <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('society_id', ['options' => $societys ,'label'=>false ]); ?>
            </div>
          </div>

          <input type="hidden" name="click" id="soc_c" value="">

          <div class="control-group">
            <label class="control-label">Nom du point de vente <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('nom',['label'=>false , 'placeholder' => 'Nom du point de vente']) ?>
            </div>
          </div>


          <div class="control-group">
            <label class="control-label">Adresse <span class="champ_requis"> * </span></label>
            <div class="controls">
              <?= $this->Form->input('adresse',['label'=>false , 'placeholder' => 'Adresse du point de vente']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Code postal <span class="champ_requis"> * </span></label>
              <div class="controls">
              <?= $this->Form->input('cp',['label'=>false , 'placeholder' => 'Code postal du point de vente']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Ville <span class="champ_requis"> * </span></label>
              <div class="controls">
              <?= $this->Form->input('ville',['label'=>false , 'placeholder' => 'Ville du point de vente']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Téléphone <span class="champ_requis"> * </span></label>
              <div class="controls">
              <?= $this->Form->input('tel',['label'=>false , 'placeholder' => 'Téléphone du point de vente']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Fax </label>
              <div class="controls">
              <?= $this->Form->input('fax',['label'=>false , 'placeholder' => 'Fax du point de vente']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Prestation <span class="champ_requis"> * </span></label>
            <div class="controls">
            <?= $this->Form->input('prestation_id',['options' => $prestations, 'label'=>false , 'multiple' => true ]) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Type lavage </label>
              <div class="controls">
             <?= $this->Form->checkbox('lavagesec',['hiddenField' => false])  ?>Lavage à sec <br>
             <?= $this->Form->checkbox('lavageeau',['hiddenField' => false])  ?>Lavage à l'eau <br>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Rayon <span class="champ_requis"> * </span></label>
            <div class="controls tip-right"  data-original-title="Distance en Km">
             <?= $this->Form->input('rayon',['label'=>false , 'placeholder' => 'rayon d\'intervention en km']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Horaires Lundi <span class="champ_requis"> * </span></label>
            <div class="controls">
            <div class="span2">Matin</div>
            <div class="span4"><input type="text" name="lm1" class="input_h" id="lm1"></input> à <input type="text" name="lm2" id="lm2" class="input_h"> </div>
              <div class="span2">Après Midi</div>
            <div class="span4"><input type="text" name="la1" class="input_h" id="la1"></input> à <input type="text" name="la2" id="la2" class="input_h"></input></div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Horaires Mardi <span class="champ_requis"> * </span></label>
            <div class="controls">
            <div class="span2">Matin</div>
            <div class="span4"><input type="text" name="mm1" class="input_h" id="lm1"></input> à <input type="text" name="mm2" id="lm2" class="input_h"> </div>
              <div class="span2">Après Midi</div>
            <div class="span4"><input type="text" name="ma1" class="input_h" id="la1"></input> à <input type="text" name="ma2" id="la2" class="input_h"></input></div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Horaires Mercredi <span class="champ_requis"> * </span></label>
            <div class="controls">
            <div class="span2">Matin</div>
            <div class="span4"><input type="text" name="mem1" class="input_h" id="lm1"></input> à <input type="text" name="mem2" id="lm2" class="input_h"> </div>
              <div class="span2">Après Midi</div>
            <div class="span4"><input type="text" name="mea1" class="input_h" id="la1"></input> à <input type="text" name="mea2" id="la2" class="input_h"></input></div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Horaires Jeudi <span class="champ_requis"> * </span></label>
            <div class="controls">
            <div class="span2">Matin</div>
            <div class="span4"><input type="text" name="jm1" class="input_h" id="lm1"></input> à <input type="text" name="jm2" id="lm2" class="input_h"> </div>
              <div class="span2">Après Midi</div>
            <div class="span4"><input type="text" name="ja1" class="input_h" id="la1"></input> à <input type="text" name="ja2" id="la2" class="input_h"></input></div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Horaires Vendredi <span class="champ_requis"> * </span></label>
            <div class="controls">
            <div class="span2">Matin</div>
            <div class="span4"><input type="text" name="vm1" class="input_h" id="lm1"></input> à <input type="text" name="vm2" id="lm2" class="input_h"> </div>
              <div class="span2">Après Midi</div>
            <div class="span4"><input type="text" name="va1" class="input_h" id="la1"></input> à <input type="text" name="va2" id="la2" class="input_h"></input></div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Horaires Samedi <span class="champ_requis"> * </span></label>
            <div class="controls">
            <div class="span2">Matin</div>
            <div class="span4"><input type="text" name="sm1" class="input_h" id="lm1"></input> à <input type="text" name="sm2" id="lm2" class="input_h"> </div>
              <div class="span2">Après Midi</div>
            <div class="span4"><input type="text" name="sa1" class="input_h" id="la1"></input> à <input type="text" name="sa2" id="la2" class="input_h"></input></div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Horaires Dimanche <span class="champ_requis"> * </span></label>
            <div class="controls">
            <div class="span2">Matin</div>
            <div class="span4"><input type="text" name="dm1" class="input_h" id="lm1"></input> à <input type="text" name="dm2" id="lm2" class="input_h"> </div>
              <div class="span2">Après Midi</div>
            <div class="span4"><input type="text" name="da1" class="input_h" id="la1"></input> à <input type="text" name="da2" id="la2" class="input_h"></input></div>
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
echo $this->Html->script(['sol.js']);
echo $this->Html->script(['jquery.datetimepicker.full.min.js']);
echo $this->Html->script(['preparateur.js']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
