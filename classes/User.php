<?php

class User {
  protected $userId = NULL;
  protected $userFirstName = NULL;
  protected $userLastName = NULL;
  protected $userPassword = NULL;
  protected $userEmail = NULL;
  protected $userPhone = NULL;

//=============================================================
  public function __construct($userId = NULL)
  {
    global $link;
    if(@!empty($userId))
    {
      try
      {
        $q = "SELECT * FROM hr_user_info WHERE userId = :userId";
        $statement = $link->prepare($q);
        $statement->bindValue(':userId', $userId);
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
  //=============================================================
  public function get_FirstName()
  {
    return $this->userFirstName;
  }
  //=============================================================
  public function get_LastName()
  {
    return $this->userLastName;
  }
  //=============================================================
  public function get_FullName()
  {
    return $this->userFirstName.' '.$this->userLastName;
  }
  //=============================================================
  public function get_userId()
  {
    return $this->userId;
  }

  //=============================================================
  private function check_oldpassword($oldPassword = NULL)
  {
    global $link;
    try
    {
      $q = "SELECT userId FROM hr_user_info WHERE userId = :userId AND userPassword = SHA2(:oldPassword, 512)";
      $statement = $link->prepare($q);
      $statement->bindValue(':userId', $this->userId);
      $statement->bindValue(':oldPassword', $oldPassword);
      $statement->execute();
    }
    catch(PDOException $e)
    {

    }
    if(isset($statement) and $statement->rowCount() == 1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  //=============================================================
  public function update_password($oldPassword = NULL, $newPassword = NULL)
  {
    global $link;
    if(@!empty($oldPassword))
    {
      if(!$this->check_oldpassword($oldPassword))
      {
        return ['errors' => 'Incorrect current password provided.'];
      }
    }
    else
    {
      return ['errors' => 'Enter old password'];
    }

    if(@!empty($newPassword))
    {
      try
      {
        $q = "UPDATE hr_user_info SET userPassword = SHA2(:newPassword, 512)
              WHERE userId = :userId AND userPassword = SHA2(:oldPassword, 512)";
        $statement = $link->prepare($q);
        $statement->bindValue(':oldPassword', $oldPassword);
        $statement->bindValue(':newPassword', $newPassword);
        $statement->bindValue(':userId', $this->userId);
        $statement->execute();
      }
      catch(PDOException $e)
      {

      }
      if(isset($statement) and $statement->rowCount() == 1)
      {
        return['success_message' => 'New password saved successfully.'];
      }
      else
      {
        return['errors' => 'Please, choose different new password.'];
      }
    }
    else
    {
      return['errors' => 'Password can not be empty.'];
    }
  }
  //=============================================================

}