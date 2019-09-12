<?php

		session_start();
		if(isset($_SESSION['uid']))
		{
			
		}
		else
		{
			?>
			<script>
			alert('you have to login first');
			window.open('adminlogin.php','_self');
			</script>
			<?php
		}			
?>
<html>
    <head>
    
    <style>
        
        * {
  margin: 0;
  padding: 0;
}

body {
    background-color: orange;
  font-family: "Open Sans";
  font-size: 14px;
}

.container {
  width: 60%;
  margin: 25px auto;
}

form {
  padding: 20px;
  background: #2c3e50;
  color: #fff;
  border-radius: 4px;
}
form label,form input,form button {
  border: 0;
  margin-bottom: 3px;
  display: block;
  width: 100%;
}
form input {
  height: 25px;
  line-height: 25px;
  background: #fff;
  color: #000;
  padding: 0 6px;
   box-sizing: border-box;
}
form button {
  height: 30px;
  line-height: 30px;
  background: #e67e22;
  color: #fff;
  margin-top: 10px;
  cursor: pointer;
}
form .error {
  color: #ff0000;
}
#register
{
     color: #fff;
    background-color: #e67e22;
}
body.forimage
{
    background-image: url('banner3.jpg');
    background-size: 100% 110%;
    width : 100%;
    height : 100vh;
    margin: 0px;
    padding: 0px;
}
.forcenter
{
    height : 60px;
    margin-top : 200px;
    margin-left : 450px;   
    width: 500px;
}
input
{
    font-size :20px;
}


.menu
{
    width : 100%;
    height : 100px;
    background-color: rgba(0,0,0,1);
}

.left
{
    
    width : 25%;
    height : 100px;
    float : left;
    line-height : 65px;
}
.left h2
{
    font-family: 'verdana';
    padding-left : 20px;
    font-weight : bold;
    color : white;
    font-size: 35px;
    height : 80px;
    float : left;
}

.right
{
    width : 75%;
    height : 100px;
    float : right;
    
}
.right a
{
    margin-top : 20px;
    font-family: 'verdana';
    padding-left : 20px;
    font-weight : bold;
    color : white;
    font-size: 35px;
    height : 80px;
    text-decoration: none;
    float : right;
    
}

#first
{
    color : orange;
}

.right ul li:hover
{
    color: orange;
}
        .add
        {
           background-color : orangered;
        }
        
        #vryimp
        {
            margin-top:1px;
            margin-bottom:30px;
            font-size: 50px;
            text-align: center;
            font-family : verdana;
  text-transform: uppercase;
  color: black;
        }
        </style>
            <script src="jquery.js"></script>
    <script src="validate.min.js"></script>
    
	<script>
	// Wait for the DOM to be ready
$(function() {
	  $("form[name='addbook']").validate(
    {
    rules: {
      bookid: "required",
      title: "required",
      author: "required",
      price: "required",
      googlelink: "required",
      publication: "required",
      date : "required",
      edition: "required",
      type : "required",


    },
    messages: {
      bookid: "Enter ISBN number",
      title: "Enter the title",
      author: "Enter Author",
      price: "Enter price of the book",
      googlelink: "Enter googlelink",
      publication: "Enter publication",
      date : "Enter date",
      edition: "Enter the edition",
      type : "Enter type of book"
    },
    submitHandler: function(form)
    {
      form.submit();
    }
  });
});
	</script> 
    </head>
<!--
<?php

		session_start();
		if(isset($_SESSION['uid']))
		{
			
		}
		else
		{
            echo "<h2>SORRY PLEASE LOGIN AGAIN...</h2>";
			header('location:adminlogin.php');
		}

?>
-->
    <body>
 <div class="menu">
            <div class="left"> <h2>UPES LIBRARY</h2> </div>
        <div class="right"> 
            <ul> 
<!--                <li id="first">HOME</li>-->
                <li><a href="adminlogout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
<div class="container">
<form action="addbook.php" method="post" enctype="multiple/form-data" name="addbook">

<label for="bookid">ENTER ISBN NUMBER :</label><input type="number" name="bookid" required>

<label for="title">ENTER TITLE : </label><input type="text" name="title" required>

    <label for="author">ENTER AUTHOR : </label><input type="text" name="author" required>

<label for="price">ENTER PRICE : </label><input type="number" name="price" required>

<label for="googlelink">ENTER THE GOOGLE LINK : </label><input type="text" name="googlelink" required>

<label for="publication">ENTER PUBLICATION : </label><input type="text" name="publication" required>
    
<label for="image">BOOK IMAGE : </label><input type="file" name="image">

<label for="date">ENTER DATE : </label><input type="date" name="date" required>

<label for="edition">ENTER EDITION : </label><input type="number" name="edition" required>

<label for="type">ENTER TYPE : </label><input type="text" name="type" required>

<input type="submit" value="ADD BOOK" name="submit" class="add">
</form>
</div>
    </body>
<?php
if(isset($_POST['submit']))
{
	 include('dbcon.php');
	 $bookid = $_POST['bookid'];
	 $title = $_POST['title'];
	 $author = $_POST['author'];
	 $price = $_POST['price'];
	 $googlelink = $_POST['googlelink'];
	 $publication = $_POST['publication'];
	 $date = $_POST['date'];
	 $edition = $_POST['edition'];
	 $type = $_POST['type'];
	 $qry="INSERT INTO books(bookid, title, author, price, googlelink, publication, entrydate, edition, availability, type) VALUES ('$bookid', '$title', '$author','$price', '$googlelink', '$publication', '$date', '$edition', 'yes', '$type')";
	 $run = mysqli_query($con,$qry);
	 if($run==true)
	 {
		 ?>
		 <script>
		 alert('data inserted successfully');
		 </script>
		 <?php
	 }
}
?>
