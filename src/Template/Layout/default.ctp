<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

 $cakeDescription = 'Click and wash nettoyeur à sec';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <?= $this->Html->charset() ?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>
         <?= $cakeDescription ?>
     </title>
     <?= $this->Html->meta('fa') ?>
     <?= $this->Html->css('bootstrap.min.css') ?>
     <?= $this->Html->css('bootstrap-responsive.min.css') ?>
     <?= $this->Html->css('fullcalendar.css') ?>
     <?= $this->Html->css('matrix-style.css') ?>
     <?= $this->Html->css('matrix-media.css') ?>
     <?= $this->Html->css('jquery.gritter.css') ?>
     <?= $this->Html->css('font-awesome.css') ?>
       <?= $this->fetch('css') ?>
       <?= $this->fetch('scriptTop') ?>
 </head>
 <body class="home">
   <div id="header">
     <h1><a href="pages">Click And Wash</a></h1>
   </div>

   <div id="user-nav" class="navbar navbar-inverse">
     <ul class="nav">
       <li class="dropdown" id="profile-messages">
         <a> <i class="fa fa-user"></i>
           <span class="text">Bienvenue <?= $nomAuthUser ?></span>
         </a>
       </li>
       <li class=""><?= $this->Html->link(__('<i class="fa fa-reply"></i> déconnexion'),'/users/logout',['escape' => false]) ?></li>
     </ul>
   </div>

<?php /* MENU ADMIN */ ?>
<?php if($roleAuthUser == 'admin') : ?>
   <div id="sidebar"><a href="#" class="visible-phone"><i class="fa fa-home"></i> Tableau de bord</a>
     <ul style="display: block;">
       <li class="<?php if ($this->request->controller === 'Pages'): echo "active" ; endif; ?>"><?= $this->Html->link(__('<i class="fa fa-home"></i> <span>Tableau de bord</span>'),'/',['escape' => false]) ?></li>

       <li class="submenu <?php if ($this->request->controller === 'Societys' or $this->request->controller === 'Preparateurs'): echo "open" ; endif; ?>"> <a href="#"><i class="fa fa-users"></i> <span>Gestion des washer</span> <span class="label label-important">2</span></a>
      <ul>
        <li class="<?php if ($this->request->controller === 'Societys'): echo "active" ; endif; ?>"> <?= $this->Html->link(__('<i class="fa fa-automobile"></i> <span> Sociétés</span>'),'/societys',['escape' => false]) ?> </li>
        <li class="<?php if ($this->request->controller === 'Preparateurs'): echo "active" ; endif; ?>"> <?= $this->Html->link(__('<i class="fa fa-automobile"></i> <span> Points de vente</span>'),'/preparateurs',['escape' => false]) ?> </li>
      </ul>
    </li>

       <li class="<?php if ($this->request->controller === 'Prestations'): echo "active" ; endif; ?>"> <?= $this->Html->link(__('<i class="fa fa-plug"></i> <span> Gestion des prestations</span>'),'/prestations',['escape' => false]) ?> </li>
       <li class="<?php if ($this->request->controller === 'Clients'): echo "active" ; endif; ?>"><?= $this->Html->link(__('<i class="fa fa-user"></i> <span> Client</span>'),'/clients',['escape' => false]) ?> </li>
       <li><a href="tables.html"><i class="fa fa-bar-chart"></i> <span>Ventes</span></a></li>
       <li> <a href="#"><i class="fa fa-money"></i> <span>Comptabilité</span></a></li>
       <li class="submenu <?php if ($this->request->controller === 'Marques' or $this->request->controller === 'Modeles' or $this->request->controller === 'Vehiculeclients' ): echo "open" ; endif; ?>"> <a href="#"><i class="fa fa-gear"></i> <span>Véhicules</span> <span class="label label-important">3</span></a>
      <ul>
         <li class="<?php if ($this->request->controller === 'Marques'): echo "active" ; endif; ?>"><?= $this->Html->link(__('Marques'),'/marques') ?></li>
         <li class="<?php if ($this->request->controller === 'Modeles'): echo "active" ; endif; ?>"><?= $this->Html->link(__('Modèles'),'/modeles') ?></li>
         <li class="<?php if ($this->request->controller === 'Vehiculeclients'): echo "active" ; endif; ?>"><?= $this->Html->link(__('Véhicules client'),'/vehiculeclients') ?></li>
        <?php /* <li><?= $this->Html->link(__('Véhicules'),'/vehicules') ?></li> */ ?>
      </ul>
    </li>
       <li><a href="buttons.html"><i class="fa fa-lock"></i> <span>Mon compte</span></a></li>
       <li class="submenu <?php if ($this->request->controller === 'Users' or $this->request->controller === 'Configurations' or $this->request->controller === 'Tvas'): echo "open" ; endif; ?>"> <a href="#"><i class="fa fa-gear"></i> <span>Paramètres</span> <span class="label label-important">3</span></a>
      <ul>
         <li class="<?php if ($this->request->controller === 'Users'): echo "active" ; endif; ?>"><?= $this->Html->link(__('Utilisateurs'),'/users') ?></li>
         <li class="<?php if ($this->request->controller === 'Configurations'): echo "active" ; endif; ?>"><?= $this->Html->link(__('Configurations'),'/configurations/edit/1') ?></li>
         <li class="<?php if ($this->request->controller === 'Tvas'): echo "active" ; endif; ?>"><?= $this->Html->link(__('Gestion TVA'),'/tvas') ?></li>
      </ul>
    </li>
     </ul>
   </div>
