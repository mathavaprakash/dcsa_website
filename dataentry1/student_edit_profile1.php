<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Edit Profile</title>
		 <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		 <link rel="icon" type="image/png" href="../images/logo.png" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/jquery.validate.css" />
                <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
                <script src="../lib/jquery/jquery-1.3.2.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validate.js" type="text/javascript">
                </script>
                <script src="../javascripts/jquery.validation.functions.js" type="text/javascript"></script>
                <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
                jQuery("#user").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#fname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
                jQuery("#lname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
				jQuery("#skey").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter the Required field"
                });
				  jQuery("#skey").validate({
                    expression: "if (VAL.match(/^[0-9]*$/) && VAL) return true; else return false;",
                    message: "Please enter a valid integer"
                });
                jQuery("#moblie").validate({
                    expression:"if(!isNaN(VAL) && VAL) return true; else return false;",
                    message:"Please enter the valid mobile number"
                });
                jQuery("#email").validate({
                    expression:"if(VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message:"Please enter valid email ID"
                });
                
            });
            </script>
               <?php
            
                  /*  session_start();
                    if($_SESSION['regno']){
                    }
                    else
                    {
                        header("location:index.html");
                    }
                    $user_id=$_SESSION['regno'];*/
			if(isset($_GET['akey']))
            {  
		     include_once "../assets/db/dbdcsa.php";
            $Student_Key=encryptor('decrypt',$_GET['akey']);		
            //$Student_Key=$_GET["akey"];							 
            $query=  mysql_query("select * from mas_students");
            $exist=  mysql_num_rows($query);
            $temp="0"; 
            $table_fname="";
            $table_lname="";
            $table_mobile="";
            $table_email="";
            $table_gender="";
          $table_staffkey="";
           
            if($exist>0)
            {
                while($row=  mysql_fetch_assoc($query))
                {
                    
                    $table_userid=$row['Student_Key'];
                    if($Student_Key==$table_userid)
                    {
                        $temp=1;
                        $table_fname=$row['First_Name'];
                        $table_lname=$row['Last_Name'];
                        $table_mobile=$row['Mobile'];
                        $table_email=$row['Email'];
                        $table_gender=$row['Gender'];
                        $table_staffkey=$row['Staff_Key'];
                        break;
                    }
                }
                if($temp==0)
                {
                     header("location:index.html");
                }
            }
                ?>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
				<?php  $Student_Key2=encryptor('encrypt',$Student_Key);?>		
					<h1><a href="student_profile_view1.php?akey=<?php echo $Student_Key2;?>">Back</a></h1>
					<nav id="nav">
						
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					
                        
                        <div class="row">
						<div class="12u">

							<!-- Form -->
								<section id="cta">

									<h3>Edit Student Profile</h3>
									<form method="post" action="#">
										<div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
                                                                                            <input type="text" name="userid" id="user" value="<?php print "$table_userid"; ?>" placeholder="user id" readonly="readonly"/>
											</div>
                                                                               </div>
                                                                                <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												<input type="text" name="fname" id="fname" value="<?php print "$table_fname"; ?>" placeholder="First Name" />
											</div>
                                                                               </div>
                                                                                <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												<input type="text" name="lname" id="lname" value="<?php print "$table_lname"; ?>" placeholder="Last Name" />
											</div>
										</div>
										
										<div class="row uniform 75%">
											<div class="4u 12u(narrower)">
                                                                                                <input type="radio" id="male" value="Male" name="gender" <?php if($table_gender=='Male'){ ?>checked <?php } ?> >
												<label for="male">Male</label>
											</div>
											<div class="4u 12u(narrower)">
												<input type="radio" id="female" value="Female" name="gender"<?php if($table_gender=='Female'){ ?>checked <?php } ?>  >
												<label for="female">Female</label>
											</div>
										
										</div>
										 <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
												<input type="text" name="skey" id="skey" value="<?php print "$table_staffkey"; ?>" placeholder="Guru_Key" />
											</div>
										</div>
										<div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
                                                                                            <input type="text" name="mobile" id="moblie" value="<?php print "$table_mobile"; ?>" placeholder="Mobile Number" />
											</div>
                                                                                </div>
                                                                                <div class="row uniform 50%">
											<div class="12u 12u(mobilep)">
                                                                                            <input type="email" name="email" id="email"  value="<?php print "$table_email"; ?>" placeholder="E-Mail ID" />
											</div>
										</div>
										
										<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" value="Update Profile" /></li>
													<li><input type="reset" value="Reset" class="alt" /></li>
												</ul>
											</div>
										</div>
									</form>

									
								</section>

						</div>
					</div>
</section>
			<?php
			}
			?>
			
			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; GRI-DCSA. All rights reserved.</li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

  
<?php
            
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {      
	        include_once "../assets/db/dbdcsa.php";
            $userid=mysql_real_escape_string($_POST['userid']);
			
            $fname=mysql_real_escape_string($_POST['fname']);
            $lname=mysql_real_escape_string($_POST['lname']);
            $gender=mysql_real_escape_string($_POST['gender']);
            $mobile=mysql_real_escape_string($_POST['mobile']);   
            $email=mysql_real_escape_string($_POST['email']);
			$staffkey=mysql_real_escape_string($_POST['skey']);
            
            if(($mobile<7000000000) or ($mobile>9999999999))
            {
                print '<script>alert("mobile number is incorrect. enter valid mobile number")</script>';
                //print '<script>window.location.assign("registration.php");</script>';
                exit;
            } 
            if(mysql_query("UPDATE mas_students SET First_Name='$fname',Last_Name='$lname',Gender='$gender', Staff_Key=$staffkey,Mobile=$mobile,Email='$email' WHERE Student_Key ='$userid'"))
			{
				print '<script>alert("Your Profile was Edited Successfully")</script>';
				  $Student_Key3=encryptor('encrypt',$userid);
	            
			print '<script>window.location.assign("student_profile_view1.php?akey='.$Student_Key3.'");</script>';
			}
			else
			{
				print '<script>alert("update error");</script>';
			}

            
        }
?>
	</body>
</html>