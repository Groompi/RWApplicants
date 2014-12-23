<?php
session_start();
?>
<!DOCTYPE html>
<?php
$ID = $_GET['ID'];
?>
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
            require("handler.php");
            $query = $handler->query("SELECT FirstName, LastName, Age, EmergencyNumber, EmergencyName, DateExpire, DateSignup FROM RWApplicants WHERE ID ='$ID'");
            $r = $query->fetch();
                if ($r){
                    $FirstName = $r['FirstName'];
                    $LastName = $r['LastName'];
                    $EmergencyNumber = $r['EmergencyNumber'];
                    $EmergencyName = $r['EmergencyName'];
                    $DateSup = $r['DateSignup'];
                    $DateExpire = $r['DateExpire'];
                    $age = $r['Age'];

                                        $TableEntry = "
                        <table class='table-condensed table-striped table-bordered cntTbl fntInf'>
                            <tr>
                                <td><b>First Name</b></td>
                                <td>$FirstName</td>
                            </tr>
                            <tr>
                                <td><b>Last Name</b></td>
                                <td>$LastName</td>
                            </tr>
                            <tr>
                              <td><b>Age</b></td>
                              <td>$age</td>
                            </tr>
                            <tr>
                                <td><b>Emergency Number</b></td>
                                <td>$EmergencyNumber</td>
                            </tr>
                            <tr>
                                <td><b>Emergency Name</b></td>
                                <td>$EmergencyName</td>
                            </tr>
                            <tr>
                                <td><b>Date Signup</b></td>
                                <td>$DateSup</td>
                            </tr>
                            <tr>
                                <td><b>Date Expire</b></td>
                                <td>$DateExpire</td>
                            </tr>
                            <tr>
                                <td><b>Age</b></td>
                                <td>$Age</td>
                        </table>";
                }else{
                    $return = "<div class='alert alert-danger div_center' role='alert'>Sorry, there is no user with the ID of $ID</div>";
                }
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
      <form action='search.php' method='get' class='navbar-form navbar-right'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='Search' name='Search'>
        </div>
        <button type='submit' class='btn btn-default' value='Search'>Search</button>
      </form>
    </div>
  </nav>
<?php
echo $return;
echo $TableEntry;
?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>