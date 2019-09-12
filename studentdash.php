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
			window.open('studentlogin.php','_self');
			</script>
			<?php
		}		
?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            
            .menu
{
    width : 100%;
    height : 100px;
    background-color: rgba(0,0,0,1);
}
            a
            {
                text-decoration : none;
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
.right ul
{
  margin-right: 2px;   
}

.right ul li
{
   display : inline-block;
    list-style : none;
    font-size : 20px;
    color : white;
    font-weight : bold;
    line-height : 85px;
    margin-left : 30px;
    text-transform: uppercase;
}


#first
{
    color : orange;
}

.right ul li:hover
{
    color: orange;
}
            
         body {
  font-family: Arial;
}
            
.d1
{
    margin-top : 40px;            
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
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
  background: orange;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
            
/*            for table styling     */
            
 table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
            
            
        </style>
    </head>
<?php

		session_start();
		if(isset($_SESSION['uid']))
		{
			
		}
		else
		{
            echo "not working";
			header('location:studentlogin.php');
		}
?>
<body>
    <div class="menu">
            <div class="left"> <h2>UPES LIBRARY</h2> </div>
        <div class="right"> 
            <ul> 
                <li id="first">HOME</li>
                <li><a href=#>ABOUT US</a></li>
                <li><a href="studentlogin.php" disabled="disabled">STUDENT LOGIN</a></li>
                <li><a href="studentsignup.php" disabled="disabled">STUDENT SIGNUP</a></li>
                <li>CONTACT US</li> 
                <li><a href="logout.php">LOGOUT</a></li>
                
            </ul>
        </div>
        </div>
    <div class="d1">
<form action="studentdash.php" method="post" class="example">
    <h3 style="text-align:center;"><font size="6" face = "verdana">SEARCH THE BOOK...</font></h3>
    <input type="text" name="bookname" placeholder="Search.." required="required" id="bookname">
<button type="submit" name="submit"><i class="fa fa-search"></i></button>
</form>
    </div>
<table align="center" widht="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000; color:#ffff;">
<th>No</th>
<th>image</th>
<th>name</th>
<th>author</th>
    <th>Edition</th>
<th>publications</th>
<th>check availability</th>
</tr>
<?php
if(isset($_POST['submit']))
{
	include('dbcon.php');
	$name = $_POST['bookname'];
	$sql = "SELECT * FROM books WHERE (author LIKE '%$name%' OR title LIKE '%$name%' OR publication LIKE '%$name%')";
	$run = mysqli_query($con,$sql);
	if(mysqli_num_rows($run)<1)
	{
      echo "BOOK IS NOT AVAILABLE";
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
             <td><img src="../dataimg/<?php echo $data['image'];?>"style="max-width=100px;"/></td>
             <td><?php echo $data['title'];?></td>
             <td><?php echo $data['author'];?></td>
                <td><?php echo $data['edition'];?></td>
             <td><?php echo $data['publication'];?></td>
                
			 <td>
  <a href="checkavail.php?bookid=<?php echo $data['bookid'];?>&availability=<?php echo $data['availability'];?>"><?php echo $data['availability'];?></a></td>
            
            </tr>
			
			<?php
		}
	}
}
?>
</table>
</body>
</html>



















