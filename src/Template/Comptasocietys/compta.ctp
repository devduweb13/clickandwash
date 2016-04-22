<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
?>
<?php echo "Total facturé par les points de ventes".$sommestotalwashers?>
<div class="row-fluid">
<div class="span6">
  <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="fa fa-clock-o"></i></span>
              <h5>Mes points de ventes</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Point de ventes</th>
                    <th>Nb de rdv</th>
                    <th>CA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($pointdeventes as $pointdevente): ?>
                  <tr>
                    <td class="taskDesc"><i class="icon-info-sign"></i> <?= $pointdevente->nom ?></td>
                    <td class="taskStatus"><span class="in-progress">in progress</span></td>
                    <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                  </tr>
                <?php endforeach ; ?>
                </tbody>
              </table>
            </div>
          </div>
</div>
<div class="span6"></div>
</div>
<?php
/*CHARGEMENT JAVASCRIPT SPECIFIQUE*/
$this->start('scriptBottom');
echo $this->Html->script(['select2.min']);
echo $this->Html->script(['jquery.dataTables.min']);
echo $this->Html->script(['matrix']);
echo $this->Html->script(['matrix.tables']);
echo $this->Html->script(['jquery.uniform']);
$this->end() ;
/*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
?>
