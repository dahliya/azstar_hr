<?php
if(!isset($secretKey) || $secretKey !== 'jhbrfpbv'){exit();}

if(isset($_GET['action']))
{
  $action = $_GET['action'];
  switch ($action)
  {
    case 'get_list':
      $list = $PageInventories->inventories();
      require 'templates/inventory/tpl_master_list.php';
      break;
    #
  }
  session_write_close();
  exit();
}