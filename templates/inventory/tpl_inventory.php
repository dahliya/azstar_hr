<?php
//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}

?>

<html>
<head>

  <title>Inventory</title>
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
    <span><a id="logout" href="index.php?p=logout">(Log out)</a></span>
  </div>

  <div id="container-menu" class ="col-fixed-160">
    <nav>
      <ul class="menu">
        <li class = "" id="employees"><a href="index.php?p=employees">Employees</a></li>
        <li class = "underline" id="inventory"><a href="index.php?p=inventory">Inventory</a></li>
        <li class = "" id="complaints"><a href="index.php?p=employees&action=get_list">Complaints</a></li>
        <li class = "" id="violations"><a href="index.php?p=employees&action=get_list">Violations</a></li>
        <li class = "" id="new_item" data-toggle="modal" data-target="#itemModal"><a>Add new Item</a></li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div id="list_template" class ="col-fixed-240"></div>
    <div id="container-profile" class ="col-fixed-250"></div>
    <div id="document_viewer" class =""></div>
  </div>
</div>

<!--list template begins-->
<script type="text/x-handlebars-template" id="list-inventory">
  <table id="list-items" class="table table-striped table-hover">
    <thead>
    <th class= "">Description:</th>
    <th class= "">Make:</th>
    <th class= "">Model:</th>
    <th class= "">Item ID:</th>
    <th class= "">Inventory Type ID:</th>
    </thead>
    <tbody>
    {{#item}}
    <tr class="clickable-row" data-href="index.php?p=inventory&action=get_list" data-itemId = "{{itemId}}">
      <td class= "">{{itemDescription}}</td>
      <td class= "">{{itemMake}}</td>
      <td class= "">{{itemModel}}</td>
      <td class= "text-center">{{itemId}}</td>
      <td class= "text-center">{{inventoryTypeId}}</td>
    </tr>
    {{/item}}
    </tbody>
  </table>
</script>
<!--end of list template-->
<!--profile template begins-->
<script type="text/x-handlebars-template" id="item_profile">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab-profile">Profile</a></li>
    <li><a data-toggle="tab" href="#tab-comments">Comments</a></li>
    <li><a data-toggle="tab" href="#tab-files">Files</a></li>
    <li><a data-toggle="tab" href="#tab-inventory">Inventory</a></li>
  </ul>

  <div class="tab-content"> <!-- Inventory item profile-->
    <div id="tab-profile" class="tab-pane fade in active">
      <form id="form-generalTab-form" action="index.php?p=inventory&action=update" method="post" data-itemId="{{itemId}}">
        <table id="table-general-table" class="table table-hover">
          {{#item}}
          <thead>
          <th class="text-left">{{itemMake}} {{itemModel}}</th>
          </thead>
          <tbody>
          <tr>
            <td>Inventory Type ID:</td>
            <td class= "inputContainer">
              <span>{{inventoryTypeId}}</span>
              <input type="hidden" name="inventoryTypeId" data-type="text" value="{{inventoryTypeId}}">
            </td>
          </tr>
          <tr>
            <td>Item Make:</td>
            <td class= "inputContainer">
              <span>{{itemMake}}</span>
              <input type="hidden" name="itemMake" data-type="text" value="{{itemMake}}"></td>
          </tr>
          <tr>
            <td>Item Model:</td>
            <td class= "inputContainer">
              <span>{{itemModel}}</span>
              <input type="hidden" name="itemModel" data-type="text" value="{{itemModel}}">
            </td>
          </tr>
          <tr>
            <td>Item SN:</td>
            <td class= "inputContainer">
              <span>{{itemSN}}</span>
              <input type="hidden" name="itemSN" data-type="text" value="{{itemSN}}">
            </td>
          </tr>
          <tr>
            <td>Item Piece Count:</td>
            <td class= "inputContainer">
              <span>{{itemPieceCount}}</span>
              <input type="hidden" name="itemPieceCount" data-type="text" value="{{itemPieceCount}}">
            </td>
          </tr>
          <tr>
            <td>Item Description:</td>
            <td class= "inputContainer">
              <span>{{itemDescription}}</span>
              <input type="hidden" name="itemDescription" data-type="text" value="{{itemDescription}}">
            </td>
          </tr>
          <tr>
            <td>Item Purchase Date:</td>
            <td class= "inputContainer">
              <span>{{itemPurchaseDate}}</span>
              <input type="hidden" name="itemPurchaseDate" data-type="text" value="{{itemPurchaseDate}}">
            </td>
          </tr>
          </tbody>
          {{/item}}
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
<!--form for new inventoryItem-->
<div class="container">
  <div class="modal fade" id="itemModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center">New Inventory Item</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="form-new-item" name="newInventoryItem" method="POST" action="index.php?p=inventory&action=insert_new_item" autocomplete="off">
            <div class="form-group">
              <label class="col-md-3 control-label" style="text-align:left">Item Make:</label>
              <div class="col-md-9">
                <input class="form-control" name="itemMake" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="text-align:left">Item Model:</label>
              <div class="col-sm-9">
                <input class="form-control" name="itemModel" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="text-align:left">Item Description:</label>
              <div class="col-sm-9">
                <input class="form-control" name="itemDescription" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" style="text-align:left">Item SN:</label>
              <div class="col-sm-3">
                <input class="form-control" name="itemSN" type="text">
              </div>

              <label class="col-sm-2 control-label" style="text-align:left">Item Piece Count:</label>
              <div class="col-sm-4">
                <input class="form-control" name="itemPieceCount" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="inventoryType" style="text-align:left">Inventory Type:</label>
              <div class="col-sm-3">
                <select class="form-control" name="inventoryType">
                  <option></option><option>Electronics</option><option>Furniture</option>
                </select>
              </div>
              <label class="col-sm-3 control-label" style="text-align:left">Item Purchase Date:</label>
              <div class="col-sm-3">
                <input class="form-control" name="itemPurchaseDate" type="text" placeholder="mm/dd/yyyy">
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

  var itemId;
  var newItemForm = $("#form-new-item");
  var body = $("body");
  var alert = $("#alert");

    $.ajax({
      url: "index.php?p=inventory&action=get_list",
      data: {
      },
      type: 'GET',
      dataType:'JSON',
      success: function(data) {
        //list template begins

        var list_template = $("#list-inventory").html();
        var list_renderer = Handlebars.compile(list_template);
        var list_result = list_renderer({item: data});
        var list = $("#list_template").html(list_result);
        //end of list template
        //profile template begins
        if (list) {
          $("tr.clickable-row").click(function () {
            event.preventDefault();
            itemId = $(this).attr('data-itemId');
            $.each(data, function (key, value) {
              if (value['itemId'] == itemId) {
                var table_template = $("#item_profile").html();
                var table_renderer = Handlebars.compile(table_template);
                var table_result = table_renderer({item: value});
                var profile = $("#container-profile").html(table_result);
              }
            });
          });
        }//end of profile template
      }
    });

  //update a tr in the item profile
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
  newItemForm.ajaxForm({
    dataType: 'JSON',
    success: function(data){
      var status = data.status;
      var message = data.message;
      if(status=='OK'){
        newItemForm.resetForm();
        alert.html(message).show().addClass('alert alert-success');
        newItemForm.on('click','input',function () {
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
