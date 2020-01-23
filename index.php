<?php 
include 'header.php'; 
include 'config.php'; 
include 'database.php'; 
?>
<?php 
$db=new Database();
$query="SELECT * FROM users";
$read=$db->select($query);



?>
 <?php 
if(isset($_GET['msg'])){
 echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>
 <table class="tblone">
 	<tr>
 		<th>SERIAL</th>
 		<th width="25%">NAME</th>
 		<th>EMAIL</th>
 		<th>SKILL</th>
 		<th width="15%">ACTION</th>
 	</tr>
 	<?php if($read){?>
 	<?Php
 	$i=1;
 	 while($row=$read->fetch_assoc())

 	 	{?>
 	<tr>
 		<td><?php echo $i++;?></td>
 		<td><?php echo $row['name']; ?></td>
 		<td><?php echo $row['email'] ;?></td>
 		<td><?php echo $row['skill'] ;?></td>
 		<td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
 	</tr>
 	<?php } ?>
 	<?php } else{ ?>
 	<p>Data is not found</p>

 	<?php } ?>

 </table>
 <a href="create.php">Create</a>
<?php include 'footer.php'; ?>