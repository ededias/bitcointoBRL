<?php

require_once "Conversion.php";
class Bitcoin extends Conversion
{

  public function encodeJson()
  
  {
    return json_encode(array(
      "Bitcoin day value" => [
        "value" => str_replace(",", "", number_format($this->usdToBrl(), 2)),
      ],
      "developedBy" => [
        "developedBy" => "Edenilson Dias dos Santos",
        "e-mail" => "ededias4@gmail.com"
      ]
    ));
  }
}
