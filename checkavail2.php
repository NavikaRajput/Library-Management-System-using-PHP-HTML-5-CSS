<?php
include('dbcon.php');

		session_start();
		if(isset($_SESSION['uid']))
		{
			
		}
	
	$bookid=$_REQUEST['bookid'];
    $studentid = $_SESSION['uid'];
	echo $_SESSION['uid'];
//    $currentTimeinSeconds = time();  
	echo "sid =  ".$studentid."   bookid =  ".$bookid;
    $qry4="UPDATE books SET availability='no' WHERE bookid='$bookid'";
	$run4 = mysqli_query($con,$qry4);  
	if($run4==true)
	 {
?>
		 <script>
		 alert('successfully');
		 </script>
		 <?php
	 }	
        
	$qry="INSERT INTO booksonhold(sid,bookid) VALUES ('$studentid','$bookid')";
	$run = mysqli_query($con,$qry);
	if($run==true)
	 {
?>
		 <script>
		 alert('data inserted successfully');
		 </script>
		 <?php
		 //header('location:checkavail.php');
	 }
	 else
	 {
		 ?>
		 <script>
		 alert('data insertion unsuccessful');
		 </script>
		<?php
	 }

        
    /* $sql1 = "SELECT * FROM students WHERE sid='$studentid'";
	 $run1 = mysqli_query($con,$sql1);
	 $data1=mysqli_fetch_assoc($run1);
        
        $sql2 = "SELECT * FROM books WHERE bookid='$bookid'";
	 $run2 = mysqli_query($con,$sql1);
	 $data2=mysqli_fetch_assoc($run2);
        $to = $data1['email']+".@stu.upes.ac.in";
        $mail_subject = "Hold placed Successfully";
        $mail_content = $data2['googlelink'];
        $header = "From: navikarajput1@gmail.com"."\r\n";
        $result = mail($to,$mail_subject,$mail_content,$header);
        if($result)
        {
            echo "Mail sent successfully";
        }
        else
        {
            
            echo "Mail not sent";
        }
*/
?>