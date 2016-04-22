<?php foreach ($modeles as $modele):; ?>
<option value="<?= h($modele->id) ?>"><?= h($modele->name) ?></option>
 <?php endforeach; ?>
