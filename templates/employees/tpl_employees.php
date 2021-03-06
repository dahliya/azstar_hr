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
        <td class= "">{{employeeFirstname }} {{employeeLastname}}</td>
        <td class= "">{{employeeSSN}}</td>
        <td class= "">{{street1}}, {{street2}}, {{city}}, {{state}}</td>
        <td class= "">{{zip}}</td>
        <td class= "">{{employeeDOB.conv}}</td>
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

    <div class="tab-content"> <!-- employee profile updatable. Add class responsive, so that the table wont move as the screen size changes-->
      <div id="tab-profile" class="tab-pane fade in active">
        <form id="form-generalTab-form" action="index.php?p=employees&action=update" method="post" data-employeeId="{{employeeId}}">
          <table id="table-general-table" class="table table-hover table-responsive">
            {{#employee}}
            <thead>
            <th>{{employeeFirstname }} {{employeeLastname}}</th>
            </thead>
            <tbody>
            <tr>
              <td>Birth Date:</td>
              <td class= "inputContainer">
                <span>{{employeeDOB.conv}}</span>
                <input type="hidden" name="employeeDOB" data-type="date" value="{{employeeDOB.conv}}">
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
              <td>Gender:</td>
              <td class= "inputContainer">
                <span>{{employeeGender}}</span>
                <input type="hidden" name="employeeGender" data-type="text" value="{{employeeGender}}">
              </td>
            </tr>
            <tr>
              <td>Race:</td>
              <td class= "inputContainer">
                <span>{{employeeRace}}</span>
                <input type="hidden" name="employeeRace" data-type="text" value="{{employeeRace}}">
              </td>
            </tr>
            <tr>
              <td>Personal Email:</td>
              <td class= "inputContainer">
                <span>{{emailPersonal}}</span>
                <input type="hidden" name="emailPersonal" data-type="email" value="{{emailPersonal}}">
              </td>
            </tr>
            <tr>
              <td>Work Email:</td>
              <td class= "inputContainer">
                <span>{{emailWork}}</span>
                <input type="hidden" name="emailWork" data-type="email" value="{{emailWork}}">
              </td>
            </tr>
            <tr>
              <td>Personal Cell Phone:</td>
              <td class= "inputContainer">
                <span>{{cellphonePersonal}}</span>
                <input class="phone" type="hidden" name="cellphonePersonal" data-type="text" value="{{cellphonePersonal}}">
              </td>
            </tr>
            <tr>
              <td>Work Cell Phone:</td>
              <td class= "inputContainer">
                <span>{{cellphoneWork}}</span>
                <input class="phone" type="hidden" name="cellphoneWork" data-type="text" value="{{cellphoneWork}}">
              </td>
            </tr>
            <tr>
              <td>Phone Direct Line:</td>
              <td class= "inputContainer">
                <span>{{phoneDirectLine}}</span>
                <input class="phone" type="hidden" name="phoneDirectLine" data-type="text" value="{{phoneDirectLine}}">
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
              <td>Street address 1:</td>
              <td class= "inputContainer">
                <span>{{street1}}</span>
                <input type="hidden" name="street1" data-type="text" value="{{street1}}">
              </td>
            </tr>
            <tr>
              <td>Street address 2:</td>
              <td class= "inputContainer">
                <span>{{street2}}</span>
                <input type="hidden" name="street2" data-type="text" value="{{street2}}">
              </td>
            </tr>
            <tr>
              <td>County:</td>
              <td class= "inputContainer">
                <span>{{county}}</span>
                <input type="hidden" name="county" data-type="text" value="{{county}}">
              </td>
            </tr>
            <tr>
              <td>City:</td>
              <td class= "inputContainer">
                <span>{{city}}</span>
                <input type="hidden" name="city" data-type="text" value="{{city}}">
              </td>
            </tr>
            <tr>
              <td>State:</td>
              <td class= "inputContainer">
                <span>{{state}}</span>
                <select name="state" hidden value="{{state}}">
                  <option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Zip Code:</td>
              <td class= "inputContainer">
                <span>{{zip}}</span>
                <input class="zipCode" type="hidden" name="zip" data-type="text" value="{{zip}}">
              </td>
            </tr>
            <tr>
              <td>GC Expire:</td>
              <td class= "inputContainer">
                <span>{{GCExpire}}</span>
                <input class="date" type="hidden" name="GCExpire" data-type="date" min="<?php echo date('Y-m-d');?>" value="{{GCExpire}}">
                <!--months and days do not change, no drop out-->
              </td>
            </tr>
            <tr>
              <td>DL Number:</td>
              <td class= "inputContainer">
                <span>{{dlNumber}}</span>
                <input type="hidden" name="dlNumber" data-type="text" value="{{dlNumber}}">
                <!--months and days do not change, no drop out-->
              </td>
            </tr>
            <tr>
              <td>Hire Date:</td>
              <td class= "inputContainer">
                <span>{{hireDate}}</span>
                <input type="hidden" name="hireDate" data-type="date" value="{{hireDate}}">
              </td>
            </tr>
            <tr>
              <td>Position:</td>
              <td class= "inputContainer">
                <span>{{positionId}}</span>
                <input type="hidden" name="positionId" data-type="text" value="{{positionId}}">
              </td>
            </tr>
            <tr>
              <td>Emergency Contact:</td>
              <td class= "inputContainer">
                <span>{{emergencyContact}}</span>
                <input class="phone" type="hidden" name="emergencyContact" data-type="text" value="{{emergencyContact}}">
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
    <div id="employeeModal" class="modal fade" data-backdrop="static" role="dialog"> <!-- add so that modal remains open even when clicked outside. data- backdrop = 'static'-->
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="text-align: center">New Employee</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" id="form-new-employee" name="newEmployee" method="POST" action="index.php?p=employees&action=new_employee" autocomplete="off">
              <div class="form-group">
                <label class="col-md-3 control-label" style="text-align:left">First Name:</label>
                <div class="col-md-9">
                  <input class="form-control" name="employeeFirstname" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Last Name:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="employeeLastname" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Birth Date:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="employeeDOB" type="date">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">SSN:</label>
                <div class="col-sm-9">
                  <input class="ssn form-control" name="employeeSSN" type="text" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="Gender" style="text-align:left">Gender:</label>
                <div class="col-sm-3">
                  <select class="form-control" name="employeeGender">
                    <option></option>
                    <option value="f">Female</option>
                    <option value="m">Male</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label" style="text-align:left" for="race">Race:</label>
                <div class="col-sm-4">
                  <select class="form-control" name="employeeRace">
                    <option></option><option>Asian</option><option>Black or African American</option><option>Native Hawaiian or Other Pacific Islander</option><option>American Indian or Alaska Native</option><option>White</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Personal Email:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="emailPersonal" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Work Email:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="emailWork" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left">Personal Cell Phone:</label>
                <div class="col-sm-8">
                  <input class="phone form-control" name="cellphonePersonal" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left">Work Cell Phone:</label>
                <div class="col-sm-8">
                  <input class="phone form-control" name="cellphoneWork" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Phone Direct Line:</label>
                <div class="col-sm-4">
                  <input class="phone form-control" name="phoneDirectLine" type="text">
                </div>
                <label class="col-sm-3 control-label" style="text-align:left">Phone Ext:</label>
                <div class="col-sm-2">
                  <input class="form-control" name="phoneExt" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left">Street Address 1:</label>
                <div class="col-sm-8">
                  <input class="form-control" name="street1" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align:left">Street Address 2:</label>
                <div class="col-sm-8">
                  <input class="form-control" name="street2" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">County:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="county" type="text">
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
                  <input class="form-control" name="GCExpire" type="date">
                </div>
                <label class="col-sm-2 control-label" style="text-align:left">DLNumber:</label>
                <div class="col-sm-4">
                  <input class="form-control" name="dlNumber" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Hire Date:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="hireDate" type="date">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Position:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="positionId" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" style="text-align:left">Emergency Contact:</label>
                <div class="col-sm-9">
                  <input class="form-control" name="emergencyContact" type="text">
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

(function () {
  var EmployeesList;
  EmployeesList = {
    init: function (config) {
      this.template = config.template;
      this.container = config.container;
      this.url = 'index.php?p=employees&action=get_list';

      this.fetch();
    },

    attachTemplate: function(){
     var template = Handlebars.compile(this.template);
     this.container.append(template({employee: this.object}));
     $(document).trigger('trReady');
    },

    fetch: function () {

      var self = this;
      $.getJSON(this.url, function (data) {
         self.object = $.map(data, function (object) {
            return {
              employeeId: object.employeeId,
              employeeFirstname: object.employeeFirstname,
              employeeLastname: object.employeeLastname,
              employeeSSN: object.employeeSSN,
              street1: object.street1,
              street2: object.street2,
              city: object.city,
              state: object.state,
              zip: object.zip,
              employeeDOB: object.employeeDOB,
              employeeRace: object.employeeRace,
              employeeGender: object.employeeGender,
              cellphonePersonal: object.cellphonePersonal,
              cellphoneWork: object.cellphoneWork,
              phoneDirectLine: object.phoneDirectLine,
              phoneExt: object.phoneExt,
              GCExpire: object.GCExpire,
              emailPersonal: object.emailPersonal,
              emailWork: object.emailWork,
              county: object.county,
              dlNumber: object.dlNumber,
              hireDate: object.hireDate,
              positionId: object.positionId,
              emergencyContact: object.emergencyContact
            };
         });
        self.attachTemplate();
      });
    }//
  };

  EmployeesList.init({
    template: $('#list').html(),
    container: $('#list_template')
  });

  // profile
  $(document).on('trReady', function() {

    $("tr.clickable-row").click(function () {
      employeeId = $(this).attr('data-employeeId');
      var EmployeesProfile;
      EmployeesProfile = {
        init: function (config) {
          this.template = config.template;
          this.container = config.container;
          this.url = 'index.php?p=employees&action=get_list';

          this.fetch();
        },

        attachTemplate: function () {
          var self = this;
          $.each(self.object, function (key, value) {
            if (value['employeeId'] == employeeId) {
              var template = Handlebars.compile(self.template);
              self.container.empty();
              self.container.append(template({employee: value}));
            }
          });
          $(document).trigger('profileReady');
        },

        fetch: function () {

          var self = this;
          $.getJSON(this.url, function (data) {
            self.object = $.map(data, function (object) {
              return {
                employeeId: object.employeeId,
                employeeFirstname: object.employeeFirstname,
                employeeLastname: object.employeeLastname,
                employeeSSN: object.employeeSSN,
                street1: object.street1,
                street2: object.street2,
                city: object.city,
                state: object.state,
                zip: object.zip,
                employeeDOB: object.employeeDOB,
                employeeRace: object.employeeRace,
                employeeGender: object.employeeGender,
                cellphonePersonal: object.cellphonePersonal,
                cellphoneWork: object.cellphoneWork,
                phoneDirectLine: object.phoneDirectLine,
                phoneExt: object.phoneExt,
                GCExpire: object.GCExpire,
                emailPersonal: object.emailPersonal,
                emailWork: object.emailWork,
                county: object.county,
                dlNumber: object.dlNumber,
                hireDate: object.hireDate,
                positionId: object.positionId,
                emergencyContact: object.emergencyContact
              };
            });
            self.attachTemplate();
          });
        }
      };

      EmployeesProfile.init({
        template: $('#employee_profile').html(),
        container: $('#container-profile')
      });

    });
  });

})();

var employeeId;
var newEmployeeForm = $("#form-new-employee");
var body = $("body");
var alert = $("#alert");

$(document).on('profileReady', function() {

  //update a tr in the employee profile
  $("#table-general-table tr").click(function(){
    console.log('table clicked');
    var table = $("#table-general-table");
    var clickedTD = $(this);
    var span = clickedTD.find('span');
    var input = clickedTD.find('input','select');
    var select = clickedTD.find('select');
    var inputType = input.attr('data-type');
    var button = $("<input type='submit' class='button form'>").val(" Save ");
    //
    table.find('input[value="Save"]').add('input[type=submit]').remove();
    table.find('input,select').attr('type','hidden').css('display','none');
    table.find(".inputContainer").children("span").css('display','inline');
    input.css('display','inline').attr('type',inputType);
    select.css('display','inline').attr('type',inputType);
    span.css('display','none');
    input.after(button);
    select.after(button);
    //
  });

  //Input click
  $('input').on('click', function(e){
    e.stopPropagation();
  });

  //input mask for new employee
  body.ready(function(){
    $(".ssn").mask("999-99-9999");
    $(".date").mask("99/99/9999");
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

});
//




</script>

</html>
