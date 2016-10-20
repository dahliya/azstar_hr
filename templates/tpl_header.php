<div class="container-fixed">
  <div id="header" class="">
    <span id="user"> User : Irina</span>
    <span><a href="index.php?p=logout">(Log out)</a></span>
  </div>

  <div id="container-menu" class ="col-fixed-160">
    <nav>
      <ul class="menu">
        <li class = "white" id="employees"><a href="index.php?p=employees&action=get_list">Employees</a></li>
        <li class = "white" id="inventory"><a href="index.php?p=inventory&action=get_list">Inventory</a></li>
        <li class = "white" id="complaints"><a href="index.php?p=employees&action=get_list">Complaints</a></li>
        <li class = "white" id="violations"><a href="index.php?p=employees&action=get_list">Violations</a></li>
        <li class = "white" id="new_employee" data-toggle="modal" data-target="#myModal">
          <a href="index.php?p=new_employee">Add new employee</a>
        </li>
        <li class = "white" id="new_item" data-toggle="modal" data-target="#myModal">
          <a href="index.php?p=new_item">Add new Item</a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div id="list_template" class ="col-fixed-240"></div>
    <div id="container-profile" class ="col-fixed-250"></div>
    <div id="document_viewer" class =""></div>
  </div>
</div>

