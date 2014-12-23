<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCRW: Home Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-extensions.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    $loginform = "<form action='index.php' method='post' class='container center_div'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='user' name='uName'>
        </div>
        <div class='form-group'>
          <input type='password' class='form-control' placeholder='password' name='pWord'>
        </div>

        <button type='submit' class='btn btn-primary btn-xlarge center-block' name='loginbtn' value='login'>Login</button>
      </form>"
    ?>


  </head>
  <body>
    <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CCRW RockWall</a>
    </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Search</a></li>
        <li><a href="userAdd.php">Add User</a></li>
        <li><a href="DispAll.php">Members</a></li>
      </ul>
    </div>
  </nav>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
      <form action='index.php' method='post' class='container center_div'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='Username' name='uName'>
        </div>
        <div class='form-group'>
          <input type='password' class='form-control' placeholder='Password' name='pWord'>
        </div>

        <button type='submit' class='btn btn-primary btn-xlarge center-block' name='loginbtn' value='login'>Login</button>
      </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>