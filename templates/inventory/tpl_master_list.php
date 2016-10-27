<?php
if(!isset($secretKey) || $secretKey !== 'jhbrfpbv'){exit();}
//$list is available from employees.php

$results = array();
foreach($list as $key => $itemData)
{
  $itemId = $itemData['itemId'];
  $Inventory = new inventoryItem($itemId);

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


echo json_encode($results);
