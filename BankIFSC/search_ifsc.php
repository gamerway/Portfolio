<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include "admintabs.html"; 
include "db.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
	color: #0000FF;
}
.style3 {font-size: 18px}
.style5 {color: #FFFFFF; font-weight: bold; }
-->
</style>
</head>

<body>
<p align="center" class="style1">Search IFSC </p>
<form id="form1" name="form1" method="post" action="">
  <div align="center"><span class="style3">Enter Bank Name</span> 
    <input type="text" name="bname" />  
    <input type="submit" name="Submit" value="Search" />
  </div>
</form>

<p>
  <?php 
if(isset($_POST["Submit"])){

$name=$_POST["bname"];
$sql="select * from bank where name='$name'";
  $retval=mysqli_query($conn, $sql);  
  
if(mysqli_num_rows($retval) > 0){  
 if($row = mysqli_fetch_assoc($retval)){
?>
</p>
<p>&nbsp;</p>
<table width="363" height="174" border="1" align="center">
  <tr>
    <td width="129" bgcolor="#0000FF"><div align="right" class="style5">Bank Name</div></td>
    <td width="218" bgcolor="#CCCCCC"><strong>
      <?php  echo $row['name']?>
    </strong></td>
  </tr>
  <tr>
    <td bgcolor="#0000FF"><div align="right" class="style5">Address</div></td>
    <td bgcolor="#CCCCCC"><strong>
      <?php  echo $row['address']?>
    </strong></td>
  </tr>
  <tr>
    <td bgcolor="#0000FF"><div align="right" class="style5">IFSC</div></td>
    <td bgcolor="#CCCCCC"><strong>
      <?php  echo $row['ifsc']?>
    </strong></td>
  </tr>
  <tr>
    <td bgcolor="#0000FF"><div align="right" class="style5">ID</div></td>
    <td bgcolor="#CCCCCC"><strong>
      <?php  echo $row['bank_id']?>
    </strong></td>
  </tr>
</table>

<?php 
}
}else{
echo "No such Bank name exist";
}
}
?>
<p>&nbsp;</p>
</body>
</html>
