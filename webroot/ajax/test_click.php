<?php
$bdd = new PDO('mysql:host=localhost;dbname=clickandwash;charset=utf8', 'root','');

$id_users = $_POST['id_users'];

$reponse = $bdd->query("SELECT * FROM societys WHERE id = '".$id_users."'");
       while ($donnees = $reponse->fetch())
       {
        $data = $donnees['soc_c'] ;
       }
       echo $data;
?>
