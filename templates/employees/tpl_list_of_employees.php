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
