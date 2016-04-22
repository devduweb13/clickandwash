<div class="quick-actions_homepage">
        <ul class="quick-actions">
          <li class="bg_lb"><a><i class="fa fa-calendar-check-o"></i> <strong><?php echo $rdvjoursNb ?></strong></br> <small>Rdv aujourd'hui</small></a></li>
          <li class="bg_lg"><a><i class="fa fa-calendar-o"></i> <strong><?php echo $rdvsemNb ?></strong></br><small>Rdv semaine </small></a></li>
          <li class="bg_lb"><a><i class="fa fa-calendar-o"></i> <strong><?php echo $rdvmoisNb ?></strong></br><small>Rdv mois</small></a></li>
          <li class="bg_lg"><a><i class="fa fa-calendar-o"></i> <strong><?php echo $rdvanNb ?></strong></br><small>Rdv annuel</small></a></li>
          <li class="bg_lr"><a><i class="fa fa-calendar-times-o"></i> <strong><?php echo $rdvmoisanNb ?></strong></br><small>Rdv annulé ce mois</small></a></li>
          <li class="bg_lr"><a><i class="fa fa-calendar-times-o"></i> <strong><?php echo $rdvananNb ?></strong></br><small>Rdv annulé cette année</small></a></li>
        </ul>
      </div>



        <div class="row-fluid">

      <div class="span9">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="fa fa-inbox"></i></span>
          <h5>Mon chiffre d'affaire 2016</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span12">
              <div class="chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="span3">
      <div class="widget-box">
          <div class="widget-title bg_lo" data-toggle="collapse" href="#collapseG3"> <span class="icon"> <i class="fa fa-chevron-down"></i> </span>
            <h5>Rdv du jours (<?php echo $rdvjoursNb ?>)</h5>
          </div>
          <div class="widget-content nopadding updates collapse in" id="collapseG3">
            <?php foreach ($rdvwashers as $rdvwasher) : ?>
            <div class="new-update clearfix"><i class="fa fa-bell"></i>
              <div class="update-done"><a title="" href="#"><strong><?php echo  str_replace( ';', '',$clientsNom[$rdvwasher->client_id] ) . " ".str_replace( ';', '', $prestation[$rdvwasher->prestation_id]);?></strong></a>
                <span><?php echo str_replace( ';', '',$adresseclient[$rdvwasher->adresseclient_id] ) . ' '.str_replace( ';', '',$cpclient[$rdvwasher->adresseclient_id] ).' '.str_replace( ';', '',$villeclient[$rdvwasher->adresseclient_id] ) ?></span>
              </div>
              <?php
              $dateDebut = $rdvwasher->debut;
              $jourNum = $dateDebut->i18nFormat('dd');
              $moisNum = $dateDebut->i18nFormat('MMM');
              ?>
              <div class="update-date"><span class="update-day"><?php echo $jourNum ?></span><?php echo $moisNum ?></div>
            </div>
          <?php endforeach;?>
          </div>
        </div>
      </div>

    </div>

    <ul class="stat-boxes2">
      <li>
        <div class="left peity_bar_neutral"><span><span style="display: none;"><span style="display: none;"><span style="display: none;"><span style="display: none;">2,4,9,7,12,10,12</span><canvas width="50" height="24"></canvas></span>
          <canvas width="50" height="24"></canvas>
          </span><canvas width="50" height="24"></canvas></span><canvas width="50" height="24"></canvas></span>+10%</div>
        <div class="right"> <strong><?php echo $paiementwashers ?>€</strong> CA ANNUEL </div>
      </li>

    </ul>

    <script type="text/javascript">
       var users_id = <?php echo $id_preparateur ; ?>;
    </script>
    <?php
    /*CHARGEMENT JAVASCRIPT SPECIFIQUE*/
    $this->start('scriptBottom');
    echo $this->Html->script(['jquery.flot.min']);
    echo $this->Html->script(['jquery.flot.resize.min']);
    echo $this->Html->script(['matrix.dashboard']);
    $this->end() ;
    /*FIN CHARGEMENT JAVASCRIPT SPECIFIQUE*/
    ?>
