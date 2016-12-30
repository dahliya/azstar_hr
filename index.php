<?php
$secretKey = 'jhbrfpbv';

require 'config.inc.php'; //session starts inside.

if (isset($_SESSION['User']) && $_SESSION['User']->get_userId() && is_numeric($_SESSION['User']->get_userId()))
{
  $User = $_SESSION['User'];
  //Change password
  if(isset($_GET['action']) && $_GET['action'] == 'change_password')
  {
    if(@!empty($_POST['oldPassword']) and @!empty($_POST['newPassword1']))
    {
      echo json_encode($User->update_password($_POST['oldPassword'], $_POST['newPassword1']));
    }
    exit;
  }

  if (isset($_GET['p']))
  {
    $page = $_GET['p'];
  }
  else
  {
    $page = 'dashboard';
  }

  switch ($page)
  {
    case 'logout' :
      session_destroy();
      require 'templates/tpl_login.php';
      exit();
      break;
    case 'employees' :
      require 'employees.php';
      break;
    case 'inventory':
      require 'inventory.php';
      break;
    // need to be edited
    default:
      require 'employees.php';
  }
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST' && @!empty($_POST['loginName']) && @!empty($_POST['password']))
{
  $Login = new Login();
  $loginResult = $Login->check_login($_POST);
  if ($loginResult !== true)
  {
    require 'templates/tpl_login.php';
  }
  else
  {
    $User = $_SESSION['User'];
    require 'templates/employees/tpl_employees.php';
  }
}
else
{
  require 'templates/tpl_login.php';
}

session_write_close();