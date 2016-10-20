<?php
//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}

//Trying connection
$link = get_link();

function get_link()
{
  try
  {
    $link = new PDO('mysql:dbname=atl_hr;host=127.0.0.1', 'root', '');
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e)
  {
    exit("Database connection can not be established.");
  }
  return $link;
}