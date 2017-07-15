<?php


  require_once "app/APIHandler.php";

  $APIHandler = new APIHandler();
  $response = $APIHandler->getText("testimage.png");

  //DEBUG CODE
  echo "<pre>";
  var_dump($response);

?>
