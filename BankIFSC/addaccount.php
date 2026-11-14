
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
session_start();
include "banktabs.html";
include "db.php";

?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

-->
</style>
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


<div align="center" style="color:blue"><strong>Add New Account </strong></div>
<form id="form1" name="form1" method="post" action="">
  <table width="514" border="1" align="center">
    <tr>
      <td width="289" ><span class="style1">Enter  name </span></td>
      <td width="209" ><input name="s1" type="text" id="s1" required/></td>
    </tr>
    <tr>
      <td><span class="style1">place</span></td>
      <td><input name="s2" type="text" id="s2" value="" required/></td>
    </tr>
    <tr>
      <td><span class="style1">Email</span></td>
      <td><input name="s3" type="email" id="s3" value="" required/></td>
    </tr>
    <tr>
      <td><span class="style1">Phone</span></td>
      <td><input name="s4" type="text" id="s4" value="" pattern="[0-9]{10}" title=" 10 digit   number"  required/></td>
    </tr>
    <tr>
      <td><span class="style1">Adhar No </span></td>
      <td><input name="s5" type="text" id="s42" value="" pattern="[0-9]{12}" title=" 12 digit   number"  required/></td>
    </tr>
    <tr>
      <td><span class="style1">Gender </span></td>
      <td><p>
        <label>
          <input type="radio" name="s6" value="Male"  >
          male</label>
        <br />
        <label>
          <input type="radio" name="s6" value="Female" />
          Female</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td><span class="style1">Balance Amount  </span></td>
      <td><input name="s7" type="number" id="s43" value="" required/></td>
    </tr>
    <tr>
      <td><span class="style1">Password </span></td>
      <td><input name="s8" type="text" id="s44" value="" required/></td>
    </tr>
    <tr>
      <td><span class="style1">Account Number  </span></td>
      <td><input name="s9" type="text" id="s45" value="" pattern="[0-9]{15}" title=" 15 digit   number"  required/></td>
    </tr>
    <tr>
      <td><span class="style1">Pin </span></td>
      <td><input name="s10" type="number" id="s46" value="" pattern="[0-9]{4}" title=" 4 digit   number"  required/></td>
    </tr>
    <tr>
      <td><span class="style1">Max amount  </span></td>
      <td><input name="s11" type="text" id="s47" value="" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Create Account" /></td>
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
$s7=$_POST["s7"];
$s8=$_POST["s8"];
$s9=$_POST["s9"];
$s10=$_POST["s10"];
$s11=$_POST["s11"];

$s12=$_SESSION['bname'];
$s13=$_SESSION['ifsc'];

$sql="insert into account(name,address,email,phone,adharno,gender,balance,password,accno,pin,maxamount,bankname,ifsc) values('$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$s11','$s12','$s13')";
if(mysqli_query($conn, $sql)){ 
 ?>
  <script>alert("Regisered  Successfully");window.open("addaccount.php","_self");</script>
   
  
  
  <?php 
}else{  
echo "Could not insert record: ". mysqli_error($conn);  
}
 }
  ?>

</body>
</html>
