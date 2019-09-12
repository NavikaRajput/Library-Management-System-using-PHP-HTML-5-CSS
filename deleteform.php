<?php
include('dbcon.php');
	 $id = $_REQUEST['sid'];
     
	 $qry="DELETE FROM books WHERE title='$id';";
	 $run = mysqli_query($con,$qry);
	 if($run==true)
	 {
		 ?>
		 <script>
		 alert('data deleted successfully');
		 </script>
		 <?php
	 }

?>