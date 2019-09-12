<?php
     include('dbcon.php');
	 $bookid = $_POST['bookid'];
	 echo $bookid;
	 $title = $_POST['title'];
	  echo $title;
	 $author = $_POST['author'];
	  echo $author;
	 $price = $_POST['price'];
	  echo $price;
	 $googlelink = $_POST['googlelink'];
	  echo $googlelink;
	 $publication = $_POST['publication'];
	  echo $publication;

	 $availability = $_POST['availability'];
	  echo $availability;
	 $edition = $_POST['edition'];
	  echo $edition;
	 $type = $_POST['type'];
	  echo $type;
	 
	 $qry="UPDATE books SET title ='$title',author ='$author',price ='$price',googlelink ='$googlelink',publication ='$publication',availability='$availability',edition='$edition',type='$type' WHERE bookid =$bookid;";
	 $run = mysqli_query($con,$qry);
	 if($run==true)
	 {
		 ?>
		 <script>
		 alert('data updated successfully');
		 </script>
		 <?php
	 }
?>