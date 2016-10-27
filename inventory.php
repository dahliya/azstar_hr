<?php
if(!isset($secretKey) || $secretKey !== 'jhbrfpbv'){exit();}

$PageInventories = new PageInventories();
if(isset($_GET['action']))
{
  $action = $_GET['action'];
  switch ($action)
  {
    case 'get_list':
      $list = $PageInventories->inventories();
      require 'templates/inventory/tpl_master_list.php';
      break;
    case 'update':
      $update = $PageInventories->update();
      require 'templates/';
    break;
    case 'insert_new_item':
      $InventoryItem = new inventoryItem();
      echo json_encode($InventoryItem->insert($_POST));
      break;
    #
  }
  session_write_close();
  exit();
}
require 'templates/inventory/tpl_inventory.php';