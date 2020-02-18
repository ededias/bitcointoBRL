<?php 
require_once "dataFile.php";

abstract class Conversion extends DataFile{
  protected function usdToBrl()
  {
    $result =  $this->getBitcoinValueAPI() * $this->getDollarValueAPI(); 
    return $result;
  }
}