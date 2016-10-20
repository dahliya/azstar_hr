<?php
//Class definition
class Login
{
  private $errorMsg = NULL;

  public function __construct()
  {

  }
  //=============================================================
  public function check_login($postData)
  {
    global $link;
    $errorMsg = '';
    $postedLogin = strip_tags(trim($postData['loginName']));
    $postedPassword = strip_tags(trim($postData['password']));
    try
    {
      $q = "SELECT * FROM hr_user_info WHERE userEmail = :postedLogin AND userPassword = SHA2(:postedPassword, 512)";
      $statement = $link->prepare($q);
      $statement->bindValue(':postedLogin', $postedLogin);
      $statement->bindValue(':postedPassword', $postedPassword);
      $statement->execute();
    }
    catch (PDOException $e)
    {
      exit("Database Error");
    }

    if (!isset($e))
    {
      if ($statement->rowCount() == 1)
      {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $User = new User($result['userId']);
        $_SESSION['User'] = $User;
        return true;
      }
      else
      {
        $this->errorMsg = "Incorrect Username or password. Please, try again.";
        return false;
      }
    }
  } //End function check_login
  //=============================================================
  public function get_errorMsg()
  {
    if (isset($this->errorMsg))
    {
      return $this->errorMsg;
    }
  }
  //=============================================================
}