<?php

		session_start();
		if(isset($_SESSION['uid']))
		{
			
		}
		else
		{
			header('location:loginadmin.php');
		}	
?>
<?php
?>
<form action="deletebooks.php" method="post">
<th>enter bookname</th><td>
<input type="text" name="bookname" required="required"></td>
<td colspan="2"><input type="submit" name="submit" value ="search"></td></tr>
</form>
</table>
<table align="center" widht="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000; color:#ffff;">
<th>No</th>
<th>name</th>
<th>author</th>
<th>delete</th>
</tr>
<?php
if(isset($_POST['submit']))
{
	include('dbcon.php');
	$name = $_POST['bookname'];
	$sql = "SELECT * FROM books WHERE author ='%$name%' OR  title LIKE '%$name%'";
	$run = mysqli_query($con,$sql);
	if(mysqli_num_rows($run)<1)
	{
		echo"<tr><td colspan='5'>no records found</td></tr>";
		
	}
	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($run))
		{
			$count++;
			?>
			<tr>
             <td><?php echo $count;?></td>
             <td><?php echo $data['title'];?></td>
             <td><?php echo $data['author'];?></td>
             <td><a href="deleteform.php?sid=<?php echo $data['title'];?>">delete</a></td>
            </tr>
			<?php
		}
	}
}
?>
</table>
</body>
</html>
