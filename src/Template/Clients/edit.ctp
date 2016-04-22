<?php
/*CHARGEMENT CSS SPECIFIQUE*/
$this->start('scriptTop');
echo $this->Html->css(['select2']);
$this->end() ;
/*FIN CHARGEMENT CSS SPECIFIQUE*/
$bdd = new PDO('mysql:host=localhost;dbname=clickandwash;charset=utf8', 'root','');
?>

<div class="row-fluid">
<div class="span4">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-tasks"></i> </span>
        <h5><?= __('Information client') ?></h5>
      </div>
      <div class="widget-content nopadding">
      <?= $this->Form->create($client,['class'=>'form-horizontal']) ?>

          <div class="control-group">
            <label class="control-label">Nom</label>
            <div class="controls">
              <?= $this->Form->input('name',['label'=>false , 'placeholder' => 'Titre de la prestation' , 'readonly'=>'true']) ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Prénom</label>
            <div class="controls">
              <?= $this->Form->input('prenom',['label'=>false , 'placeholder' => 'Tarif de la prestation 1', 'readonly'=>'true']) ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Mail</label>
            <div class="controls">
              <?= $this->Form->input('mail',['label'=>false , 'placeholder' => 'Tarif de la prestation 2', 'readonly'=>'true']) ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Téléphone</label>
            <div class="controls">
              <?= $this->Form->input('tel',['label'=>false , 'placeholder' => 'Tarif de la prestation 3', 'readonly'=>'true']) ?>
            </div>
          </div>



          <div class="form-actions">

            <?= $this->Form->end() ?>
          </div>
        </form>
      </div>
    </div>
  </div>

    <div class="span8">

      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="fa fa-automobile"></i></span>
          <h5>Les véhicules du clients</h5>
        </div>
        <div class="widget-content nopadding">


          <table class="table table-bordered data-table">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Marque</th>
                  <th>Modele</th>
                  <th>Année</th>
              </tr>
            </thead>
            <tbody>
          <?php foreach ($client->vehiculeclient_id as $vehiculeclient_id):
            $idvehic =  $vehiculeclients_lienid[$vehiculeclient_id];

          ?>
              <tr>
                <td><?= $this->Number->format($idvehic) ?></td>
<?php
$reponse = $bdd->query("SELECT * FROM vehicules WHERE id = '".$idvehic."' ");
while ($donnees = $reponse->fetch())
 {
   $marque =  $donnees['marque_id'] ;

   $reponse2 = $bdd->query("SELECT * FROM marques WHERE id = '".$marque."' ");
   while ($donnees2 = $reponse2->fetch())
    {
      echo "<td>".$donnees2['name'].'</td> ';
    }

   $modele = $donnees['modele_id'] ;

   $reponse3 = $bdd->query("SELECT * FROM modeles WHERE id = '".$modele."' ");
   while ($donnees3 = $reponse3->fetch())
    {
      echo "<td>".$donnees3['name']."</td>";
    }

 }
 ?>
                <td><?= $vehiculeclients[$vehiculeclient_id] ?></td>

              </tr>
          <?php endforeach; ?>

            </tbody>
          </table>

        </div>
      </div>

      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="fa fa-map-signs"></i></span>
          <h5>Les adresses du client</h5>
        </div>
        <div class="widget-content nopadding">



            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Cp</th>
                    <th>Ville</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($client->adresseclient_id as $adresseclient_id):?>
                <tr>
                  <td><?= $this->Number->format($adresseclient_id) ?></td>
                  <td><?= $adresseclientsnom[$adresseclient_id] ?></td>
                  <td><?= $adresseclients[$adresseclient_id] ?></td>
                  <td><?= $adresseclientscp[$adresseclient_id] ?></td>
                  <td><?= $adresseclientsville[$adresseclient_id] ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              </table>


          </div>
        </div>
      </div>

    </div>

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
