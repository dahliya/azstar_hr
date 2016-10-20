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