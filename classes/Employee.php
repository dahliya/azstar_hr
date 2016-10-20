<?php
class Employee
{

  public $employeeId = NULL;
  public $employeeName = NULL;
  public $employeeLastname = NULL;
  public $employeeSSN = NULL;
  public $employeeStreet = NULL;
  public $employeeCity = NULL;
  public $employeeState = NULL;
  public $employeeZip = NULL;
  public $employeeDOB = NULL;
  public $employeeRace = NULL;
  public $employeeGender = NULL;
  public $cellphonePersonal = NULL;
  public $cellphoneWork = NULL;
  public $phoneDirect = NULL;
  public $phoneExt = NULL;
  public $GCExpire = NULL;
  public $emailPersonal = NULL;
  public $emailWork = NULL;
  public $hireDate = NULL;
  public $positionId = NULL;
  public $emergencyContact = NULL;
  public $dlNumber = NULL;
  public $supervisorId = NULL;
  public $tb_userId = NULL;



  public function __construct($employeeId = NULL)
  {
    if(isset($employeeId) and is_numeric($employeeId))
    {
      global $link;
      $q = "SELECT * FROM hr_employee_info WHERE employeeId = :employeeId";
      try
      {
        $statement = $link->prepare($q);
        $statement->bindValue(':employeeId', $employeeId);
        $statement->execute();
      }
      catch(PDOException $e)
      {

      }

      if(isset($statement) and $statement->rowCount() == 1)
      {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        foreach($result as $key => $val)
        {
          $this->$key = $val;
        }
      }
    }
  }
  //--------
  public function insert($data = array())
  {
    ////
    ///
    $result = array(
      'status' => 'OK',
      'message' => '<strong>Success!</strong> New record was created.'
    );
    return $result;
  }
}
 