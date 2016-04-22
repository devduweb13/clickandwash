<?php
if(isset($_POST['get_option']))
{
  $host = 'localhost';
  $user = 'root';
  $pass = '';

  mysql_connect($host, $user, $pass);

  mysql_select_db('clickandwash');


  $state = $_POST['get_option'];
  $find=mysql_query("select modeles from marque_id where state='$state'");
  while($row=mysql_fetch_array($find))
  {
    echo "<option value='".$row['id']."'>".$row['name']."</option>";
  }

  exit;
}
 ?>
