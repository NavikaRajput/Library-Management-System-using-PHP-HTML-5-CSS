<?php

		session_start();
		if(isset($_SESSION['uid']))
		{}
		else
		{
			header('location:adminlogin.php');
		}		
?>
<html>
    <head>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
    font-size : 18px;
    font-family : verdana;
    font-weight : bold;
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
        
/*       top navigation bar*/
    
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
            
            
            
/*     search bar       */
                        
.d1
{
    margin-top : 40px;            
}

* {
  box-sizing: border-box;
}

form.example input[type=number] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}
            
            

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: green;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: green;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
        </style>
    </head>
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
    
<form  action="updatebooks.php" method="post" class="example">
    <h3 style="text-align:center;"><font size="6" face = "verdana">SEARCH THE BOOK...</font></h3>
    <input type="number" name="bookid" placeholder="Search.." required="required" id="bookname">
<button type="submit" name="submit"><i class="fa fa-search"></i></button>
</form>

<?php

 include('dbcon.php');
 $bookid = $_REQUEST['bookid'];
 $sql = "SELECT * FROM books WHERE bookid='$bookid'";
 $run = mysqli_query($con, $sql);
 $data = mysqli_fetch_assoc($run);
 if($bookid==$data['bookid'])
 {
?>
    <div class="forcenter" class="container">
<form action="updatedata.php" method="post" enctype="multiple/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">BOOK ID</label>
      </div>
      <div class="col-75">
        <input type="number" id="fname" name="bookid" placeholder="ISBN NUMBER.." value="<?php echo $data['bookid'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">TITLE</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="title" placeholder="Title of the book.." value="<?php echo $data['title'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">AUTHOR</label>
      </div>
      <div class="col-75">
          <input type="text" id="lname" name="author" placeholder="Author name.." value="<?php echo $data['author'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">PRICE</label>
      </div>
      <div class="col-75">
          <input type="number" id="lname" name="price" placeholder="Enter price.." value="<?php echo $data['price'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">GOOGLELINK</label>
      </div>
      <div class="col-75">
          <input type="text" id="lname" name="googlelink" placeholder="enter googlelink.." value="<?php echo $data['googlelink'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">PUBLICATION</label>
      </div>
      <div class="col-75">
          <input type="text" id="lname" name="publication" placeholder="enter publication.." value="<?php echo $data['publication'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">AVAILABILITY</label>
      </div>
      <div class="col-75">
          <input type="text" id="lname" name="availability" placeholder="yes or no.." value="<?php echo $data['availability'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">EDITION</label>
      </div>
      <div class="col-75">
          <input type="number" id="lname" name="edition" placeholder="Edition.." value="<?php echo $data['edition'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">TYPE</label>
      </div>
      <div class="col-75">
          <input type="text" id="lname" name="type" placeholder="type of book.." value="<?php echo $data['type'];?>">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="submit">
    </div>
  </form>
    </div> 
    
</body>
</html>
 <?php
 }
 else
 {
	 ?>
	 <script>
	 alert('no book exist with this id ');
	 </script>
	 <?php
 }
 ?>