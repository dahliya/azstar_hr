<?php

//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Employees</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <title>Log into system</title>

  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700);


    #bg {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: url('css/images/nature-4.jpg'); /* change to any color or other background here*/
      background-size: cover;
    }

    form {
      position: relative;
      width: 780px;
      height: 150px;
      margin-top: 350px;
      margin-right: 500px;
      margin-bottom: 200px;
      margin-left: 620px;
      border: 1px solid;
      border-radius: 10px;
      border-top-color: rgba(255,255,255,.4);
      border-left-color: rgba(255,255,255,.4);
      border-bottom-color: rgba(60,60,60,.4);
      border-right-color: rgba(60,60,60,.4);
    }

    form input.inline{
      width: 330px;
      height: 35px;
      border: 1px solid;
      border-radius: 8px;
      border-bottom-color: rgba(255,255,255,.5);
      border-right-color: rgba(60,60,60,.35);
      border-top-color: rgba(60,60,60,.35);
      border-left-color: rgba(80,80,80,.45);
      color: black;
      padding: 8px;
      font: bold 1.30em/1em "Open Sans Condensed", sans-serif;
      letter-spacing: .09em;
      text-shadow: 0 1px 0 rgba(0,0,0,.1);
      margin-top: 50px;
      margin-bottom: 50px;
      margin-left: 25px;
    }

    ::-webkit-input-placeholder { color: #ccc; text-transform: uppercase; }
    ::-moz-placeholder { color: #ccc; text-transform: uppercase; }
    :-ms-input-placeholder { color: #ccc; text-transform: uppercase; }

    #button{
      padding-right: 10px;
      width: 150px;
      height: 50px;
      margin-bottom: 0;
      margin-right: 25px;
      color: #3f898a;
      letter-spacing: .05em;
      text-shadow: 0 1px 0 #133d3e;
      text-transform: uppercase;
      background: #225556;
      border-top-color: #9fb5b5;
      border-left-color: #608586;
      border-bottom-color: #1b4849;
      border-right-color: #1e4d4e;
      cursor: pointer;
    }

    div span{
      display: table;

    }

  </style>
</head>
<body>

<div id="bg"></div>

<form name="loginForm" method="POST" action="index.php" autocomplete="off">

  <input class="inline" type="text" name="loginName" placeholder="email">
  <input class="inline" type="password" name="password" id="" placeholder="password">
  <input class= "inline" id="button" type="submit" value="Login"/>

  <span>Please contddddddddddddddddddact your administrator to sign up.</span>

</form>



</body>

</html>