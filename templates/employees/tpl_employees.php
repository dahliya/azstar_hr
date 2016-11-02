<?php
//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}

?>

<html>
<head>

  <title>Employees</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel ="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="javascript/jquery.maskedinput.min.js"></script>
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
        <li class = "underline" id="employees"><a href="index.php?p=employees">Employees</a></li>
        <li class = "" id="inventory"><a href="index.php?p=inventory">Inventory</a></li>
        <li class = "" id="complaints"><a href="index.php?p=employees&action=get_list">Complaints</a></li>
        <li class = "" id="violations"><a href="index.php?p=employees&action=get_list">Violations</a></li>
        <li class = "" id="new_employee" data-toggle="modal" data-target="#employeeModal"><a>Add new employee</a></li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div id="list_template" class ="col-fixed-240"></div>
    <div id="container-profile" class ="col-fixed-250"></div>
    <div id="document_viewer" class =""></div>
  </div>
</div>
<!--list of employees-->
  <script type="text/x-handlebars-template" id="list">

    <table id="list-employee" class="table table-striped table-hover">
      <thead>
      <th class= "">Name:</th>
      <th class= "">SSN:</th>
      <th class= "">Address:</th>
      <th class= "">Zip Code:</th>
      <th class= "">DOB:</th>
      </thead>
      <tbody>
      {{#employee}}
      <tr class="clickable-row" data-href="index.php?p=employees&action=get_profile" data-employeeId = "{{employeeId}}">
        <td class= "">{{employeeName }} {{employeeLastname}}</td>
        <td class= "">{{employeeSSN}}</td>
        <td class= "">{{employeeStreet}}, {{employeeCity}}, {{employeeState}}</td>
        <td class= "">{{employeeZip}}</td>
        <td class= "">{{employeeDOB}}</td>
      </tr>
      {{/employee}}
      </tbody>
    </table>
  </script>
  <!--profile of employee-->
  <script type="text/x-handlebars-template" id="employee_profile">

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#tab-profile">Profile</a></li>
      <li><a data-toggle="tab" href="#tab-comments">Comments</a></li>
      <li><a data-toggle="tab" href="#tab-files">Files</a></li>
      <li><a data-toggle="tab" href="#tab-inventory">Inventory</a></li>
    </ul>

    <div class="tab-content"> <!-- employee profile updatable-->
      <div id="tab-profile" class="tab-pane fade in active">
        <form id="form-generalTab-form" action="index.php?p=employees&action=update" method="post" data-employeeId="{{employeeId}}">
          <table id="table-general-table" class="table table-hover">
            {{#employee}}
            <thead>
            <th>{{employeeName}} {{employeeLastname}}</th>
            </thead>
            <tbody>
            <tr>
              <td>GCExpire:</td>
              <td class= "inputContainer">
                <span>{{GCExpire}}</span>
                <input class="date" type="hidden" name="GCExpire" data-type="date" min="<?php echo date('Y-m-d');?>" value="{{GCExpire}}">
                <!--months and days do not change, no drop out-->
              </td>
            </tr>
            <tr>
              <td>Personal Cell Phone:</td>
              <td class= "inputContainer">
                <span>{{cellphonePersonal}}</span>
                <input class="phone" type="hidden" name="cellphonePersonal" data-type="" value="{{cellphonePersonal}}">
              </td>
            </tr>
            <tr>
              <td>Work Phone Number:</td>
              <td class= "inputContainer">
                <span>{{cellphoneWork}}</span>
                <input  class="phone" type="hidden" name="cellphoneWork" data-type="" data-inputmask="" value="{{cellphoneWork}}"></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td class= "inputContainer">
                <span>{{employeeStreet}}</span>
                <input type="hidden" name="employeeStreet" data-type="text" data-inputmask="" value="{{employeeStreet}}">
              </td>
            </tr>
            <tr>
              <td>City:</td>
              <td class= "inputContainer">
                <span>{{employeeCity}}</span>
                <input type="hidden" name="employeeCity" data-type="text" data-inputmask="" value="{{employeeCity}}">
              </td>
            </tr>
            <tr>
              <td>State:</td>
              <td class= "inputContainer">
                <span>{{employeeState}}</span>
                <input type="hidden" name="employeeState" data-type="" data-inputmask="" value="{{employeeState}}">
              </td>
            </tr>
            <tr>
              <td>Zip Code:</td>
              <td class= "inputContainer">
                <span>{{employeeZip}}</span>
                <input class="zipCode" type="hidden" name="employeeZip" data-type="text" value="{{employeeZip}}">
              </td>
            </tr>
            <tr>
              <td>Birth Date:</td>
              <td class= "inputContainer">
                <span>{{employeeDOB}}</span>
                <input class="date" type="hidden" name="employeeDOB" data-type="date" value="{{employeeDOB}}">
              </td>
            </tr>
            <tr>
              <td>Gender:</td>
              <td class= "inputContainer">
                <span>{{employeeGender}}</span>
                <input type="hidden" name="employeeGender" data-type="text" data-inputmask="" value="{{employeeGender}}">
              </td>
            </tr>
            <tr>
              <td>Race:</td>
              <td class= "inputContainer">
                <span>{{employeeRace}}</span>
                <input type="hidden" name="employeeRace" data-type="text" data-inputmask="" value="{{employeeRace}}">
              </td>
            </tr>
            <tr>
              <td>SSN:</td>
              <td class= "inputContainer">
                <span>{{employeeSSN}}</span>
                <input  class="ssn" type="hidden" name="employeeSSN" data-type="text" value="{{employeeSSN}}">
              </td>
            </tr>
            <tr>
              <td>Phone Number:</td>
              <td class= "inputContainer">
                <span>{{phoneDirect}}</span>
                <input class="phone" type="hidden" name="phoneDirect" data-type="text" value="{{phoneDirect}}">
              </td>
            </tr>
            <tr>
              <td>Phone Ext:</td>
              <td class= "inputContainer">
                <span>{{phoneExt}}</span>
                <input type="hidden" name="phoneExt" data-type="text" value="{{phoneExt}}">
              </td>
            </tr>
            <tr>
              <td>Email:</td>
              <td class= "inputContainer">
                <span>{{emailPersonal}}</span>
                <input type="hidden" name="emailPersonal" data-type="email" value="{{emailPersonal}}">
              </td>
            </tr>
            </tbody>
            {{/employee}}
          </table>
        </form>
      </div>
      <div id="tab-comments" class="tab-pane fade">
        <h3>Comments</h3>
        <p>These are comments</p>
      </div>
      <div id="tab-files" class="tab-pane fade">
        <h3>Files</h3>
        <p>These are files</p>
      </div>
      <div id="tab-inventory" class="tab-pane fade">
        <h3>Inventory</h3>
        <p>This is inventory</p>
      </div>
    </div>
  </script>
  <!--new employee-->
  <div class="container" >
    <div id="employeeModal" class="modal fade" role="dialog">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="text-align: center">New Employee</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" id="form-new-employee" name="newEmployee" method="POST" action="index.php?p=employees&action=insert_new_employee" autocomplete="off">
              <div class="form-group">
                <label class="col-md-3 control-label" style="text-align:left">First Name:</label>
                <div class="col-md-9">
                  <input class="form-control" name="firstName" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Middle Name:</label>
                <div class="col-sm-9">
                  <input class="form-control" name=middleName type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Last Name:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="lastName" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Birth Date:</label>
                <div class="col-sm-3">
                  <input class="date form-control" name="DOB" type="text">
                </div>
                <label class="col-sm-2 control-label" style="text-align:left">SSN:</label>
                <div class="col-sm-4">
                  <input class="ssn form-control" name="SSN" type="text" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="Gender" style="text-align:left">Gender:</label>
                <div class="col-sm-3">
                  <select class="form-control" name="gender">
                    <option></option><option>Female</option><option>Male</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label" style="text-align:left" for="race">Race:</label>
                <div class="col-sm-4">
                  <select class="form-control" name="race">
                    <option></option><option>Asian</option><option>Black or African American</option><option>Native Hawaiian or Other Pacific Islander</option><option>American Indian or Alaska Native</option><option>White</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Email:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="email" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left">Personal cell Phone:</label>
                <div class="col-sm-8">
                  <input class="phone form-control" name="cellPhone" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left">Work Phone Number:</label>
                <div class="col-sm-8">
                  <input class="phone form-control" name="workPhone" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Phone Number:</label>
                <div class="col-sm-4">
                  <input class="phone form-control" name="phoneNumber" type="text">
                </div>
                <label class="col-sm-3 control-label" style="text-align:left">Phone Ext:</label>
                <div class="col-sm-2">
                  <input class="form-control" name="phoneExt" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Street Address:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="streetAddress" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-1 control-label" style="text-align:left">City:</label>
                <div class="col-sm-3">
                  <input class="form-control" name="city" type="text">
                </div>
                <label for="sel1" class="col-sm-1 control-label" style="text-align:left">State:</label>
                <div class="col-sm-2">
                  <select class="form-control" name="state">
                    <option value="empty"></option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label" style="text-align:left">Zip Code:</label>
                <div class="col-sm-3">
                  <input class="zipCode form-control" name="zip" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left">GCExpire:</label>
                <div class="col-sm-4">
                  <input class="date form-control" name="GCExpire" type="date">
                </div>
                <label class="col-sm-2 control-label" style="text-align:left">DLExpire:</label>
                <div class="col-sm-4">
                  <input class="date form-control" name="DLExpire" type="date">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div id="alert">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

<script type="text/javascript">

  var employeeId;
  var profile;
  var newEmployeeForm = $("#form-new-employee");
  var body = $("body");
  var alert = $("#alert");


  // list of employees
  $.ajax({
    url: "index.php?p=employees&action=get_list",
    data: {},
    type: 'GET',
    dataType: 'JSON',
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
        body.ready(function () {
          $(".ssn").mask("999-99-9999");
          $(".date").mask("99/99/9999"); //ask about dates` jumping and changing
          $(".phone").mask("(999) 999-9999");
          $(".zipCode").mask("99999");
        });
        });
      }//end of profile template
    }
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
  //input mask for new employee
  body.ready(function(){
    $(".ssn").mask("999-99-9999");
    $(".date").mask("99/99/9999"); //ask about dates` jumping and changing
    $(".phone").mask("(999) 999-9999");
    $(".zipCode").mask("99999");
  });

  //submit a new employee
  newEmployeeForm.ajaxForm({
    dataType: 'JSON',
    success: function(data){
      var status = data.status;
      var message = data.message;
      if(status=='OK'){
        newEmployeeForm.resetForm();
        alert.html(message).show().addClass('alert alert-success');
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