<?php endif; ?>
<?php /* FIN MENU ADMIN */ ?>

<?php /* MENU WASHERS */ ?>
<?php if($roleAuthUser == 'societe') : ?>
   <div id="sidebar"><a href="#" class="visible-phone"><i class="fa fa-home"></i> Tableau de bord</a>
     <ul style="display: block;">
       <li class="<?php if ($this->request->action === 'compta'): echo "active" ; endif; ?>">  <?= $this->Html->link(__('<i class="fa fa-clock-o"></i> <span> Comptabilité</span>'),'/comptasocietys/compta',['escape' => false]) ?> </li>
        <li class="<?php if ($this->request->action === 'pointdevente'): echo "active" ; endif; ?>">  <?= $this->Html->link(__('<i class="fa fa-signal"></i> <span> Mes point de vente</span>'),'/comptasocietys/pointdevente',['escape' => false]) ?> </li>
        <li class="<?php if ($this->request->action === 'moncompte'): echo "active" ; endif; ?>">  <?= $this->Html->link(__('<i class="fa fa-gear"></i> <span> Mon compte</span>'),'/comptasocietys/moncompte',['escape' => false]) ?> </li>
     </ul>
   </div>
<?php endif; ?>
<?php /* FIN MENU WASHERS */ ?>

<?php /* MENU WASHERS */ ?>
<?php if($roleAuthUser == 'preparateur') : ?>
   <div id="sidebar"><a href="#" class="visible-phone"><i class="fa fa-home"></i> Tableau de bord</a>
     <ul style="display: block;">
       <li class="<?php if ($this->request->action === 'index'): echo "active" ; endif; ?>"><?= $this->Html->link(__('<i class="fa fa-home"></i> <span>Tableau de bord</span>'),'/washers/',['escape' => false]) ?></li>
    <?php /*
    <li class="<?php if ($this->request->action === 'mesinfo'): echo "active" ; endif; ?>"><?= $this->Html->link(__('<i class="fa fa-car"></i> <span> Ma société</span>'),'/washers/mesinfo',['escape' => false]) ?></li>
    */ ?>
         <li class="submenu <?php if ($this->request->action === 'rdv' or $this->request->action === 'rdvavenir'): echo "open" ; endif; ?>"> <a href="#"><i class="fa fa-calendar"></i> <span>Mes rendez-vous</span> <span class="label label-important"><?php echo $rdvavenircountNb ?></span></a>
        <ul>
           <li class="<?php if ($this->request->action === 'rdvavenir'): echo "active" ; endif; ?>"><?= $this->Html->link(__('A venir'),'/washers/rdvavenir/') ?></li>
           <li class="<?php if ($this->request->action === 'rdv'): echo "active" ; endif; ?>"><?= $this->Html->link(__('Effectué'),'/washers/rdv/') ?></li>

        </ul>
      </li>
      <?php /*
        <li class="<?php if ($this->request->action === 'comptabilite'): echo "active" ; endif; ?>">  <?= $this->Html->link(__('<i class="fa fa-signal"></i> <span> Comptabilité</span>'),'/washers/comptabilite',['escape' => false]) ?> </li>

        <li class="<?php if ($this->request->action === 'moncompte'): echo "active" ; endif; ?>">  <?= $this->Html->link(__('<i class="fa fa-gear"></i> <span> Mon compte</span>'),'/washers/moncompte',['escape' => false]) ?> </li>
*/ ?>
        <li class="<?php if ($this->request->action === 'indispo'): echo "active" ; endif; ?>">  <?= $this->Html->link(__('<i class="fa fa-clock-o"></i> <span> Mes indisponibilités</span>'),'/washers/indispo',['escape' => false]) ?> </li>
     </ul>
   </div>
<?php endif; ?>
<?php /* FIN MENU WASHERS */ ?>





   <div id="content">
     <div id="content-header">
         <div id="breadcrumb"> <?= $this->Html->getCrumbs(' > ', 'Home'); ?></div>
       </div>

 <div class="container-fluid">
 <?= $this->fetch('content') ?>
 </div>

 <div class="row-fluid">
   <div id="footer" class="span12 text-right"> 2016 © Click and Wash <a href="http://www.publicom.fr/">Publicom</a> </div>
 </div>

   </div>

   <?= $this->Html->script('excanvas.min') ?>
   <?= $this->Html->script('jquery.min') ?>
   <?= $this->Html->script('jquery.ui.custom') ?>
   <?= $this->Html->script('bootstrap.min') ?>
   <?= $this->Html->script('jquery.gritter.min') ?>
   <?= $this->Html->script('jquery.peity.min') ?>
   <?= $this->Html->script('matrix') ?>
   <?= $this->fetch('script') ?>
   <?= $this->fetch('scriptBottom') ?>
 </body>
 </html>
