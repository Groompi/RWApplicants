<?php
session_start();
?>
<!DOCTYPE html>
<?php
$Search = $_GET['Search'];
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCRW: Search</title>

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

                            $query = $handler->query("SELECT * FROM RWApplicants WHERE FirstName ='$Search' ORDER BY LastName");
                            $r = $query->fetchAll();
                            if($r){
                                
                                    //echo "first"; //checking for search from first name or last name
                                        //print_r($r);
                                    $num = 0;
                                    $nRows = count($r);
                                    $aRows = $nRows - 1;

                            }else{
                                $r = null;
                                require("handler.php");
                                $query = $handler->query("SELECT * FROM RWApplicants WHERE LastName ='$Search' ORDER BY LastName");
                                $r = $query->fetchAll();
                                    if($r){
                                        echo "last";
                                        $num = 0;
                                        $nRows = count($r);
                                        $aRows = $nRows - 1;
                                    }else{
                                        $fS = "<span class='alert cntTbl alert-danger'>Your search for <b>$Search</b> did not match any etnries. </span>";
                                    }
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
      <table class="table table-striped">
        <tr>
          <td><b>Full Name</b><td>
          <td><b>First Name</b></td>
          <td><b>Last Name</b></td>
          <td><b>Age</b></td>
          <td><b>Date Signup</b></td>
          <td><b>More Info</b></td>
        </tr>
         <?php
            while($r[$num] > $aRows){
            $fullName = $r[$num]['FullName'];
            $nameID = $r[$num]['id'];
            $fName = $r[$num]['FirstName'];
            $lName = $r[$num]['LastName'];
            $dateS = $r[$num]['DateSignup'];
            $age = $r[$num]['Age'];
            $each = "<tr>
          <td>$fullName<td>
          <td>$fName</td>
          <td>$lName</td>
          <td>$age</td>
          <td>$dateS</td>
          <td><a href=info.php?ID=" . $nameID . "><span class='btn btn-info btn-sm'>More Info</td>
        </tr>";
        echo $each;
            $num = $num +1;
            }?>
          </table>
          <?php echo $fS;?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>