<?php
class PageInventories
{
  public function __construct()
  {

  }
  //-------------
  public function inventories()
  {
    global $link;
    $q = "SELECT itemId FROM hr_inventory_item_info";
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
  //-------------
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
