<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
include_once "../assets/db/dbdcsa.php";
$res=mysql_query("select distinct(batch) from stud_attend");
echo '<label for="batch"></label><select name="batch" onchange="getsem(this.value)" ><option>select batch</option>';
while($row=mysql_fetch_array($res))
{
	$tbatch=$row['batch'];
	?>
    <option><?php echo $tbatch;?></option>
    <?php
}
echo '</select>';
   ?>
</body>
</html>
