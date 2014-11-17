<?php 
session_start();
?>

<!DOCTYPE html>
<?php
$fName = $_SESSION['Fname'];
$lName = $_SESSION['Lname'];
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="pageWrapper">           
                <div id="header">
                </div>
                <div id="ctent">
                    <div id="searchMenu">
                        <div id="SearchContent">
                            <form  method="post" action="search.php"  id="searchform"> 
                                <input  type="text" name="DaTa"> 
                                <input  type="submit" name="submit" value="Search"> 
                            </form> 
                        </div>
                    </div>
                    <div id="menu">
                    </div>
                    <div id="content">
						<?php
							$form = "<form action='./userAdd.php' method='post'>
						<table>
							<tr>
								<td>First Name:</td>
								<td><input type='text' name='fName'/></td>
							</tr>
							<tr>
								<td>Last Name:</td>
								<td><input type='text' name='lName'/></td>
							</tr>
							<tr>
								<td>Emergency Name:</td>
								<td><input type='text' name='eName'/></td>
							</tr>
							<tr>
								<td>Emergency Number:</td>
								<td><input type='text' name='eNumber'/></td>
							</tr>
							<tr>
								<td>Employee Signup:</td>
								<td><input type='text' name='empSignup'/></td>
							</tr>
							<tr>
								<td>Signup Date (YYYY/MM/DD):</td>
								<td><input type='text' name='sDate'/></td>
							</tr>
							<tr>
								<td>Signup Date (YYYY/MM/DD):</td>
								<td><input type='text' name='eDate'/></td>
							</tr>

							<tr>
								<td><input type='submit' name='regbtn' value='register'/></td>
							</tr>
						</table></form>";
						if($_POST['regbtn']){

								$fName = $_POST['fName'];
								$lName = $_POST['lName'];
								$eName = $_POST['eName'];
								$eNumber = $_POST['eNumber'];
								$empSignup = $_POST['empSignup'];
								$sDate = $_POST['sDate'];
								$eDate = $_POST['eDate'];

								if ($fName){
									if($lName){
										if($eName){
											if($eNumber){
												if($empSignup){
													if($sDate){
														if($eDate){
															require("handler.php");
															$fuName = "$fName" . " " . "$lName";

															$sql = "INSERT INTO RWApplicants (FirstName, LastName, EmergencyNumber, EmergencyName, EmplSign, DateSignup, DateExpire, FullName) VALUES (:fn,:ln,:en,:ena,:es,:ds,:de,:fun)";
															$q = $handler->prepare($sql);
															$q->execute(array('fn'=>$fName,'ln'=>$lName,'en'=>$eNumber,'ena'=>$eName,'es'=>$empSignup,'ds'=>$sDate,'de'=>$eDate, 'fun'=>$fuName));
															echo "Added Succesfully $form";
														}else{
															echo "You did not enter the Expiration Date $form";//edate
														}

													}else{
														echo "You did not enter the Submit Date $form";//sdate
													}

												}else{
													echo "You did not enter the Employee Name $form";//empsignup
												}

											}else{
												echo "You did not enter an Emergency Number $form";//enumber
											}

										}else{
											echo "You did not enter an Emergency Name $form";//ename
										}

									}else{
										echo "You did not enter a Last Name $form";//lname
									}

								}else{
									echo "You did not enter a First Name $form";//fname
								}
						}else{
							echo $form;
						}
				?>
                    </div>
                    <div id="footer">
                    </div>
                </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
