<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
include 'dbdcsa.php';
$batch=$_GET['q'];
echo $batch;
$res=mysql_query("select distinct(First_Name) from mas_staff where Staff_key='(select distinct(Staff_key) from study_group where Batch='$batch')'";
echo '<select name="batch"  class="dropotron"><option>select staff</option>';
while($row=mysql_fetch_array($res))
{
	$tname=$row['First_Name'];
	?>
    <option><?php echo $tname;?></option>
    <?php
}
echo '</select>';
   ?>
</body>
</html>
