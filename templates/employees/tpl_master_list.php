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
  $employeeData['employeeStreet'] = $Employee->employeeStreet;
  $employeeData['employeeCity'] = $Employee->employeeCity;
  $employeeData['employeeState'] = $Employee->employeeState;
  $employeeData['employeeZip'] = $Employee->employeeZip;
  $employeeData['employeeDOB'] = $Employee->employeeDOB;
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