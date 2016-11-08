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
      $_POST = array(
        'employeeFirstname' => 'Barak',
        'employeeLastname' => 'Obama',
        'employeeDOB' => '1960-12-01',
        'employeeSSN' => '001-13-1234',
        'employeeGender' => 'm',
        'employeeRace' => 'Asian',
        'emailPersonal' => 'barakobama@whitehouse.kz',
        'emailWork' => 'barakobama@whitehouse.uz',
        'cellphonePersonal' => '541-235-6547',
        'street1' => '12 Washington Ave.',
        'street2' => 'Floor 2',
        'county' => 'Kenya County',
        'city' => 'Washington DC',
        'state' => 'NJ',
        'zip' => '50279',
        'country' => 'USA',
        'GCExpire' => '2020-01-01',
        'dlNumber' => 'obamadrives323',
        'hireDate' => '2008-11-08',
        'emergencyContact' => 'Michelle Obama @ 582-548-6548'
      );
      $Employee = new Employee();
      echo json_encode($Employee->insert($_POST));
    break;
    #
  }
  session_write_close();
  exit();
}
require 'templates/employees/tpl_employees.php';

