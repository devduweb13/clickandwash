<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
?>


<div class="row-fluid">
<div class="span9">

  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="fa fa-clock-o"></i></span>
      <h5>Indisponibilités</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered data-table">
        <thead>
          <tr>
            <th>Debut</th>
            <th>Fin</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    <?php foreach ($factureclicks as $factureclick): ?>
          <tr class="grade<?= $this->Number->format($indisponibilitewasher->id) ?>">
            <?php
            $dateDebut = $indisponibilitewasher->debut;
            $dateFin = $indisponibilitewasher->fin;
            ?>
            <td><?php echo $this->Time->format($dateDebut, \IntlDateFormatter::TRADITIONAL) ?> </td>
            <td><?php  echo $this->Time->format($dateFin, \IntlDateFormatter::TRADITIONAL)?></td>
            <td class="center">
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $indisponibilitewasher->id], ['confirm' => __('Etes vous certain de vouloir supprimer ? # {0}?', $indisponibilitewasher->id),'escape' => false ]) ?>
            </td>
          </tr>
    <?php endforeach; ?>

        </tbody>
      </table>

    </div>
  </div>

</div>

<div class="span3"></div>
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
