<?php

  require_once "vendor/autoload.php";
  use Google\Cloud\ServiceBuilder;

  class APIHandler{

    private $ServiceBuilder;
    private $vision;

    public function __construct(){
      $this->ServiceBuilder = new ServiceBuilder([
        'keyFile' => json_decode(file_get_contents('app/credentials.json'), true)
      ]);

      $this->vision = $this->ServiceBuilder->vision();
    }

    public function getText($image_uri){
      $image = $this->vision->image(fopen($image_uri, 'r'), [
        'DOCUMENT_TEXT_DETECTION'
      ]);

      return $this->vision->annotate($image)->fullText()->text();
    }
  }

?>
