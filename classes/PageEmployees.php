<?php
class PageEmployees
{
  public function __construct()
  {

  }
  //-------------
  public function employees()
  {
    global $link;
    $q = "SELECT employeeId FROM hr_employee_info";
    try
    {
      $statement = $link->prepare($q);
      $statement->execute();
    }
    catch(PDOException $e)
    {

    }

    $results = array();
    if(isset($statement))
    {
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
  }
  public function update()
  {
    global $link;
    $q = "";
    try
    {
      $statement = $link->prepare($q);
      $statement->execute();
    }
    catch(PDOException $e)
    {

    }
    //
  }

}