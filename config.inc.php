<?php
//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}

//Including database connection
require 'db.inc.php';

//Autoloader
spl_autoload_register(function ($class)
{
  if (is_string($class))
  {
    require('classes/'.$class.'.php');
  }
});

//Sessions
session_set_save_handler('open_session', 'close_session', 'read_session', 'write_session', 'destroy_session', 'clean_session');

session_start();

//-----------------------------------------------------------------
function open_session()
{
  global $link;
  return isset($link); //Checks if there is a DB connection. And returns true if there is.
}
//-----------------------------------------------------------------
function close_session()
{
  global $link;
  $link = NULL;

  return TRUE;
}
//-----------------------------------------------------------------
function read_session($sessionId)
{
  global $link;
  if(!$link)
  {
    $link = get_link();
  }

  $q = 'SELECT sessionData FROM hr_sessions WHERE sessionId = :sessionId';
  $statement = $link->prepare($q);
  $statement->bindValue(':sessionId', $sessionId);
  $statement->execute();

  if ($statement->rowCount() == 1)
  {
    list($data) = $statement->fetch();
    return $data;
  }
  else
  {
    return '';
  }
}
//-----------------------------------------------------------------
function write_session($sessionId, $data)
{
  global $link;
  if(!$link)
  {
    $link = get_link();
  }
  if(isset($_SESSION['User']))
  {
    $userId = $_SESSION['User']->get_userId();
    $userFullName = $_SESSION['User']->get_FullName();
  }
  else
  {
    $userId = NULL;
    $userFullName = NULL;
  }

  $q = 'REPLACE INTO hr_sessions (sessionId, userId, userFullName, sessionData) VALUES (:sessionId, :userId, :userFullName, :data)';
  $statement = $link->prepare($q) ;
  $statement->bindValue(':sessionId', $sessionId, PDO::PARAM_STR);
  $statement->bindValue(':userId', $userId);
  $statement->bindValue(':userFullName', $userFullName);
  $statement->bindValue(':data', $data, PDO::PARAM_STR);
  $statement->execute();

  return $statement->rowCount();
}
//-----------------------------------------------------------------
function destroy_session($sessionId)
{
  global $link;
  $q = 'DELETE FROM hr_sessions WHERE sessionId = :sessionId';
  $statement = $link->prepare($q);
  $statement->bindValue(':sessionId', $sessionId, PDO::PARAM_STR);
  $statement->execute();

  $_SESSION = array();

  return (bool) $statement->rowCount();
} // End of destroy_session() function.
//-----------------------------------------------------------------
function clean_session($expire)
{
  global $link;
  // Delete old sessions:
  $q = 'DELETE FROM hr_sessions WHERE DATE_ADD(lastAccessed, INTERVAL 10800 SECOND) < NOW()';
  $statement = $link->prepare($q);
  $statement->bindValue(':expire', $expire, PDO::PARAM_INT);
  $statement->execute();

  return $statement->rowCount();
} // End of clean_session() function.