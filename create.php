<?php 
include 'header.php'; 
include 'config.php'; 
include 'database.php'; 
?>

<?php 
$db=new Database();
if(isset($_POST['submit'])){
	$name =mysqli_real_escape_string($db->link,$_POST['name']);
	$email=mysqli_real_escape_string($db->link,$_POST['email']);
	$skill=mysqli_real_escape_string($db->link,$_POST['skill']);
	if($name==''|| $email==''|| $skill==''){
		$error="Field must no be Empty";
	}else{
		$query="INSERT INTO users(name,email,skill)Values('$name','$email','$skill')";
		$create=$db->insert($query);
	}
}


?>
<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="create.php" method="post">
<table>
 <tr>
  <td>Name</td>
  <td><input type="text" name="name" placeholder="Please Enter Name"/></td>
   
 </tr>
 <tr>
  <td>Email</td>
  <td><input type="text" name="email" placeholder="Please Enter Email"/></td> 
  
 </tr>

 <tr>
  <td>Skill</td>
  <td><input type="text" name="skill" placeholder="Please Enter Skill"/></td>
  
 </tr>
 <tr>
  <td> </td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  <input type="reset" Value="Cancel" />
  </td>
 </tr>

</table>
</form>
<a href="index.php">Go Back</a>
 
   
<?php include 'footer.php'; ?>