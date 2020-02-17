<?php

function getDollarValueAPI()
{
  $dataFile = file_get_contents("https://api.hgbrasil.com/finance");
  $jsonDecodeData = json_decode($dataFile, true);
  $jsonDecodeData = number_format($jsonDecodeData["results"]["currencies"]["USD"]["buy"], 2);
  return $jsonDecodeData;
}

function getBitcoinValueAPI()
{
  $dataFile = file_get_contents("https://api.coingecko.com/api/v3/coins/bitcoin/");
  $jsonDecodeData = json_decode($dataFile, true);
  $jsonDecodeData = number_format($jsonDecodeData["market_data"]["current_price"]["usd"], 2);
  $jsonDecodeData = str_replace(",", "", $jsonDecodeData);
  return $jsonDecodeData;
}

function usdToBrl()
{
  $result =  getBitcoinValueAPI() * getDollarValueAPI();
  return $result;
}

function encodeJson()
{
  echo json_encode(array(
    "Bitcoin day value" => [
      "value" => usdToBrl(),
    ],
    "developedBy" => [
      "developedBy" => "Edenilson Dias dos Santos",
      "e-mail" => "ededias4@gmail.com"
    ]
  ));
}

echo encodeJson();
