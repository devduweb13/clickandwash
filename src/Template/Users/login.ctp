<!-- src/Template/Users/login.ctp -->
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
$this->layout = false;
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
     <?= $this->Html->css('matrix-login.css') ?>
     <?= $this->Html->css('font-awesome.css') ?>
       <?= $this->fetch('css') ?>
 </head>
 <body>
   <div id="loginbox">
     <?= $this->Form->create('',['id' =>'loginform','class'=>'form-vertical']) ?>

<div class="control-group normal_text"> <h3><?=  $this->Html->image('logo.png',['alt' => 'Click And Wash']) ?></h3></div>

           <div class="control-group">
               <div class="controls">
                   <div class="main_input_box">
                       <span class="add-on bg_lg"><i class="fa fa-user"></i></span> <?= $this->Form->text('username',['label'=>false , 'placeholder' => 'Login']) ?>
                   </div>
               </div>
           </div>

           <div class="control-group">
               <div class="controls">
                   <div class="main_input_box">
                       <span class="add-on bg_ly"><i class="fa fa-lock"></i></span>   <?= $this->Form->password('password',['label'=>false, 'placeholder' => 'Mot de passe']) ?>
                   </div>
               </div>
           </div>


         <?= $this->Flash->render('auth') ?>



     <div class="form-actions">
         <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Mot de passe perdu?</a></span>
         <span class="pull-right"> <?= $this->Form->button(__('Se Connecter'),['class'=>'btn btn-success']); ?></span>
              <?= $this->Form->end() ?>
     </div>

       <form id="recoverform" action="#" class="form-vertical">
   <p class="normal_text">Entrer votre adresse email pour réactualiser votre mot de passe.</p>

               <div class="controls">
                   <div class="main_input_box">
                       <span class="add-on bg_lo"><i class="fa fa-envelope"></i></span><input type="text" placeholder="E-mail address" />
                   </div>
               </div>

           <div class="form-actions">
               <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Se connecter</a></span>
               <span class="pull-right"><a class="btn btn-info"/>Réactualiser</a></span>
           </div>
       </form>
   </div>

   <?= $this->Html->script('jquery.min.js') ?>
   <?= $this->Html->script('matrix.login.js') ?>
     <?= $this->fetch('script') ?>
 </body>
 </html>
