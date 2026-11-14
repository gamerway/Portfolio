
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include "admintabs.html";
include "db.php";

?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>



<style>
.table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
.style1 {color: #0000FF;

font-size:14px;}
.style3 {font-size: 18px}
.style6 {font-size: 16px; font-weight: bold; }
.style7 {font-size: 16px}
</style>

</head>

<body>

<br />


<div align="center" style="color:blue"><strong>Add New Bank </strong></div>
<form id="form1" name="form1" method="post" action="">
  <table width="514" border="1" align="center">
    <tr>
      <td width="289" ><span class="style1">Enter  name </span></td>
      <td width="209" ><input name="s1" type="text" id="s1" required/></td>
    </tr>
    <tr>
      <td><span class="style1">Address</span></td>
      <td><input name="s2" type="text" id="s2" value="" required/></td>
    </tr>
    <tr>
      <td><span class="style1">IFSC</span></td>
      <td><input name="s3" type="text" id="s3" value="" required/></td>
    </tr>
    <tr>
      <td><span class="style1">Phone</span></td>
      <td><input name="s4" type="text" id="s42" value=""  required="required"/></td>
    </tr>
    <tr>
      <td><span class="style1">username</span></td>
      <td><input name="s5" type="text" id="s4" value=""  required/></td>
    </tr>
    <tr>
      <td><span class="style1">password</span></td>
      <td><input name="s6" type="text" id="s4" value=""  required/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Create Bank" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>

<?php 
if(isset($_POST["Submit"])){

$s1=$_POST["s1"];
$s2=$_POST["s2"];
$s3=$_POST["s3"];
$s4=$_POST["s4"];
$s5=$_POST["s5"];
$s6=$_POST["s6"];




$sql="insert into bank(name,address,ifsc,phone,username,password) values('$s1','$s2','$s3','$s4','$s5','$s6')";
if(mysqli_query($conn, $sql)){ 
 ?>
  <script>alert("New Bank Regisered  Successfully");window.open("addbank.php","_self");</script>
  ; 
  
  
  <?php 
}else{  
echo "Could not insert record: ". mysqli_error($conn);  
}
 }
  ?>

</body>
</html>
