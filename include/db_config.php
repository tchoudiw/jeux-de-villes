<?php if (isset($_GET['source'])) die(highlight_file(__FILE__, 1)); ?>

<?php

require('db_passwd.php');
$dsn = 'mysql:host=localhost;dbname=ville';

try {
  $db = new PDO($dsn, $db_username, $db_password);
}

catch(Exception $e) {
  echo 'Erreur : '.$e->getMessage().'<br />';
  echo 'N° : '.$e->getCode();
  die();
}
?>