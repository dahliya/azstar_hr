<?php
//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Log into system</title>

  <link rel="stylesheet" href="css/redmond/jquery-ui-1.10.3.custom.css" type="text/css" media="screen, projection">

  <script src="javascript/jquery-1.9.1.js"></script>
  <script src="javascript/jquery-ui-1.10.3.custom.min.js"></script>
  <style type="text/css">
    html {
      font-family: sans-serif;
      background-image: url('css/images/nature-4.jpg');
      background-size: 100%;
      background-repeat: no-repeat;
    }
    body {
    }
    #div-loginBox {
      margin-top: 450px;
      margin-left: 900px;
      width: 300px;
      height: 500px;
    }
    fieldset {
      text-align: center;
      width: 300;
      height: 300;
      background-color: #64CDFF;
      border: thin black solid;
      border-radius: 10px;
    }
    legend {
      position: relative;
      bottom: +10px;
      border: thin black solid;
      border-radius: 10px;
      padding: 2px 5px 2px 5px;
      background-color: white;
    }
    input[type='text'], input[type='password'] {
      border: thin black solid;
    }
  </style>
</head>
<body>
<div id="div-loginBox">
  <form name="loginForm" method="POST" action="index.php" autocomplete="off">
    <fieldset>
      <legend>Please Login</legend>
      <input type="text" name="loginName" placeholder="Email" required="required"/><br>
      <input type="password" name="password" placeholder="Password" required="required" autocomplete="off"/><br>
      <input type="submit" value="Login"/>
    </fieldset>
  </form>
</div>
</body>
</html>