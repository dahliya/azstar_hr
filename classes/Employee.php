<?php
class Employee
{

  public $employeeId = NULL;
  public $employeeFirstname = NULL;
  public $employeeLastname = NULL;
  public $employeeSSN = NULL;
  public $street1 = NULL;
  public $street2 = NULL;
  public $city = NULL;
  public $state = NULL;
  public $zip = NULL;
  public $county = NULL;
  public $country = NULL;
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

//---------------------------------------------------------
  public function __construct($employeeId = NULL)
  {
    if(isset($employeeId) and is_numeric($employeeId))
    {
      global $link;
      $q = "SELECT * FROM hr_employee_info
            LEFT JOIN hr_employee_addresses 
              ON hr_employee_info.employeeId = hr_employee_addresses.employeeId
              AND hr_employee_addresses.addressId = (SELECT MAX(addressId) FROM hr_employee_addresses 
                WHERE employeeId = :employeeId)
            WHERE hr_employee_info.employeeId = :employeeId";

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
  //---------------------------------------------------------
  protected function _insertAddress($employeeId = NULL, $data = array())
  {
    global $link;
    $q = "INSERT INTO hr_employee_addresses SET
            employeeId = :employeeId,
            userId = :userId,
            street1 = :street1,
            street2 = :street2,
            city = :city,
            county = :county,
            state = :state,
            zip = :zip,
            country = :country";

    try
    {
      $statement = $link->prepare($q);
      $statement->bindValue(':employeeId', $employeeId);
      $statement->bindValue(':userId', $data['userId']);
      $statement->bindValue(':street1', $data['street1']);
      $statement->bindValue(':street2', $data['street2']);
      $statement->bindValue(':city', $data['city']);
      $statement->bindValue(':county', $data['county']);
      $statement->bindValue(':state', $data['state']);
      $statement->bindValue(':zip', $data['zip']);
      $statement->bindValue(':country', $data['country']);
      $statement->execute();
    }
    catch (PDOException $e)
    {
      var_dump($e);
    }

    if(isset($statement) && $statement->rowCount() == 1)
    {
      return true;
    }
    return false;
  }
  //---------------------------------------------------------
  public function insert($data = array())
  {
    global $link, $User;

    $addressData = array(
      'userId'      => $User->get_userId(),
      'street1'     => $data['street1'],
      'street2'     => $data['street2'],
      'city'        => $data['city'],
      'county'      => $data['county'],
      'state'       => $data['state'],
      'zip'         => $data['zip'],
      'country'     => $data['country']
    );


    $q = "INSERT INTO hr_employee_info SET
            employeeFirstname = :employeeFirstname,
            employeeLastname = :employeeLastname,
            employeeSSN = :employeeSSN,
            employeeDOB = :employeeDOB,
            employeeRace = :employeeRace,
            employeeGender = :employeeGender,
            cellphonePersonal = :cellphonePersonal,
            GCExpire = :GCExpire,
            emailPersonal = :emailPersonal,
            emailWork = :emailWork,
            hireDate = :hireDate,
            emergencyContact = :emergencyContact,
            dlNumber = :dlNumber";

    try
    {
      $link->beginTransaction();
        $statement = $link->prepare($q);
        $statement->bindValue(':employeeFirstname', $data['employeeFirstname']);
        $statement->bindValue(':employeeLastname', $data['employeeLastname']);
        $statement->bindValue(':employeeSSN', $data['employeeSSN']);
        $statement->bindValue(':employeeDOB', $data['employeeDOB']);
        $statement->bindValue(':employeeRace', $data['employeeRace']);
        $statement->bindValue(':employeeGender', $data['employeeGender']);
        $statement->bindValue(':cellphonePersonal', $data['cellphonePersonal']);
        $statement->bindValue(':GCExpire', $data['GCExpire']);
        $statement->bindValue(':emailPersonal', $data['emailPersonal']);
        $statement->bindValue(':emailWork', $data['emailWork']);
        $statement->bindValue(':hireDate', $data['hireDate']);
        $statement->bindValue(':emergencyContact', $data['emergencyContact']);
        $statement->bindValue(':dlNumber', $data['dlNumber']);
      $statement->execute();
    }
    catch(PDOException $e)
    {
      $link->rollBack();
      var_dump($e);
    }

    $result = array(
      'status' => 'error',
      'message' => 'Errors occurred while creating a new employee record.'
    );

    if(isset($statement) && $statement->rowCount() == 1)
    {
      $newEmployeeId = $link->lastInsertId();
      if($this->_insertAddress($newEmployeeId, $addressData))
      {
        $link->commit();
        $result = array(
          'status' => 'OK',
          'message' => '<strong>Success!</strong> New record was created.'
        );
      }
      else
      {
        $link->rollBack();
      }
    }
    return $result;
  }
}
 