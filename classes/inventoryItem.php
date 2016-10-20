<?php
class inventoryItem
{

  public $itemId = NULL;
  public $inventoryTypeId = NULL;
  public $itemMake = NULL;
  public $itemModel = NULL;
  public $itemSN = NULL;
  public $itemPieceCount = NULL;
  public $itemDescription = NULL;
  public $itemPurchaseDate = NULL; //edited in the database to Purchase

  public function __construct($itemId = NULL)
  {
    if(isset($itemId) and is_numeric($itemId))
    {
      global $link;
      $q = "SELECT * FROM hr_inventory_item_info WHERE itemId = :itemId";
      try
      {
        $statement = $link->prepare($q);
        $statement->bindValue(':itemId', $itemId);
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
