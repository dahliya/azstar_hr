<?php
//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}

?>

<html>
<head>

  <title>Untitled</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel ="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="javascript/jquery-ui.js"></script>
  <script type="text/javascript" src="javascript/handlebars-v4.0.5.js"></script>
  <script type="text/javascript" src="javascript/ajax.form.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<div class="container-fixed">
  <div id="header" class="">
    <span id="user"> User : Irina</span>
    <span><a href="index.php?p=logout">(Log out)</a></span>
  </div>

  <div id="container-menu" class ="col-fixed-160">
    <nav>
      <ul class="menu">
        <li class = "white" id="employees"><a href="index.php?p=employees&action=get_list">Employees</a></li>
        <li class = "white" id="inventory"><a href="index.php?p=inventory&action=get_list">Inventory</a></li>
        <li class = "white" id="complaints"><a href="index.php?p=employees&action=get_list">Complaints</a></li>
        <li class = "white" id="violations"><a href="index.php?p=employees&action=get_list">Violations</a></li>
        <li class = "white" id="new_employee" data-toggle="modal" data-target="#myModal">
          <a href="index.php?p=new_employee">Add new employee</a>
        </li>
        <li class = "white" id="new_item" data-toggle="modal" data-target="#myModal">
          <a href="index.php?p=new_item">Add new Item</a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div id="list_template" class ="col-fixed-240"></div>
    <div id="container-profile" class ="col-fixed-250"></div>
    <div id="document_viewer" class =""></div>
  </div>
</div>

<script type="text/javascript">



</script>
</body>


</html>