<?php
if(!isset($secretKey) || $secretKey !== 'jhbrfpbv'){exit();}
//$list is available from employees.php

$results = array();
foreach($list as $key => $itemData)
{
  $itemId = $itemData['itemId'];
  $Inventory = new Inventory($itemId);

  $itemData = array();
  $itemData['itemId'] = $Inventory->itemId;
  $itemData['inventoryTypeId'] = $Inventory->inventoryTypeId;
  $itemData['itemMake'] = $Inventory->itemMake;
  $itemData['itemModel'] = $Inventory->itemModel;
  $itemData['itemSN'] = $Inventory->itemSN;
  $itemData['itemPieceCount'] = $Inventory->itemPieceCount;
  $itemData['itemDescription'] = $Inventory->itemDescription;
  $itemData['itemPurchaseDate'] = $Inventory->itemPurchaseDate;

  $results[] = $itemData;
}


var_dump($itemData);
