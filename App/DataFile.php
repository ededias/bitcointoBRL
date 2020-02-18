<?php

abstract class DataFile {
  protected function getDollarValueAPI()
  {
    $dataFile = file_get_contents("https://api.hgbrasil.com/finance");
    $jsonDecodeData = json_decode($dataFile, true);
    $jsonDecodeData = number_format($jsonDecodeData["results"]["currencies"]["USD"]["buy"], 2);
    return $jsonDecodeData;
  }

  protected function getBitcoinValueAPI()
  {
    $dataFile = file_get_contents("https://api.coingecko.com/api/v3/coins/bitcoin/");
    $jsonDecodeData = json_decode($dataFile, true);
    $jsonDecodeData = number_format($jsonDecodeData["market_data"]["current_price"]["usd"], 2);
    $jsonDecodeData = str_replace(",", "", $jsonDecodeData);
    return $jsonDecodeData;
  }

}