<html>
	<head>
		<title>Staff</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <?php            
                    session_start();
                
                    if($_SESSION['regno']){
                    }
                    else
                    {
                        header("location:index.html");
                    }
                    $user_id=  $_SESSION['regno'];   
                    $_SESSION['regno']=$user_id;
                    //$encrp=$_SESSION['encr'];  
                    mysql_connect("localhost", "root", "") or die(mysql_error());
                    mysql_select_db("dcsa") or die("cannot connect database");
                    $query=  mysql_query("select * from mas_staff");
                    $exist=  mysql_num_rows($query);
                    $temp="0";
                    $table_fname="";
                    if($exist>0)
                    {
                        while($row=  mysql_fetch_assoc($query))
                        {
                            $table_userid=$row['Staff_Key'];
                            if($user_id==$table_userid)
                            {
                                $temp=1;
                                $table_fname=$row['First_Name'];
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
		<div id="page-wrapper" >

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Home</a></h1>
					<nav id="nav">
						<ul>
							
							<li>
								<a href="#" class="icon fa-angle-down">KalaiSelvi</a>
								<ul>
									<li><a href="#">Profile</a></li>
									<li><a href="#">Study Groups</a></li>
									<li><a href="#">My Lectures</a></li>
                                                                        <li><a href="#">Student Assignments</a></li>
									
								</ul>
							</li>
                                                        <li><a href="logout.php" class="button">Log out</a></li>
						
						</ul>
					</nav>
				</header>
                </div>
                </body>
	  <?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dcsa") or die("Cannot connect to database"); 
//$gid1= $_GET['gid'];
$gid1="201601";
$query = "SELECT * FROM std_assignments where Group_ID='$gid1'"; 
$result = mysql_query($query);
$bool=true;
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
$path=$row['Std_Assignment_Path'];
$sk=$row['Student_Key'];
echo ' 	<form method="post">
                    <div class="row">
						<div class="12u">

							<!-- Table -->
								<section class="box"> <div class="table-wrapper">
										<table class="alt">
											<tbody>
												<tr>
													<td>'.$row['Student_Key'] .'</td> 
													<td> <a href="' .$path.'" >view file</td> 
													<td> <input type="number" id="Marks" name="Marks" placeholder="Marks"> </td> 
                                                    <td> <input type="submit" value="Submit" name="submit"> 
                                                </tr> 
												</tbody>
										</table>
								</section>

						</div>
					</div>
                              </form>';    						  
	  }
	 
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$m = mysql_real_escape_string($_POST["Marks"]);
$queryup = "update std_assignments set Marks_Assigned='$m' where Group_ID='$gid1' and Student_Key='$sk'"; 
$result = mysql_query($queryup);
Print '<script>alert("Mark Successfully Updated."); </script>';}
?>
<?php 
include('bottom.php');
?>