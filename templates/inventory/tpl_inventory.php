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

<?php include '../tpl_header.php'; ?>

<!--list template begins-->
<script type="text/x-handlebars-template" id="list-inventory">

  <table id="list-items" class="table table-striped table-hover">
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
<!--end of list template-->
<!--profile template begins-->
<script type="text/x-handlebars-template" id="employee_profile">
  <form id="form-generalTab-form" action="index.php?p=employees&action=update" method="post" data-employeeId="{{employeeId}}">
    <table id="table-general-table" class="table table-hover">
      {{#employee}}
      <thead>
      <th class="text-left">{{employeeName}} {{employeeLastname}}</th>
      </thead>
      <tbody>
      <tr>
        <td>GCExpire:</td>
        <td class= "inputContainer">
          <span>{{GCExpire}}</span>
          <input type="hidden" name="GCExpire" data-type="date" min="<?php echo date('Y-m-d');?>" data-inputmask="" value="{{GCExpire}}">
          <!--months and days do not change, no drop out-->
        </td>
      </tr>
      <tr>
        <td>Personal Cell Phone:</td>
        <td class= "inputContainer">
          <span>{{cellphonePersonal}}</span>
          <input type="hidden" name="cellphonePersonal" data-type="" data-inputmask="\'mask': '1-999-999-9999'" value="{{cellphonePersonal}}">
        </td>
      </tr>
      <tr>
        <td>Work Phone Number:</td>
        <td class= "inputContainer">
          <span>{{cellphoneWork}}</span>
          <input type="hidden" name="cellphoneWork" data-type="" data-inputmask="" value="{{cellphoneWork}}"></td>
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
          <input type="hidden" name="employeeZip" data-type="text" maxlength="5" pattern="[0-9]{5}" value="{{employeeZip}}">
        </td>
      </tr>
      <tr>
        <td>Birth Date:</td>
        <td class= "inputContainer">
          <span>{{employeeDOB}}</span>
          <input type="hidden" name="employeeDOB" data-type="date" data-inputmask="" value="{{employeeDOB}}">
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
        <td>ID:</td>
        <td class= "inputContainer">
          <span>{{employeeId}}</span>
          <input type="hidden" name="employeeId" data-type=text data-inputmask="" value="{{employeeId}}">
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
          <input type="hidden" name="employeeSSN" data-type="text" data-inputmask="\'mask': '9999999999'\" value="{{employeeSSN}}">
        </td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td class= "inputContainer">
          <span>{{phoneDirect}}</span>
          <input type="hidden" name="phoneDirect" data-type="text" data-inputmask="" value="{{phoneDirect}}">
        </td>
      </tr>
      <tr>
        <td>Phone Ext:</td>
        <td class= "inputContainer">
          <span>{{phoneExt}}</span>
          <input type="hidden" name="phoneExt" data-type="text" data-inputmask="" value="{{phoneExt}}">
        </td>
      </tr>
      <tr>
        <td>Email:</td>
        <td class= "inputContainer">
          <span>{{emailPersonal}}</span>
          <input type="hidden" name="emailPersonal" data-type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-inputmask="" value="{{emailPersonal}}">
        </td>
      </tr>
      </tbody>
      {{/employee}}
    </table>
  </form>
</script>

<!--form for new employee-->

<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                <input class="form-control" name="DOB" type="text" placeholder="mm/dd/yyyy">
              </div>

              <label class="col-sm-2 control-label" style="text-align:left">SSN:</label>
              <div class="col-sm-4">
                <input class="form-control" name="SSN" type="text">
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
                <input class="form-control" name="cellPhone" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label" style="text-align:left">Work Phone Number:</label>
              <div class="col-sm-8">
                <input class="form-control" name="workPhone" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="text-align:left">Phone Number:</label>
              <div class="col-sm-4">
                <input class="form-control" name="phoneNumber" type="text">
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
                <input class="form-control" name="zip" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" style="text-align:left">GCExpire:</label>
              <div class="col-sm-4">
                <input class="form-control" name="GCExpire" type="date">
              </div>
              <label class="col-sm-2 control-label" style="text-align:left">DLExpire:</label>
              <div class="col-sm-4">
                <input class="form-control" name="DLExpire" type="date">
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
        var list_template = $("#list-inventory").html();
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
