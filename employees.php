<?php
if(!isset($secretKey) || $secretKey !== 'jhbrfpbv'){exit();}

$PageEmployees = new PageEmployees();
if(isset($_GET['action']))
{
  $action = $_GET['action'];
  switch ($action)
  {
    case 'get_list':
      $list = $PageEmployees->employees();
      include 'templates/employees/tpl_master_list.php';
    break;
    #
    case 'update':
      require 'templates/';
    break;
    case 'new_employee':

      $Employee = new Employee();
      echo json_encode($Employee->insert($_POST));
    break;
    #
  }
  session_write_close();
  exit();
}
require 'templates/employees/tpl_employees.php';

