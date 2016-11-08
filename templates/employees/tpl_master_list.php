<?php
//if(!isset($secretKey) || $secretKey !== 'jhbrfpbv'){exit();}
//$list is available from employees.php

$results = array();
foreach($list as $key => $employeeIdData)
{
  $employeeId = $employeeIdData['employeeId'];
  $Employee = new Employee($employeeId);

  $employeeData = array();
  $employeeData['employeeId'] = $Employee->employeeId;
  $employeeData['employeeName'] = $Employee->employeeName;
  $employeeData['employeeLastname'] = $Employee->employeeLastname;
  $employeeData['employeeSSN'] = $Employee->employeeSSN;
  $employeeData['employeeStreet'] = $Employee->street1;
  $employeeData['employeeCity'] = $Employee->city;
  $employeeData['employeeState'] = $Employee->state;
  $employeeData['employeeZip'] = $Employee->zip;
  $employeeData['employeeDOB'] = array(
    'iso' => $Employee->employeeDOB,
    'conv' => (new DateTime($Employee->employeeDOB))->format('m/d/y')
  );
  $employeeData['employeeRace'] = $Employee->employeeRace;
  $employeeData['employeeGender'] = $Employee->employeeGender;
  $employeeData['cellphonePersonal'] = $Employee->cellphonePersonal;
  $employeeData['cellphoneWork'] = $Employee->cellphoneWork;
  $employeeData['phoneDirect'] = $Employee->phoneDirect;
  $employeeData['phoneExt'] = $Employee->phoneExt;
  $employeeData['GCExpire'] = $Employee->GCExpire;
  $employeeData['emailPersonal'] = $Employee->emailPersonal;

  $results[] = $employeeData;
}


echo json_encode($results);
