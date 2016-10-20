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

  <?php include '/../tpl_header.php'; ?>
  <?php include 'tpl_list_of_employees.php'; ?>
  <?php include 'tpl_profile_of_employee.php'; ?>
  <?php include 'tpl_new_employee.php'; ?>

</body>

<script type="text/javascript">
  var employeeId;
  var newEmployeeForm = $("#form-new-employee");
  var body = $("body");
  var alert = $("#alert");

  $("ul.menu a").click(function(){
    event.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      data: {
      },
      type: 'GET',
      dataType:'JSON',
      success: function(data) {
        //list template begins
        var list_template = $("#list").html();
        var list_renderer = Handlebars.compile(list_template);
        var list_result = list_renderer({employee: data});
        var list = $("#list_template").html(list_result);
        //end of list template
        //profile template begins
        if (list) {
          $("tr.clickable-row").click(function () {
            event.preventDefault();
            employeeId = $(this).attr('data-employeeId');
            $.each(data, function (key, value) {
              if (value['employeeId'] == employeeId) {
                var table_template = $("#employee_profile").html();
                var table_renderer = Handlebars.compile(table_template);
                var table_result = table_renderer({employee: value});
                var profile = $("#container-profile").html(table_result);
              }
            });
          });
        }//end of profile template
      }
    });
  });

  //update a tr in the employee profile
  body.on('click','#table-general-table tr',function(){
    var table = $("#table-general-table");
    var clickedTD = $(this);
    var span = clickedTD.find('span');
    var contents = span.text();
    var input = clickedTD.find('input');
    var inputType = input.attr('data-type');
    var button = $("<input type='submit' class='button form'>").val(" Save ");
    //
    table.find('input[value="Save"]').add('input[type=submit]').remove();
    table.find('input,select').attr('type','hidden').css('display','none');
    table.find(".inputContainer").children("span").css('display','inline');
    input.css('display','inline').attr('type',inputType);
    span.css('display','none');
    input.after(button);
    //
  });

  //Input click
  body.on('click', 'input', function(e){
    e.stopPropagation();
  });
  //submit a new employee
  //alert.css('display','none');
  newEmployeeForm.ajaxForm({
    dataType: 'JSON',
    success: function(data){
      var status = data.status;
      var message = data.message;
      if(status=='OK'){
        newEmployeeForm.resetForm(); //no response from database
        alert.html(message).show().addClass('alert alert-success');
        //alert.delay(1000).fadeOut("slow");
        newEmployeeForm.on('click','input',function () {
          alert.fadeOut("fast");
        })
      }
      else{
        //alert.failure
      }
    }
  });

</script>

</html>
