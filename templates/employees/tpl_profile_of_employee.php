<script type="text/x-handlebars-template" id="employee_profile">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Profile</a></li>
    <li><a href="#">Comments</a></li>
    <li><a href="#">Files</a></li>
    <li><a href="#">Inventory</a></li>
  </ul>

  <form id="form-generalTab-form" action="index.php?p=employees&action=update"pdethod="post" data-employeeId="{{employeeId}}">
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