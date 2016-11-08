<?php

//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Log into system</title>

  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700);

    body {
      background: #999;
      padding: 40px;
      font-family: "Open Sans Condensed", sans-serif;
    }

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
      width: 250px;
      margin: 300px 900px;
      padding: 20px 22px;
      border: 1px solid;
      border-top-color: rgba(255,255,255,.4);
      border-left-color: rgba(255,255,255,.4);
      border-bottom-color: rgba(60,60,60,.4);
      border-right-color: rgba(60,60,60,.4);
    }

    form input{
      width: 212px;
      border: 1px solid;
      border-bottom-color: rgba(255,255,255,.5);
      border-right-color: rgba(60,60,60,.35);
      border-top-color: rgba(60,60,60,.35);
      border-left-color: rgba(80,80,80,.45);
      background-repeat: no-repeat;
      padding: 8px 24px 8px 10px;
      font: bold .875em/1.25em "Open Sans Condensed", sans-serif;
      letter-spacing: .075em;
      color: black;
      text-shadow: 0 1px 0 rgba(0,0,0,.1);
      margin-bottom: 19px;
    }

    ::-webkit-input-placeholder { color: #ccc; text-transform: uppercase; }
    ::-moz-placeholder { color: #ccc; text-transform: uppercase; }
    :-ms-input-placeholder { color: #ccc; text-transform: uppercase; }

    #button{
      width: 248px;
      margin-bottom: 0;
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

  </style>
</head>
<body>

<div id="bg"></div>
  <form name="loginForm" method="POST" action="index.php" autocomplete="off">
    <label for=""></label>
    <input type="text" name="" id="" placeholder="email" class="email">

    <label for=""></label>
    <input type="password" name="" id="" placeholder="password" class="pass">
    <input id="button" type="submit" value="Login">
  </form>

</body>

</html>