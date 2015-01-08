<?php
      $naviNo = "
          <nav class='navbar navbar-inverse' role='navigation'>
  <div class='container-fluid'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='index.php'>CCRW RockWall</a>
    </div>
      <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='index.php'>Search</a></li>
        <li><a href='userAdd.php'>Add User</a></li>
        <li><a href='DispAll.php'>Members</a></li>
        <li><a href='./../admin/index.php'>Login</a></li>
      </ul>
                  <form action='search.php' method='get' class='navbar-form navbar-right'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='Search' name='Search'>
        </div>
        <button type='submit' class='btn btn-default' value='Search'>Search</button>
      </form>
    </div>
  </nav>";

      $naviYes = "
      <nav class='navbar navbar-inverse' role='navigation'>
  <div class='container-fluid'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='index.php'>CCRW RockWall</a>
    </div>
      <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='./../index.php'>Search</a></li>
        <li><a href='userAdd.php'>Add User</a></li>
        <li><a href='DispAll.php'>Members</a></li>
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>$Username <span class='caret'></span></a>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='#'>Admin</a></li>
            <li class='divider'></li>
            <li><a href='logout.php'>Logout</a></li>
          </ul>
        </li>
      </ul>
            <form action='search.php' method='get' class='navbar-form navbar-right'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='Search' name='Search'>
        </div>
        <button type='submit' class='btn btn-default' value='Search'>Search</button>
      </form>

    </div>
  </nav>
      ";
?>