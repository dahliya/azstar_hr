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
  $employeeData['employeeFirstname'] = $Employee->employeeFirstname;
  $employeeData['employeeLastname'] = $Employee->employeeLastname;
  $employeeData['employeeSSN'] = $Employee->employeeSSN;
  $employeeData['street1'] = $Employee->street1;
  $employeeData['street2'] = $Employee->street2;
  $employeeData['city'] = $Employee->city;
  $employeeData['state'] = $Employee->state;
  $employeeData['zip'] = $Employee->zip;
  $employeeData['employeeDOB'] = array(
    'iso' => $Employee->employeeDOB,
    'conv' => (new DateTime($Employee->employeeDOB))->format('m/d/y')
  );
  $employeeData['employeeRace'] = $Employee->employeeRace;
  $employeeData['employeeGender'] = $Employee->employeeGender;
  $employeeData['cellphonePersonal'] = $Employee->cellphonePersonal;
  $employeeData['cellphoneWork'] = $Employee->cellphoneWork;
  $employeeData['phoneDirectLine'] = $Employee->phoneDirectLine;
  $employeeData['phoneExt'] = $Employee->phoneExt;
  $employeeData['GCExpire'] = $Employee->GCExpire;
  $employeeData['emailPersonal'] = $Employee->emailPersonal;
  $employeeData['emailWork'] = $Employee->emailWork;
  $employeeData['county'] = $Employee->county;
  $employeeData['dlNumber'] = $Employee->dlNumber;
  $employeeData['hireDate'] = $Employee->hireDate;
  $employeeData['positionId'] = $Employee->positionId;
  $employeeData['emergencyContact'] = $Employee->emergencyContact;


  $results[] = $employeeData;
}


echo json_encode($results);
